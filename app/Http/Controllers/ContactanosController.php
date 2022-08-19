<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactanos;
use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index(){
        return view('contactanos.index');
    }

    public function store(StoreContactanos $request){
        $correo=new ContactanosMailable($request->all());
        Mail::to('davidmra00@gmail.com')->send($correo);

        return redirect()->route('contactanos.index')->with('info','Correo Enviado');
    }
}
