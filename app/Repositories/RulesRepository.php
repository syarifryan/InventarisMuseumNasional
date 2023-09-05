<?php

namespace App\Repositories;

use App\Models\Rules;
use Exception;
use Illuminate\Support\Facades\Validator;

class RulesRepository
{
    private $model;

    public function __construct(Rules $rules)
    {
        $this->model = $rules;
    }

    public function get()
    {
        $data = $this->model::get();
        return $data;
    }

    public function getPaginate($howMany)
    {
        $data = $this->model->paginate($howMany);
        return $data;
    }

    public function find($id)
    {
        return $this->model::find($id);
    }

    public function store($request)
    {
        try {
            $validator = Validator::make($request->all(),[
                // "nama_pameran" => "required",
                // "start_date" => "required"
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            try {
                $this->model::create([
                    "id" => $request->id,
                    "co" => $request->co,
                    "no2" => $request->no2,
                    "nh3" => $request->nh3,
                    "grade" => $request->grade,
                ]);
                return ["status"=>"succes", "message"=>"Data stored succesfully."];

            }catch (\Throwable $th) {
                return ["status"=>"error", "message"=>"Error on create data. ".$th->getMessage()];
            }

        }catch (\Throwable $th) {
            return ["status"=>"error", "message"=>$th->getMessage()];
            //return false;
        }

    }

    public function search($keyword)
    {
        $data = $this->model::where("mq2", "LIKE", "%$keyword%")
        ->orWhere("mq7", "LIKE", "%$keyword%")
        ->orWhere("mq136", "LIKE", "%$keyword%")
        ->paginate(10)->withQueryString();
        return $data;
    }

    public function update($request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                // "nama_pameran" => "required",
                // "start_date" => "required"
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $rules_update = $this->model::find($id);

            $rules_update->update([
                "id" => $request->id,
                "co" => $request->co,
                "no2" => $request->no2,
                "nh3" => $request->nh3,
                "grade" => $request->grade,

            ]);
            return ["status"=>"success", "message"=>"Data updated succesfully."];

        } catch (\Throwable $th) {
            return ["status"=>"error", "message"=>$th->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            $data = $this->model::find($id);
            $data->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

}





