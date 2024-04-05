<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\UserDetailsContract;
use Auth;


class UserDetailsController extends Controller
{
    protected $userDetailsRepository;

    public function __construct(UserDetailsContract $userDetailsRepository)
    {
        $this->userDetailsRepository = $userDetailsRepository;
    }

    // Banner
    public function UserDetailsIndex(Request $request)
    
    {   if(!empty($request->keyword)){
        $data = $this->userDetailsRepository->getSearchUser($request->keyword);
        }else{
        $data = $this->userDetailsRepository->getAllUsers();
         }
        return view('admin.user.index', compact('data'));
    }
    public function UserDetailsView(int $id)
    {
        $data = $this->userDetailsRepository->getUserDetailsById($id);
        $AllImages = $this->userDetailsRepository->getAllUsersImages($id);
        return view('admin.user.view', compact('data', 'AllImages'));
    }
    public function UserDocumentView(int $id)
    { 
        $data = $this->userDetailsRepository->getUserAllDocumentsById($id);
        $Additional_data = $this->userDetailsRepository->getAllAddiDocByUserId($id);
        return view('admin.user.userDoc', compact('data', 'Additional_data'));
    }
    public function UserDocumentStatus(Request $request)
    {
        // dd($request->all());
        $data = $this->userDetailsRepository->StatusUserDocument($request);
        // dd($data);
        return response()->json(['status'=>200]);
    }
    public function UserReportStatus(int $id)
    {
        $data = $this->userDetailsRepository->StatusUserReport($id);
        return redirect()->back();
    }
    public function UserReportView(int $id)
    {
        // $seller_id = $id;
        $data = $this->userDetailsRepository->getAllReportsById($id);
        return view('admin.user.report',compact('data'));
        // $data = $this->userDetailsRepository->StatusUserDocument($id);
        // return redirect()->back();
    }
}
