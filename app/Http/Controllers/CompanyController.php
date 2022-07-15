<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function addCompany(){

        return view('add-company');
    }
    public function saveCompany(Request $request){

        DB::table('companies')->insert([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'logo_name' => $request->logo_name,
            'website' => $request->website
        ]);

        return redirect('list')->with('company_status','Company added successfully');
    }
    public function list(){
        $companies = DB::table('companies')->get();
        $employees = DB::table(('employees'))->get();
        return view('list' , compact('companies' , 'employees'));
    }
    public function editCompany($id){
        $post = Company::find($id);
        return view('edit-company' , compact('post'));
    }
    public function updateCompany(Request $request , $id ){

        $comp = Company::find($id);
        $comp->name = $request->input('name');
        $comp->address = $request->input('address');
        $comp->phone = $request->input('phone');
        $comp->email = $request->input('email');
        $comp->logo_name = $request->input('logo_name');
        $comp->website = $request->input('website');

        $comp->update();

        return redirect('list')->with('company_status','Company updated successfully');

    }
    public function deleteCompany(Request $request){

        DB::table('companies')->where('id', $request->id)->delete();
        return back()->with('company_status','Company deleted successfuly');
    }
}