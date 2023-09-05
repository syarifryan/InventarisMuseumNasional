<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //insert data to table perhitungan
        Perhitungan::create([
            'title' => $request->title,
            'location' => $request->location,
            'ispu' => "2",
            'nilai' => $request->nilai,
        ]);
        // insert data to table perhitungan
        $mq7_co = $request->mq7_co;
        $mq135_no2 = $request->mq135_no2;
        $mq135_nh3 = $request->mq135_nh3;
        $data = [
            'proses_id' => Perhitungan::latest()->first()->id,
            'mq7_co' => $mq7_co,
            'mq135_no2' => $mq135_no2,
            'mq135_nh3' => $mq135_nh3,
        ];
        // Perhitungan::create($data);
        // echo json_encode($data);
        // Rules
        //FUNGSI KEANGGOTAAN
        //mq7_co Rendah
        if ($mq7_co >= 25 && $mq7_co <= 35){
            if($mq7_co >= 28 && $mq7_co <= 30){
                $mq7_co_rendah = 1;
            }else if($mq7_co > 25 && $mq7_co < 28){
                $mq7_co_rendah = ($mq7_co - 25) / (28 - 25);
            }else if($mq7_co > 30 && $mq7_co < 35){
                $mq7_co_rendah = (35 - $mq7_co) / (35 - 30);
            }else if($mq7_co <= 25 || $mq7_co >= 35){
                $mq7_co_rendah = 0;
            }
        }
        // echo json_encode($mq7_coA);
        //mq7_co Sedang
        if (($mq7_co >= 22 && $mq7_co <= 28) or ($mq7_co >= 30 && $mq7_co <= 40)){
            if(($mq7_co >= 24 && $mq7_co <= 25) or ($mq7_co >= 35 && $mq7_co <= 38)){
                $mq7_co_sedang = 1;
            }else if($mq7_co > 22 && $mq7_co < 24){
                $mq7_co_sedang = ($mq7_co - 22) / (24 - 22);
            }else if($mq7_co > 25 && $mq7_co < 28){
                $mq7_co_sedang = (28 - $mq7_co) / (28 - 25);
            }else if($mq7_co > 30 && $mq7_co < 35){
                $mq7_co_sedang = ($mq7_co - 30) / (35 - 30);
            }else if($mq7_co > 38 && $mq7_co < 40){
                $mq7_co_sedang = (40 - $mq7_co) / (40 - 38);
            }else if($mq7_co <= 22 || $mq7_co >= 28 && $mq7_co <= 30 || $mq7_co >= 40 ){
                $mq7_co_sedang = 0;
            }
        }
        // echo json_encode($mq7_co_sedang);

        //mq135_no2 Rendah
        if ($mq135_no2 >= 18 && $mq135_no2 <= 30){
            if($mq135_no2 >= 20 && $mq135_no2 <= 28){
                $mq135_no2_rendah = 1;
            }else if($mq135_no2 > 18 && $mq135_no2 < 20){
                $mq135_no2_rendah = ($mq135_no2 - 18) / (20 - 18);
            }else if($mq135_no2 > 28 && $mq135_no2 < 30){
                $mq135_no2_rendah = (30 - $mq135_no2) / (30 - 28);
            }else if($mq135_no2 <= 18 || $mq135_no2 >= 30){
                $mq135_no2_rendah = 0;
            }
        }
        // echo json_encode($mq135_no2_rendah);
        //mq135_no2 Sedang
        if (($mq135_no2 >= 10 && $mq135_no2 <= 20) or ($mq135_no2 >= 28 && $mq135_no2 <= 38)){
            if(($mq135_no2 >= 13 && $mq135_no2 <= 18) or ($mq135_no2 >= 30 && $mq135_no2 <= 35)){
                $mq135_no2_sedang = 1;
            }else if($mq135_no2 > 10 && $mq135_no2 < 13){
                $mq135_no2_sedang = ($mq135_no2 - 10) / (13 - 10);
            }else if($mq135_no2 > 18 && $mq135_no2 < 20){
                $mq135_no2_sedang = (20 - $mq135_no2) / (20 - 18);
            }else if($mq135_no2 > 28 && $mq135_no2 < 30){
                $mq135_no2_sedang = ($mq135_no2 - 28) / (30 - 28);
            }else if($mq135_no2 > 35 && $mq135_no2 < 38){
                $mq135_no2_sedang = (38 - $mq135_no2) / (38 - 35);
            }else if($mq135_no2 <= 10 || $mq135_no2 >= 20 && $mq135_no2 <= 28 || $mq135_no2 >= 38 ){
                $mq135_no2_sedang = 0;
            }
        }
        // echo json_encode($mq135_no2_sedang);

       
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
