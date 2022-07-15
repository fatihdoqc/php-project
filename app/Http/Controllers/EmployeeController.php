<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function addEmployee(){

        return view('add-employee');
    }
    public function saveEmployee(Request $request){

        $employee = new Employee;
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->phone = $request->input('phone');
        $employee->email = $request->input('email');

        $comp = Company::where ('name', $request->input('company_name') )->first();

        $employee->company_id = $comp->id;

        $employee->save();

        return redirect('list')->with('employee_status','Employee added successfully');
    }
    public function editEmployee($id){

        $post = Employee::find($id);
        
        $comp = Company::find($post->company_id);

        $comp_name = $comp->name;

        return view('edit-employee' , compact('post' , 'comp_name'));
    }
    public function updateEmployee(Request $request , $id ){

        $employee = Employee::find($id);
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->phone = $request->input('phone');
        $employee->email = $request->input('email');

        $comp = Company::where ('name', $request->input('company_name') )->first();

        $employee->company_id = $comp->id;

        $employee->update();

        return redirect('list')->with('employee_status','Employee updated successfully');

    }
    public function deleteEmployee(Request $request){

        DB::table('employees')->where('id', $request->id)->delete();
        return back()->with('employee_status','Employee deleted successfuly');
    }
}
