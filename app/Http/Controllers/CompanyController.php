<?php

namespace App\Http\Controllers;

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

        return back()->with('company_add' , 'Company added successfully');
    }
    public function listCompany(){
        $posts = DB::table('companies')->get();
        return view('list' , compact('posts'));
    }
    public function editCompany($id){
        $post = DB::table('companies')->where('id' , $id)->first();
        return view('edit-company' , compact('post'));
    }
    public function updateCompany(Request $request){
        DB::table('companies')->where('id',$request->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'logo_name' => $request->logo_name,
            'website' => $request->website
        ]);

        return back()->with('company_update' , 'Company updated successfully!');
    }
    public function deleteCompany($id){

    }
}