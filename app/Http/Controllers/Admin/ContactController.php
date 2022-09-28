<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Contact;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
    $contacts = Contact::all();
    return view('admin.contacts',['contacts'=>$contacts]);
    }

    public function generalList(){
        $contacts = Contact::all();
        return response()->json(['contacts'=>$contacts]);
    }


    public function show($id){
        $contact = Contact::find($id);
        if(!$contact){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['contact'=>$contact]);
    }


}
