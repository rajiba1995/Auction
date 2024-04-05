<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Unit;
use App\Contracts\ClientContract;
class ClientController extends Controller{
    protected $clientRepository;

    public function __construct(ClientContract $clientRepository) {
        $this->clientRepository = $clientRepository;
    }

    public function index(){
        $data = $this->clientRepository->getAllClient();
        return view('admin.client.index', compact('data'));
    }
    public function UnitList(){
        $data = $this->clientRepository->GetAllUnit();
        return view('admin.client.unit', compact('data'));
    }
    public function create(){
        $unit = $this->clientRepository->GetAllUnit();
        return view('admin.client.create', compact('unit'));
    }
    public function UnitEdit($id){
        $data = $this->clientRepository->GetUnitById($id);
        return view('admin.client.edit-unit', compact('data'));
    }

    public function UnitStore(Request $request){
        $softDeletedVendor = Unit::where('email', $request->email)->onlyTrashed()->first();
        if ($softDeletedVendor) {
            return redirect()->route('admin.client.unit.list')->with('error', 'This email is already associated with a unit. Please contact the admin for more information.')->withInput($request->all());
        } else {
            $request->validate([
                'name' => 'required|max:255',
                'mobile_number' => 'required|numeric',
                'address' => 'required',
                'email' => 'required|unique:clients,email',
            ]);
        }
        
        $params = $request->except('_token');
        $data = $this->clientRepository->CreateUnit($params);
        if($data){
            return redirect()->route('admin.client.unit.list')->with('success', 'Data has been successfully stored!');
        }else{
            return redirect()->route('admin.client.unit.list')->with('error', 'Something went wrong please try again!');
        }
        
    }
    public function UnitUpdate(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'mobile_number' => 'required|numeric',
            'address' => 'required',
            'email' => 'required',
        ]);
        
        $params = $request->except('_token');
        $data = $this->clientRepository->UpdateUnit($params);
        if($data){
            return redirect()->route('admin.client.unit.list')->with('success', 'Data has been successfully updated!');
        }else{
            return redirect()->route('admin.client.unit.list')->with('error', 'Something went wrong please try again!');
        }
        
    }
    public function store(Request $request){
        $softDeletedVendor = Client::where('email', $request->email)->onlyTrashed()->first();
        if ($softDeletedVendor) {
            return redirect()->route('admin.inspector.create')->with('error', 'This email is already associated with a client. Please contact the admin for more information.')->withInput($request->all());
        } else {
            $request->validate([
                'name' => 'required|max:255',
                'mobile_number' => 'required|numeric',
                'address' => 'required',
                'acc_no' => 'required',
                'city' => 'required',
                'state' => 'required',
                'pin_code' => 'required|between:6,6',
                'email' => 'required|unique:clients,email',
                'password' => 'required',
            ]);
        }
        
        $params = $request->except('_token');
        $data = $this->clientRepository->CreateClient($params);
        if($data){
            return redirect()->route('admin.client.index')->with('success', 'Data has been successfully stored!');
        }else{
            return redirect()->route('admin.client.create')->with('error', 'Something went wrong please try again!');
        }
        
    }
    public function edit($id){
        $data = $this->clientRepository->GetClientById($id);
        $unit = $this->clientRepository->GetAllUnit();
        $ClientUnits = $this->clientRepository->GetAllClientUnit($id);
        return view('admin.client.edit', compact('data', 'unit', 'ClientUnits'));
    }
    public function update(Request $request){
        $softDeletedVendor = Client::where('email', $request->email)->where('id', '!=', $request->id)->onlyTrashed()->first();
        if ($softDeletedVendor) {
            return redirect()->route('admin.client.edit', $request->id)->with('error', 'This email is already associated with a Client. Please contact the admin for more information.');
        } else {
            $request->validate([
                'name' => 'required|max:255',
                'mobile_number' => 'required|numeric',
                'acc_no' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'pin_code' => 'required|between:6,6',
            ]);
        }
        $params = $request->except('_token');
        $data = $this->clientRepository->updateClient($params);
        if($data){
            return redirect()->route('admin.client.edit', $request->id)->with('success', 'Data has been successfully updated!');
        }else{
            return redirect()->route('admin.client.edit', $request->id)->with('error', 'Something went wrong please try again!');
        }
    }
    public function delete($id){
        $data = $this->clientRepository->DeleteClient($id);
        if($data){
            return redirect()->route('admin.client.index')->with('success','Deleted Successfully!');
        }else{
            return redirect()->route('admin.client.index')->with('error', 'Something went wrong please try again!');
        }
    }
    public function UnitDelete($id){
        $data = $this->clientRepository->deleteUnit($id);
        if($data){
            return redirect()->route('admin.client.unit.list')->with('success','Deleted Successfully!');
        }else{
            return redirect()->route('admin.client.unit.list')->with('error', 'Something went wrong please try again!');
        }
    }
    public function status($id){
        $data = $this->clientRepository->StatusClient($id);
        return redirect()->back();
    }

}
