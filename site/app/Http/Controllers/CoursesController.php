<?php

namespace App\Http\Controllers;

use App\CourseModel;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
    function CoursesPage(){
        $CoursesData = CourseModel::orderBy('id','desc')->get();
        return view('Course',['CoursesData'=>$CoursesData]);
    }
}
