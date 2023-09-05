<?php

namespace App\Http\Controllers;

use App\Models\DataSensor;
use Exception;
use Illuminate\Http\Request;

class FuzzyController extends Controller
{

    public function store(Request $request)
    {
        $validation = $request->validate([
            "CO" => ["required", "string"],
            "NO2" => ["required", "string"],
            "NH3" => ["required", "string"]
        ]);
        try {
            DataSensor::create($validation);
            return response()->json(["message" => "data berhasil dikirim"], 200);
        } catch (Exception $error) {
            dd($error->getMessage());
        }
    }

}