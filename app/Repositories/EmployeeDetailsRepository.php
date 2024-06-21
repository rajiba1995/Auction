<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\EmployeeDetailsContract;

use App\Models\Admin;
use App\Models\EmployeeAttandance;
use App\Models\User;
use App\Models\EmployeeRole;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class EmployeeDetailsRepository implements EmployeeDetailsContract
{
    public function getAllEmployees(){
        return Admin::with('getSellers')->where( 'type', 2 )->where('deleted_at',1)->paginate(20);
    }
    public function CreateEmployee(array $data){

        try {
            $employee = new Admin();
            $collection = collect($data);
            $employee->name = $collection['name'];
            $employee->email = $collection['email'];
            $employee->phone = $collection['phone'];
            $employee->status = 1;
            $employee->type = 2;
            $employee->role = $collection['role'];
            $employee->password = Hash::make($collection['pass']);
           

            $employee->save();
            return $employee;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function StatusEmployee($id)
    {
        $employee = Admin::findOrFail($id);
        $status = $employee->status == 1 ? 0 : 1;
        $employee->status = $status;
        $employee->save();
        return $employee;
    }

    public function DeleteEmployee($id)
    {
        $delete = Admin::findOrFail($id);
        $delete->deleted_at = 0;
        $delete->save();
        return $delete;
    }
    public function GetEmployeeById($id)
    {
        return Admin::findOrFail($id);
    }
    public function UpdateEmployee(array $data)
    {

        try {
            $collection = collect($data);
            $employee = Admin::findOrFail($collection['id']);
            $employee->name = $collection['name'];
            $employee->email = $collection['email'];
            $employee->phone = $collection['phone'];
            $employee->role = $collection['role'];
            $employee->password = Hash::make($collection['pass']);
            $employee->save();
            return $employee;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    
    public function getSearchEmployee($keyword,$startDate,$endDate)
    {
        $query = Admin::query();
        
        $query->when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->orWhere('phone', 'like', '%' . $keyword . '%');
            // ->orWhere('role', 'like', '%' . $term . '%');
        });
        if (!is_null($startDate) && !is_null($endDate)) {
      
            $query->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
                $query->where('created_at', '>=', $startDate." 00:00:00")
                      ->where('created_at', '<=', date("Y-m-d 23:59:59",strtotime($endDate)));
            });
        }
        return $data = $query->with('getSellers')->latest('id')->paginate(25);

        
    }

    public function getAllUsersByEmployeeId($id){
        return User::where('added_by',$id)->paginate();
    }
    public function getEmployeeAttendanceById($id){
        return EmployeeAttandance::where('user_id',$id)->paginate();
    }



     //Role
     public function getAllRole()
     {
         return EmployeeRole::where('deleted_at', 1)->paginate(20);
     }
     public function roleCountEmployee()
     {
        return Admin::where( 'type', 2 )->where('deleted_at',1)->select('role', DB::raw('count(*) as total'))
        ->groupBy('role')
        ->get();;
     }
     public function getAllActiveRole()
     {
         return EmployeeRole::where('status', 1)->paginate(20);
     }
     public function CreateRole(array $data)
     {
         try {
             $role = new EmployeeRole();
             $collection = collect($data);
             $role->name = $collection['name'];
             $role->save();
             return $role;
         } catch (QueryException $exception) {
             throw new InvalidArgumentException($exception->getMessage());
         }
     }
     public function StatusRole($id)
     {
         $role = EmployeeRole::findOrFail($id);
         $status = $role->status == 1 ? 0 : 1;
         $role->status = $status;    
         $role->save();
         return $role;
     }
     public function GetRoleById($id)
     {
         return EmployeeRole::findOrFail($id);
     }
     public function updateRole(array $data)
     {
 
         try {
             $collection = collect($data);
             $role = EmployeeRole::findOrFail($collection['id']);
             $role->name = $collection['name'];
             $role->save();
             return $role;
         } catch (QueryException $exception) {
             throw new InvalidArgumentException($exception->getMessage());
         }
     }
     public function DeleteRole($id)
     {
         $delete = EmployeeRole::findOrFail($id);
         $delete->deleted_at = 0;
         
         $delete->save();
         return $delete;
     }
}