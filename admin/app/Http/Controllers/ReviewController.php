<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ReviewModel;

class ReviewController extends Controller
{
   function reviewIndex()
    {

        return view('Review');
    }
     function getReviewsData()
    {

        $reviewsData = json_encode(ReviewModel::orderBy('id','desc')->get());

        return $reviewsData;

    }
     function getReviewDetails(Request $request)
    {

        $id = $request->input('id');

        $reviewsData = json_encode(ReviewModel::where('id', '=', $id)->get());

        return $reviewsData;

    }
     function reviewDelete(Request $request)
    {

        $id = $request->input('id');

        $result = ReviewModel::where('id', '=', $id)->delete();

         

           return ($result) ? 1 : 0;

        

        // return ($result) ? 1 : 0;
    }
      function getReviewUpdate(Request $request)
    {

        $id = $request->input('id');

        $name = $request->input('name');

        $des = $request->input('des');

        $img = $request->input('img');

         

        $coursesData = ReviewModel::where('id', '=', $id)->update([

        	'name'=>$name,
        	'des'=>$des,
        	
        	'img'=>$img
        ]);

        return ($coursesData)? 1 : 0 ;

    }
      function getReviewAdd(Request $request)
    {

 

        $name = $request->input('name');

        $des = $request->input('des');

        $img = $request->input('img');

        $reviewsData = ReviewModel::insert([
        	
        	'name'=>$name,
        	'des'=>$des,
        	'img'=>$img
        ]);

        return ($reviewsData)? 1 : 0 ;

    }
   
}
