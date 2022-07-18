<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public function addCompany(){

        return view('add-company');
    }
    public function saveCompany(Request $request){


        $request->validate([
            'name' => 'required',
            'phone' => 'integer|nullable',
            'photo'  => "dimensions:min_width=100,min_height=100",
        ]);

        $path = null;

        if($request->hasFile('photo')){
            $path = $request->file('photo')->storeAs('logos' , $request->name  .'.jpg' ,  'public');
        }

        DB::table('companies')->insert([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'logo_name' => $path,
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
        
        $request->validate([
            'name' => 'required',
            'phone' => 'integer',
            'photo'  => 'dimensions:min_width=100,min_height=100'
        ]);
        


        $comp = Company::find($id);   

        if( $request->photo != null){

            $path = 'storage/'.$comp->logo_name;

            if( File::exists($path)){
                File::delete($path);

            }

            $path = $request->file('photo')->storeAs('logos' , $request->name  .'.jpg' ,  'public');
            $comp->logo_name = $path;

        }

        $comp->name = $request->input('name');
        $comp->address = $request->input('address');
        $comp->phone = $request->input('phone');
        $comp->email = $request->input('email');
        $comp->website = $request->input('website');

        $comp->update();

        return redirect('list')->with('company_status','Company updated successfully');

    }
    public function deleteCompany(Request $request){

        $comp = Company::find($request->id);
        $path = 'storage/'.$comp->logo_name;

        if( File::exists($path)){
            File::delete($path);
            $comp->delete();

        }
        else{
            return back()->with('company_status','Company couldn\'t be deleted, Logo does not exist');

        }
        
        return back()->with('company_status','Company deleted successfuly');
    }
}