<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhotoModel;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function photoIndex(){

        return view('Gallery');

    }
    public function photoJSON(){

        return PhotoModel::take(3)->get();
    }
    public function photoJSONById(Request $request){

            $firstId = $request->id;

            $lastId = $firstId + 3;


         return PhotoModel::where('id','>',$firstId)->where('id','<=',$lastId)->get();



    }
    public function photoUpload(Request $request){

     $photoPath = $request->file('photo')->store('public');

     $photoName = (explode('/',$photoPath))[1];

       $host = $_SERVER['HTTP_HOST'];
       $location ="http://".$host."/storage/".$photoName;

       $result = PhotoModel::insert(['location'=>$location]);

       return $result;

    }
    public function photoDelete(Request $request){

        $oldPhotoUrl = $request->input('oldPhotoUrl');

        $oldPhotoId = $request->input('oldPhotoId');

        $oldPhotoUrlArray = explode('/',$oldPhotoUrl);

        $oldPhotoName = end($oldPhotoUrlArray);

        $deletePhotoFile = Storage::delete('/public'.$oldPhotoName);


        $deleteRow = PhotoModel::where('id','=',$oldPhotoId)->delete();

        return $deleteRow;
    }
}
