<?php

namespace App\Http\Controllers;

use App\Models\DataSensor;
use Illuminate\Http\Request;

class FuzzyController extends Controller
{

    public function store(Request $request)
    {
        // dd($request->all());

        $sensorz = new DataSensor();
        $sensorz->co = $request->get('co');
        $sensorz->nh3 = $request->get('nh3');
        $sensorz->no2 = $request->get('no2');
        $sensorz->save();
        return response()->json($sensorz);
        
    }

}
