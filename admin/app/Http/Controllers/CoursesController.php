<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseModel;

class CoursesController extends Controller
{
    function CoursesIndex()
    {

        return view('Courses');
    }
     function getCoursesData()
    {

        $CoursesData = json_encode(CourseModel::orderBy('id','desc')->get());

        return $CoursesData;

    }
     function getCourseDetails(Request $request)
    {

        $id = $request->input('id');

        $CoursesData = json_encode(CourseModel::where('id', '=', $id)->get());

        return $CoursesData;

    }
     function CourseDelete(Request $request)
    {

        $id = $request->input('id');

        $result = CourseModel::where('id', '=', $id)->delete();

        return ($result) ? 1 : 0;
    }
      function getCourseUpdate(Request $request)
    {

        $id = $request->input('id');

        $course_name = $request->input('course_name');

        $course_des = $request->input('course_des');

        $course_fee = $request->input('course_fee');

        $course_totalenroll = $request->input('course_totalenroll');

        $course_totalclass = $request->input('course_totalclass');

        $course_link = $request->input('course_link');

        $course_img = $request->input('course_img');

         

        $coursesData = CourseModel::where('id', '=', $id)->update([

        	'course_name'=>$course_name,
        	'course_des'=>$course_des,
        	'course_fee'=>$course_fee,
        	'course_totalenroll'=>$course_totalenroll,
        	'course_totalclass'=>$course_totalclass,
        	'course_link'=>$course_link,
        	'course_img'=>$course_img
        ]);

        return ($coursesData)? 1 : 0 ;

    }
      function getCourseAdd(Request $request)
    {

 

        $course_name = $request->input('course_name');

        $course_des = $request->input('course_des');

        $course_fee = $request->input('course_fee');

        $course_totalenroll = $request->input('course_totalenroll');

        $course_totalclass = $request->input('course_totalclass');

        $course_link = $request->input('course_link');

        $course_img = $request->input('course_img');

        $servicesData = CourseModel::insert([
        	
        	'course_name'=>$course_name,
        	'course_des'=>$course_des,
        	'course_fee'=>$course_fee,
        	'course_totalenroll'=>$course_totalenroll,
        	'course_totalclass'=>$course_totalclass,
        	'course_link'=>$course_link,
        	'course_img'=>$course_img
        ]);

        return ($servicesData)? 1 : 0 ;

    }
}
