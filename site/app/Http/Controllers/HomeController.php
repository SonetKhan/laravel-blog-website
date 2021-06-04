<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
use App\ServicesModel;
use App\CourseModel;
use App\ProjectsModel;
use App\ContactModel;
use App\ReviewModel;
class HomeController extends Controller
{
    function HomeIndex(){
        $UserIP=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate= date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address'=>$UserIP,'visit_time'=>$timeDate]);

        $ServicesData = ServicesModel::all();

        $CoursesData = CourseModel::orderBy('id','desc')->limit(7)->get();

        $ProjectData = ProjectsModel::orderBy('id','desc')->limit(10)->get();
        $ReviewData = ReviewModel::all();


        return view('Home',['ServicesData'=>$ServicesData,'CourseData'=>$CoursesData,'ProjectData'=>$ProjectData,'ReviewData'=>$ReviewData]);

    }
    function ContactSend(Request $request){

        $contact_name = $request->input('contact_name');

        $contact_mobile =  $request->input('contact_mobile');

        $contact_email = $request->input('contact_email');

        $contact_message = $request->input('contact_message');

         $result = ContactModel::insert([
               'contact_name'=>$contact_name,
               'contact_mobile'=>$contact_mobile,
               'contact_email'=>$contact_email,
               'contact_message'=>$contact_message
           ]);
        return ($result) ? 1 : 0;
    }
}
