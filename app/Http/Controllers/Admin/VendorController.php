<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\RequiredValue;
use App\Models\RequiredTextValues;
use App\Contracts\VendorContract;
use App\Contracts\ClientContract;
class VendorController extends Controller
{
    protected $vendorRepository;

    public function __construct(VendorContract $vendorRepository, ClientContract $clientRepository) {
        $this->vendorRepository = $vendorRepository;
        $this->clientRepository = $clientRepository;
    }

    public function index(){
        $data = $this->vendorRepository->getAllVendors();
        return view('admin.vendor.index', compact('data'));
    }
    public function create(){
        return view('admin.vendor.create');
    }

    public function store(Request $request){
        $softDeletedVendor = Vendor::where('contact_mail', $request->email)->onlyTrashed()->first();
        if ($softDeletedVendor) {
            return redirect()->route('admin.vendor.create')->with('error', 'This email is already associated with a vendor. Please contact the admin for more information.');
        } else {
            $request->validate([
                'name' => 'required|max:255',
                'contact_number' => 'required|numeric',
                'address' => 'required',
                'state' => 'required',
                'pin_code' => 'required|between:6,6',
                'email' => 'required|unique:vendors,contact_mail',
            ]);
        }
        
        $params = $request->except('_token');
        $data = $this->vendorRepository->createVendor($params);
        if($data){
            return redirect()->route('admin.vendor.index')->with('success', 'Data has been successfully stored!');
        }else{
            return redirect()->route('admin.vendor.create')->with('error', 'Something went wrong please try again!');
        }
        
    }
    public function edit($id){
        $data = $this->vendorRepository->findVendorById($id);
        return view('admin.vendor.edit', compact('data'));
    }
    public function update(Request $request){
        $softDeletedVendor = Vendor::where('contact_mail', $request->email)->where('id', '!=', $request->id)->onlyTrashed()->first();
        if ($softDeletedVendor) {
            return redirect()->route('admin.vendor.edit', $request->id)->with('error', 'This email is already associated with a vendor. Please contact the admin for more information.');
        } else {
            $request->validate([
                'name' => 'required|max:255',
                'contact_number' => 'required|numeric',
                'address' => 'required',
                'state' => 'required',
                'pin_code' => 'required|between:6,6',
                'email' => 'required',
            ]);
        }
        $params = $request->except('_token');
        $data = $this->vendorRepository->updateVendor($params);
        if($data){
            return redirect()->route('admin.vendor.edit', $request->id)->with('success', 'Data has been successfully updated!');
        }else{
            return redirect()->route('admin.vendor.edit', $request->id)->with('error', 'Something went wrong please try again!');
        }
    }
    public function delete($id){
        $data = $this->vendorRepository->deleteVendor($id);
        if($data){
            return redirect()->route('admin.vendor.index')->with('success','Deleted Successfully!');
        }else{
            return redirect()->route('admin.vendor.index')->with('error', 'Something went wrong please try again!');
        }
    }
    public function status($id){
        $data = $this->vendorRepository->StatusVendor($id);
        return redirect()->back();
    }

    // Inspetion Field Management
    public function FieldIndex(){
        $data = $this->clientRepository->getAllClient();
        return view('admin.vendor.fields', compact('data'));
    }
    public function FieldCreate($id){
        $client = $this->clientRepository->GetClientById($id);
        $data = $this->vendorRepository->FindJobField($id);
        $AllGradeData = $this->vendorRepository->ClientPackWiseGradeList($id);;
        $required_text_values1 = RequiredTextValues::where('client_id', $id)->where('package_id', 1)->get();
        $required_text_values2 = RequiredTextValues::where('client_id', $id)->where('package_id', 2)->get();
        $required_values1 = RequiredValue::where('client_id', $id)->where('package_id', 1)->get();
        $required_values2 = RequiredValue::where('client_id', $id)->where('package_id', 2)->get();
        
        if(count($required_values2)==0){
            $RequiredValue = new RequiredValue;
            $RequiredValue->client_id = $id;
            $RequiredValue->package_id = 2;
            $RequiredValue->save();
        }
        if(count($required_values1)==0){
            $RequiredValue = new RequiredValue;
            $RequiredValue->client_id = $id;
            $RequiredValue->package_id = 1;
            $RequiredValue->save();
        }
        if(count($required_text_values2)==0){
            $RequiredTextValues = new RequiredTextValues;
            $RequiredTextValues->client_id = $id;
            $RequiredTextValues->package_id = 2;
            $RequiredTextValues->save();
        }
        if(count($required_text_values1)==0){
            $RequiredTextValues = new RequiredTextValues;
            $RequiredTextValues->client_id = $id;
            $RequiredTextValues->package_id = 1;
            $RequiredTextValues->save();
        }
        $RequiredValue = RequiredValue::where('client_id', $id)->whereIn('package_id', [1,2])->get();
        $RequiredTextValues = RequiredTextValues::where('client_id', $id)->whereIn('package_id', [1,2])->get();
        if(count($data)>1){
            return view('admin.vendor.field-create', compact('AllGradeData', 'client', 'data', 'RequiredValue', 'RequiredTextValues'));
        }else{
            $data = $this->vendorRepository->CreateJobField($id);
            return view('admin.vendor.field-create', compact('AllGradeData', 'client', 'data', 'RequiredValue', 'RequiredTextValues'));
        }
    }
    public function FieldStore(Request $request){
        $data = $this->vendorRepository->StoreJobField($request->all());
        return response()->json(['status'=>200]);
    }
    public function FieldRequiredValueStore(Request $request){
        $params = $request->except('_token');
        $data = $this->vendorRepository->RequiredFieldValueStore($params);
        if($data){
            return redirect()->route('admin.field.data', $data->client_id)->with('success', 'Data has been successfully updated!');
        }else{
            return redirect()->back();
        }
    }

    public function GradeValueStore(Request $request){
        $params = $request->except('_token');
        $data = $this->vendorRepository->GradeValueUpdate($params);
        if($data==true){
            return redirect()->back()->with('success', 'Data has been successfully updated!');
        }else{
            return redirect()->back();
        }
    }
}
