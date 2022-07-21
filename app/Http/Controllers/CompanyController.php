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
    public function store(Request $request){


        $request->validate([
            'name' => 'required',
            'phone' => 'numeric|min:10|nullable',
            'photo'  => "dimensions:min_width=100,min_height=100",
            'email' => 'nullable|email:rfc,dns',
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

        return redirect('company-list')->with('company_status','Company added successfully');
    }
    public function show(){
        $companies = DB::table('companies')->get();
        return view('company-list' , compact('companies'));
    }
    public function editCompany($id){
        $post = Company::find($id);
        return view('edit-company' , compact('post'));
    }
    public function update(Request $request , $id ){
        
        $request->validate([
            'name' => 'required',
            'phone' => 'numeric|min:10|nullable',
            'photo'  => 'dimensions:min_width=100,min_height=100',
            'email' => 'nullable|email:rfc,dns',
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

        return redirect('company-list')->with('company_status','Company updated successfully');

    }
    public function destroy(Request $request){

        $comp = Company::find($request->id);
        $path = 'storage/'.$comp->logo_name;

        if( File::exists($path)){
            File::delete($path);
        }
        $comp->delete();
        return back()->with('company_status','Company deleted successfuly');
    }
}