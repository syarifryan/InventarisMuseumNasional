<?php

namespace App\Http\Controllers;

use App\Models\DataSensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('dashboard.sensor.index');
    }


    public function getDataSensor(Request $request){

        $id_from_url = $request->get('id');
        $data = DataSensor::orderBy('created_at')->take(10)->get()->reverse()->values();

        return response()->json($data);
    }

    public function getDataSensorAll(){
        $data = DataSensor::orderBy('created_at', 'desc')->take(20)->get()->reverse()->values();
        return response()->json($data);
    }

    public function getOneLastDataSensor(){

        $data = DataSensor::orderBy('created_at', 'desc')->latest()->first();

        if ($data->count() == 0){
            // return response error untuk ajax
            return response()->json(['error' => 'Data tidak ditemukan'], 400);

        } else {
            // return response success untuk ajax
            return response()->json($data);
        }

        // $data = sensor::orderBy('tanggal', 'desc')->latest()->first();
        return response()->json($data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
