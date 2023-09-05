<?php

namespace App\Http\Controllers;

use App\Imports\RulesImport;
use App\Models\User;
use App\Repositories\RulesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RulesController extends Controller
{

    private $rulesRepository;


    function __construct( RulesRepository $rulesRepository)
    {
        $this->middleware('permission:rules-index|rules-add|rules-update|rules-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:rules-add',['only'=>['store']]);
        $this->middleware('permission:rules-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:rules-delete', ['only' => ['destroy']]);
        $this->rulesRepository = $rulesRepository;

        $this->middleware('auth');
    }

    public function index()
    {
        if (request('search')?? false){
            $data = $this->rulesRepository->search(request('search'));
            return view('dashboard.fuzzy-rules.index', compact('data'));
        }else {
            $data = $this->rulesRepository->getPaginate(27);
            return view('dashboard.fuzzy-rules.index', compact('data'));
        }
    }

    public function search(Request $request)
    {
        if(isset($request['q'])){
                $data = $this->rulesRepository->search($request['q']);
                return view('dashboard.fuzzy-rules.index', compact('data'));

        }
        return view('dashboard.fuzzy-rules.index', compact('data'));
    }

    public function import_rules(Request $request)
    {
        if (isset($request->file_csv)) {
            try {
                Excel::import(new RulesImport, $request->file('file_csv'));
                return redirect()->back()->with(['status' => 'Data stored succesfully.']);
                // return ["status" => "succes", "message" => "Data stored succesfully."];
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                return redirect()->back()->withErrors($e->failures());
                // return ["status" => "error", "message" => $e->failures()];
            }
        } else {
            return redirect()->back()->withErrors('Gagal');
            // return response()->json('gagal', 400);
        }
    }

    public function store(Request $request)
    {
        $isSucces = $this->rulesRepository->store($request);
        if($isSucces['status'] == "succes"){
            return redirect()->back()->with(['status'=>$isSucces["message"]]);
        }else {
            return redirect()->back()->withErrors($isSucces["message"]);
        }
    }

    public function show(Request $request,$id)
    {
        if($request->ajax()){
            $data = $this->rulesRepository->find($id);
            return response()->json($data);
        }
    }

    public function update(Request $request, $id)
    {
        $isSuccess = $this->rulesRepository->update($request, $id);
        if($isSuccess['status'] == "success"){
            return redirect()->back()->with(['status'=>$isSuccess["message"]]);
        } else {
            return redirect()->back()->withErrors($isSuccess["message"]);
        }
    }

    public function destroy($id)
    {
        $isSuccess = $this->rulesRepository->destroy($id);
        if($isSuccess){
            return redirect()->back()->with(['status'=>"Data deleted succesfully"]);
        } else {
            return redirect()->back()->withErrors("Failed to delete data.");
        }
    }

}
