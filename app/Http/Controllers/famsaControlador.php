<?php

namespace App\Http\Controllers;

use App\famsa;
use Illuminate\Http\Request;

class famsaControlador extends Controller
{
   public function create(Request $request){
       $pendiente=$request['pendiente'];
       $estatus="0";
       $famsa=new famsa();

       $famsa->pendiente=$pendiente;
       $famsa->estatus=$estatus;

       $famsa->save();

       RETURN redirect()->back();
   } //

    public function show(){
    $famsa=famsa::all();

    return view('index',['famsa'=>$famsa]);
    }

    public function destroy(famsa $famsa)
    {
        $famsa->delete();

        return redirect('/');
    }

    public function update(Request $request, famsa $famsa)
    {
        $famsa->estatus = !$famsa->estatus;
        $famsa->save();

        return redirect('/');
    }

}