<?php

namespace App\Repositories;

use App\Models\Handle;
use Exception;
use Illuminate\Support\Facades\Validator;

class HandleRepository
{
    private $model;

    public function __construct(Handle $handle)
    {
        $this->model = $handle;
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
                    "rentang_1" => $request->rentang_1,
                    "rentang_2" => $request->rentang_2,
                    "penanganan" => $request->penanganan,
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

            $pameran = $this->model::find($id);

            $pameran->update([
                "id" => $request->id,
                "rentang_1" => $request->rentang_1,
                "rentang_2" => $request->rentang_2,
                "penanganan" => $request->penanganan,
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





