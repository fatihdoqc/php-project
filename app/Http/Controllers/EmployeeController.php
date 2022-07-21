<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class EmployeeController extends Controller
{
    public function addEmployee(){

        return view('add-employee');
    }
    public function store(Request $request){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric|min:10|nullable',
            'company_name' => 'required',
            'email' => 'nullable|email:rfc,dns',
        ]);

        $employee = new Employee;
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->phone = $request->input('phone');
        $employee->email = $request->input('email');

        $comp = Company::where ('name', $request->input('company_name') )->first();

        if($comp == null){
            $error = ValidationException::withMessages([
                "company_name" => ["Company does not exist"] 
            ]);
        
            throw $error;
        }
        $employee->company_id = $comp->id;

        $employee->save();

        return redirect('employee-list')->with('employee_status','Employee added successfully');
    }
    public function show(){
        $employees = DB::table(('employees'))->get();
        $companies = DB::table('companies')->get();
        return view('employee-list' , compact('companies' , 'employees'));
    }
    public function editEmployee($id){

        $post = Employee::find($id);
        
        $comp = Company::find($post->company_id);

        $comp_name = $comp->name;

        return view('edit-employee' , compact('post' , 'comp_name'));
    }
    public function update(Request $request , $id ){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric|min:10|nullable',
            'company_name' => 'required',
            'email' => 'nullable|email:rfc,dns'
        ]);

        $employee = Employee::find($id);
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->phone = $request->input('phone');
        $employee->email = $request->input('email');

        $comp = Company::where ('name', $request->input('company_name') )->first();

        if($comp == null){
            $error = ValidationException::withMessages([
                "company_name" => ["Company does not exist"] 
            ]);
        
            throw $error;
        }

        $employee->company_id = $comp->id;

        $employee->update();

        return redirect('list')->with('employee_status','Employee updated successfully');

    }
    public function destroy(Request $request){

        DB::table('employees')->where('id', $request->id)->delete();
        return back()->with('employee_status','Employee deleted successfuly');
    }
}
