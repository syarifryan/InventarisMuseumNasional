<?php

namespace App\Http\Controllers;

use App\Models\DataSensor;
use App\Models\Handle;
use App\Models\Proses;
use App\Models\Rules;
use App\Models\RulesGrade;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    private $model;
    // private $handle;

    public function __construct(Proses $proses)
    {
        $this->model = $proses;
        $this->middleware('permission:proses-index|proses-add|proses-update|proses-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:proses-add',['only'=>['store']]);
        $this->middleware('permission:proses-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:proses-delete', ['only' => ['destroy']]);

        $this->middleware('auth');
    }

    public function get()
    {
        $proses = $this->model::get();
        return $proses;
    }

    public function find($id)
    {
        return $this->model::find($id);
    }

    public function index()
    {
        $proses = Proses::all();
        $handle = Handle::all(); 
        return view('dashboard.proses.index', compact('proses'));
    }

    public function store(Request $request)
    {
        $data = DataSensor::latest()->first();
        $co = $data->co;
        $nh = $data->nh3;
        $no = $data->no2;
        $dataHitung = [
            'co' => $co,
            'nh3' => $nh,
            'no2' => $no,
        ];
        Proses::create($dataHitung);
        // echo json_encode($dataHitung);

    //Fungsi Keanggotaan Start
        //Karbon Monoksida
        //rendah
        if($co > 10 && $co <= 20){
            $coR = (20 - $co) / (10);
        }else if($co <= 10){
            $coR = 1;
        }

        //sedang
        if($co > 10 && $co <= 20){
            $coS = ($co - 10) / (10);
        }else if($co > 20 && $co <= 40){
            $coS = 1;
        }else if($co > 40 && $co <=50){
            $coS = (50 - $co) / (10);
        }

        //tinggi
        if($co > 40 && $co <= 50){
            $coT = ($co - 40) / (10);
        }else if($co > 50){
            $coT = 1;
        }

        //Amonia
        //rendah
        if($nh > 20 && $nh <= 30){
            $nhR = (30 - $nh) / (30 - 20);
        }else if($nh <= 20){
            $nhR = 1;
        }

        //sedang
        if($nh > 20 && $nh <= 30){
            $nhS = ($nh - 20) / (10);
        }else if($nh > 30 && $nh <= 50){
            $nhS = 1;
        }else if($nh > 50 && $nh <= 60){
            $nhS = (60 - $nh) / (60 - 50);
        }

        //tinggi
        if($nh > 50 && $nh <= 60){
            $nhT = ($nh - 50) / (10);
        }else if($nh > 60){
            $nhT = 1;
        }

        //Nitrogen Dioksida
        //rendah
        if($no > 750 && $no <= 1500){
            $noR = (1500 - $no) / (1500 - 750);
        }else if($no <= 750){
            $noR = 1;
        }

        //sedang
        if($no > 750 && $no <= 1500){
            $noS = ($no - 750) / (750);
        }else if($no > 1500 && $no <= 2500){
            $noS = 1;
        }else if($no > 2500 && $no <= 3000){
            $noS = (3000 - $no) / (3000 - 2500);
        }

        //tinggi
        if($no > 2500 && $no <= 3000){
            $noT = ($no - 2500) / (500);
        }else if($no > 3000){
            $noT = 1;
        }
    //Fungsi Keanggotaan End

        //Set Value Keanggotaan
        $co_setR = $nh_setR = $no_setR = "Rendah";
        $co_setS = $nh_setS = $no_setS = "Sedang";
        $co_setT = $nh_setT = $no_setT = "Tinggi";

    //Fuzzyfikasi
        //co
        if (isset($coR) && isset($coS)) {
            $coOutput = [$coR, $coS];
            $coGrade = [$co_setR, $co_setS];
        } else  if (isset($coR) && isset($coT)) {
            $coOutput = [$coR, $coT];
            $coGrade = [$co_setR, $co_setT];
        } else  if (isset($coS) && isset($coT)) {
            $coOutput = [$coS, $coT];
            $coGrade = [$co_setS, $co_setT];
        } else if (isset($coR)) {
            $coOutput = [$coR];
            $coGrade = [$co_setR];
        } else if (isset($coS)) {
            $coOutput = [$coS];
            $coGrade = [$co_setS];
        } else if (isset($coT)) {
            $coOutput = [$coT];
            $coGrade = [$co_setT];
        }
        //nh3 
        if (isset($nhR) && isset($nhS)) {
            $nhOutput = [$nhR, $nhS];
            $nhGrade = [$nh_setR, $nh_setS];
        } else  if (isset($nhR) && isset($nhT)) {
            $nhOutput = [$nhR, $nhT];
            $nhGrade = [$nh_setR, $nh_setT];
        } else  if (isset($nhS) && isset($nhT)) {
            $nhOutput = [$nhS, $nhT];
            $nhGrade = [$nh_setS, $nh_setT];
        } else if (isset($nhR)) {
            $nhOutput = [$nhR];
            $nhGrade = [$nh_setR];
        } else if (isset($nhS)) {
            $nhOutput = [$nhS];
            $nhGrade = [$nh_setS];
        } else if (isset($nhT)) {
            $nhOutput = [$nhT];
            $nhGrade = [$nh_setT];
        } 
        //no2
        if (isset($noR) && isset($noS)) {
            $noOutput = [$noR, $noS];
            $noGrade = [$no_setR, $no_setS];
        } else  if (isset($noR) && isset($noT)) {
            $noOutput = [$noR, $noT];
            $noGrade = [$no_setR, $no_setT];
        } else  if (isset($noS) && isset($noT)) {
            $noOutput = [$noS, $noT];
            $noGrade = [$no_setS, $no_setT];
        } else if (isset($noR)) {
            $noOutput = [$noR];
            $noGrade = [$no_setR];
        } else if (isset($noS)) {
            $noOutput = [$noS];
            $noGrade = [$no_setS];
        } else if (isset($noT)) {
            $noOutput = [$noT];
            $noGrade = [$no_setT];
        } 

        // echo json_encode($coOutput);
        // echo json_encode($nhOutput);
        // echo json_encode($noOutput);
        // echo json_encode($coGrade);
        // echo json_encode($nhGrade);
        // echo json_encode($noGrade);


    //RULE START
        foreach ($coGrade as $key_co => $co_value) {
            foreach ($nhGrade as $key_nh => $nh_value) {
                foreach ($noGrade as $key_no => $no_value) {
                    $rule = Rules::where('co', $co_value)->where('nh3', $nh_value)->where('no2', $no_value)->get();
                    // echo json_encode($rule);
                    $min = min($coOutput[$key_co], $nhOutput[$key_nh], $noOutput[$key_no]);
                    foreach ($rule as $rules) {
                        $dataRules = [
                            'proses_id' => Proses::latest()->first()->id,
                            'rules_id' => $rules->id,
                            'nilai_min' => $min,
                        ];
                        RulesGrade::create($dataRules);
                        // echo json_encode($dataRules);
                    }
                }
            }
        }
    //RULE END

        //mencari rules dengan nilai min
        $getRules = RulesGrade::where('proses_id', Proses::latest()->first()->id)
        ->with('rules','proses')
        ->get();
        // echo json_encode($getRules);

        //mencari nilai z
        foreach ($getRules as $gr) {
            $grade = $gr->rules->grade;
            $min = $gr->nilai_min;
            if ($grade == "Baik") {
                $gradeBaik = 0 + ($min * (50 - 0));
                $hasil = $gradeBaik * $min;
            } else if ($grade == "Sedang") {
                $gradeSedang = 51 + ($min * (100 - 51));
                $hasil = $gradeSedang * $min;
            } else if ($grade == "Tidak Sehat") {
                $gradeTidakSehat = 101 + ($min * (200 - 101));
                $hasil = $gradeTidakSehat * $min;
            } else if ($grade == "Sangat Tidak Sehat") {
                $gradeSangetTidakSehat = 201 + ($min * (300 - 201));
                $hasil = $gradeSangetTidakSehat * $min; 
            } else if ($grade == "Berbahaya") {
                $gradeBerbahaya = 301 + ($min * (350 - 301));
                $hasil = $gradeBerbahaya * $min;
            }
            //update rulesgrade
            RulesGrade::where('id', $gr->id)->update([
                'inf' => $hasil,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        // echo json_encode($getRules);


    //DEFUZZYFIKASI
        $inf = RulesGrade::where('proses_id', Proses::latest()->first()->id)->sum('inf');
        $sums = RulesGrade::where('proses_id', Proses::latest()->first()->id)->sum('nilai_min');
        $defuzzy = $inf / $sums;

        //output fuzzy
        if($defuzzy <=50){
            $status = 'Baik';
        } else if ($defuzzy > 51 && $defuzzy <= 100){
            $status = 'Sedang';
        } else if ($defuzzy > 101 && $defuzzy <= 200){
            $status = 'Tidak Sehat';
        } else if ($defuzzy > 201 && $defuzzy <= 300){
            $status = 'Sangat Tidak Sehat';
        }else if ($defuzzy > 301){
            $status = 'Berbahaya';
        }


        //add to proses
        $data = [
            // 'CO' => $co,
            // 'NH3' => $nh,
            // 'NO2' => $no,
            'defuzzy' => ceil($defuzzy),
            'grade' => $status,
            // 'handle_id' => $handling,
        ];
        Proses::where('id', Proses::latest()->first()->id)->update($data);
        // echo json_encode($data);
        // dd($data);
        return redirect()->route('dashboard.proses.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if($request->ajax()){
            $data = $this->model->find($id);
            return response()->json($data);
        }
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
