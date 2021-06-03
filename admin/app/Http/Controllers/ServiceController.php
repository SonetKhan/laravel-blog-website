<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServicesModel;

class ServiceController extends Controller
{
    function ServiceIndex()
    {

        return view('Services');
    }
    function getServiceData()
    {

        $servicesData = json_encode(ServicesModel::orderBy('id','desc')->get());

        return $servicesData;

    }
    function getServiceDetails(Request $request)
    {

        $id = $request->input('id');

        $servicesData = json_encode(ServicesModel::where('id', '=', $id)->get());

        return $servicesData;

    }
    function serviceDelete(Request $request)
    {

        $id = $request->input('id');

        $result = ServicesModel::where('id', '=', $id)->delete();

        return ($result) ? 1 : 0;
    }
    function getServiceUpdate(Request $request)
    {

        $id = $request->input('id');

        $serviceName = $request->input('service_name');

        $serviceDesc = $request->input('service_des');

         $serviceImg = $request->input('service_img');

        $servicesData = ServicesModel::where('id', '=', $id)->update(['service_name'=>$serviceName,'service_des'=>$serviceDesc,'service_img'=>$serviceImg]);

        return ($servicesData)? 1 : 0 ;

    }
    function getServiceAdd(Request $request)
    {

        $id = $request->input('id');

        $serviceName = $request->input('service_name');

        $serviceDesc = $request->input('service_des');

         $serviceImg = $request->input('service_img');

        $servicesData = ServicesModel::insert(['service_name'=>$serviceName,'service_des'=>$serviceDesc,'service_img'=>$serviceImg]);

        return ($servicesData)? 1 : 0 ;

    }
}

