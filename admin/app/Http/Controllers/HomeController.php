<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ContactModel;

use App\CourseModel;

use App\ProjectsModel;

use App\ReviewModel;

use App\ServicesModel;

use App\VisitorModel;

class HomeController extends Controller
{
    function HomeIndex(){
    	
    	$totalContact = ContactModel::count();

    	$totalCourse = CourseModel::count();

    	$totalProject = ProjectsModel::count();

    	$totalReview = ReviewModel::count();

    	$totalService = ServicesModel::count();

    	$totalVisitor = VisitorModel::count();

    	return view('Home',[

    		'totalContact'=>$totalContact,
    		'totalCourse'=>$totalCourse,
    		'totalProject'=>$totalProject,
    		'totalReview'=> $totalReview,
    		'totalService'=>$totalService,
    		'totalVisitor'=>$totalVisitor
    ]);
    }
}
