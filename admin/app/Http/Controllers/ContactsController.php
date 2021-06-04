<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactModel;

class ContactsController extends Controller
{
    function ContactsIndex()
    {

        return view('Contacts');
    }
    function getContactsData()
    {

        $contactsData = json_encode(ContactModel::orderBy('id','desc')->get());

        return $contactsData;

    }
    function getServiceDetails(Request $request)
    {

        $id = $request->input('id');

        $servicesData = json_encode(ServicesModel::where('id', '=', $id)->get());

        return $servicesData;

    }
    function contactDelete(Request $request)
    {

        $id = $request->input('id');

        $result = ContactModel::where('id', '=', $id)->delete();

        return ($result) ? 1 : 0;
    }
   
   
}
