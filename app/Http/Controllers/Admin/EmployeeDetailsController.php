<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\EmployeeDetailsContract;
use App\Models\Admin;
use App\Models\User;
use App\Models\WebsiteLogs;
use Auth;



class EmployeeDetailsController extends Controller
{
    protected $employeeDetailsRepository;

    public function __construct(EmployeeDetailsContract $employeeDetailsRepository)
    {
        $this->employeeDetailsRepository = $employeeDetailsRepository;
    }

    public function EmployeeDetailsIndex(Request $request)
    { 
        $startDate = $request->start_date ?? '';
        $endDate = $request->end_date ?? '';
        $keyword = $request->keyword ?? '';
        // Check if any of the parameters are provided
        // If keyword is provided or both start_date and end_date are provided
        if (!empty($keyword) || !empty($startDate) || !empty($endDate)) {     
        $data = $this->employeeDetailsRepository->getSearchEmployee($keyword,$startDate,$endDate);            
        }else{
        $data = $this->employeeDetailsRepository->getAllEmployees();
        }

        return view('admin.employee.index',compact('data'));
    }
    public function SellersIndexThroughEmployee($id)
    { 
        // return $id;
        $data = $this->employeeDetailsRepository->getAllUsersByEmployeeId($id);
        $employees = $this->employeeDetailsRepository->getAllEmployees();
        
        return view('admin.employee.sellers',compact('data','employees', 'id'));

    }
    public function AttendanceIndexOfEmployee($id)
    { 
        // return $id;
        $data = $this->employeeDetailsRepository->getEmployeeAttendanceById($id);
        return view('admin.employee.attendance',compact('data'));

    }
    public function EmployeeCreate()
    {
        $role =$this->employeeDetailsRepository->getAllActiveRole();
        return view('admin.employee.create',compact('role'));      
    }
    public function EmployeeStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins',
            'phone' => 'required|min:10|unique:admins',
            'pass' => 'required|min:8|max:15'
        ],[
           'name.required'=>"Name is required",
           'email.required'=>"Email is required",  
           'email.unique'=>"This email has already been taken.",  
           'phone.required'=>"Phone number is required",  
           'phone.unique'=>"This Phone number has already been used.",  
           'password.required'=>"Password field is required",        
           'password.min'=>"Minimum 8 characters are allowed in password field.",                       
           'password.max'=>"Maximum 15 characters are allowed in password field.",                       
        ]);
        $params = $request->except('_token');
        $data = $this->employeeDetailsRepository->CreateEmployee($params);
        if ($data) {
            return redirect()->route('admin.employee.index')->with('success', 'Employee has been successfully Added!');
        } else {
            return redirect()->route('admin.employee.create')->with('error', 'Something went wrong please try again!');
        }      
    }
    public function EmployeeStatus($id)
    {
        $data = $this->employeeDetailsRepository->StatusEmployee($id);
        return redirect()->back();
    }
    public function EmployeeDelete($id)
    {
        $data = $this->employeeDetailsRepository->DeleteEmployee($id);
        if ($data) {
            return redirect()->route('admin.employee.index')->with('success', 'Deleted Successfully!');
        } else {
            return redirect()->route('admin.employee.index')->with('error', 'Something went wrong please try again!');
        }
    }
    public function EmployeeEdit($id)
    {
        $data = $this->employeeDetailsRepository->GetEmployeeById($id);
        $role =$this->employeeDetailsRepository->getAllRole();
        return view('admin.employee.edit',compact('data','role'));
   
    }
    public function EmployeeDetailsExport(Request $request)
    {
        // dd($request->all());
        $start_date = $request->start_date ?? '';
        $end_date = $request->end_date ?? '';
        $keyword = $request->keyword ?? '';
        $query = Admin::query();

        $query->when($start_date && $end_date, function($query) use ($start_date, $end_date) {
            $query->where('created_at', '>=', $start_date." 00:00:00")
                  ->where('created_at', '<=', date("Y-m-d 23:59:59",strtotime($end_date)));
        });

        $query->when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->orWhere('phone', 'like', '%' . $keyword . '%');
            // ->orWhere('role', 'like', '%' . $term . '%');
        });
        $data = $query->latest('id')->where('type', 2)->get();
        // dd($data);

        if(count($data)>0){
            $delimiter = ",";
            $fileName = "Employee Details-".date('d-m-Y').".csv";
            // Create a file pointer
            $f = fopen('php://memory', 'w');

            // Set Column Headers
            $header = array("Name","Email","Mobile","Role","Date");
            fputcsv($f,$header,$delimiter);

            $count =1;
            foreach($data as $key => $row){
                $exportData = array(
                    $row->name ? $row->name : '',
                    $row->email ? $row->email : '',
                    $row->phone ? $row->phone : '',      
                    $row->getRoleName ? $row->getRoleName->name : '',      
                    date("Y-m-d h:i a",strtotime($row->created_at)) ? date("d-m-Y h:i a",strtotime($row->created_at)) : ''
                    
                );
                // dd($exportData);
                fputcsv($f,$exportData,$delimiter);
                $count++;
            }
            fseek($f,0);
            // Set headers to download file rather than displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $fileName . '";');

            //output all remaining data on a file pointer
            fpassthru($f);

        }
    }
    public function EmployeeUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins,email,' . $request->id,
            'phone' => 'required|min:10|unique:admins,phone,' . $request->id,
            'pass' => 'nullable|min:8|max:15'
        ],[
           'name.required'=>"Name is required",
           'email.required'=>"Email is required",  
           'email.unique'=>"This email has already been taken.",  
           'phone.required'=>"Phone number is required",  
           'phone.unique'=>"This Phone number has already been used.",  
        //    'password.required'=>"Password field is required",        
           'password.min'=>"Minimum 8 characters are allowed in password field.",                       
           'password.max'=>"Maximum 15 characters are allowed in password field.",                       
        ]);
        $params = $request->except('_token');
        $data = $this->employeeDetailsRepository->UpdateEmployee($params);
        if ($data) {
            return redirect()->route('admin.employee.index', $request->id)->with('success', 'Employee data has been successfully updated!');
        } else {
            return redirect()->route('admin.employee.edit', $request->id)->with('error', 'Something went wrong please try again!');
        }
    }

    //Role

   public function RoleIndex()
    {
        $data = $this->employeeDetailsRepository->getAllRole();
        $role_count = $this->employeeDetailsRepository->roleCountEmployee();
        $roleCounts = $role_count->pluck('total', 'role');
        return view('admin.role.index', compact('data','roleCounts'));
    }
    public function RoleCreate()
    {
        return view('admin.role.create');
    }
    public function RoleStore(Request $request)
    {
       //  dd($request->all());    
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $params = $request->except('_token');
        $data = $this->employeeDetailsRepository->CreateRole($params);
        if ($data) {
            return redirect()->route('admin.role.index')->with('success', 'Data has been successfully stored!');
        } else {
            return redirect()->route('admin.role.create')->with('error', 'Something went wrong please try again!');
        }
    }
    public function RoleStatus($id)
    {
        $data = $this->employeeDetailsRepository->StatusRole($id);
        return redirect()->back();
    }
    public function RoleEdit($id)
    {
        $data = $this->employeeDetailsRepository->GetRoleById($id);
        return view('admin.role.edit', compact('data'));
    }
    public function RoleUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',

        ]);
        $params = $request->except('_token');
        $data = $this->employeeDetailsRepository->updateRole($params);
        if ($data) {
            return redirect()->route('admin.role.index', $request->id)->with('success', 'Data has been successfully updated!');
        } else {
            return redirect()->route('admin.role.edit', $request->id)->with('error', 'Something went wrong please try again!');
        }
    }
    public function RoleDelete($id)
    {
        $data = $this->employeeDetailsRepository->DeleteRole($id);
        if ($data) {
            return redirect()->route('admin.role.index')->with('success', 'Deleted Successfully!');
        } else {
            return redirect()->route('admin.role.index')->with('error', 'Something went wrong please try again!');
        }
    }
    public function UserTransfer(Request $request){
        foreach($request->selected_items as $item){
            $user = User::findOrFail($item);
            if($user){
                $user->added_by = $request->emp_id;
                $user->save();
                if($user){
                    $websiteLog = new WebsiteLogs();
                    $websiteLog->emp_id = Auth::guard('admin')->user()->id;
                    $websiteLog->logs_type = "USER TRANSFER";
                    $websiteLog->table_name = "users";
                    $websiteLog->response = json_encode($request->all());
                    $websiteLog->save();
                }
            }
        }
        return response()->json(['status'=>200]);
    }
}