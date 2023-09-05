<?php

namespace App\Http\Controllers;

use App\Imports\HandleImport;
use App\Repositories\HandleRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HandleController extends Controller
{
    private $handleRepository;
    
    function __construct( HandleRepository $handleRepository)
    {
        $this->middleware('permission:handle-index|handle-add|handle-update|handle-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:handle-add',['only'=>['store']]);
        $this->middleware('permission:handle-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:handle-delete', ['only' => ['destroy']]);
        $this->handleRepository = $handleRepository;

        $this->middleware('auth');
    }

    public function index()
    {
        if (request('search')?? false){
            $data = $this->handleRepository->search(request('search'));
            return view('dashboard.handle.index', compact('data'));
        }else {
            $data = $this->handleRepository->getPaginate(27);
            return view('dashboard.handle.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import_handle(Request $request)
    {
        if (isset($request->file_csv)) {
            try {
                Excel::import(new HandleImport, $request->file('file_csv'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isSucces = $this->handleRepository->store($request);
        if($isSucces['status'] == "succes"){
            return redirect()->back()->with(['status'=>$isSucces["message"]]);
        }else {
            return redirect()->back()->withErrors($isSucces["message"]);
        }
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
            $data = $this->handleRepository->find($id);
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
        $isSuccess = $this->handleRepository->update($request, $id);
        if($isSuccess['status'] == "success"){
            return redirect()->back()->with(['status'=>$isSuccess["message"]]);
        } else {
            return redirect()->back()->withErrors($isSuccess["message"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isSuccess = $this->handleRepository->destroy($id);
        if($isSuccess){
            return redirect()->back()->with(['status'=>"Data deleted succesfully"]);
        } else {
            return redirect()->back()->withErrors("Failed to delete data.");
        }
    }
}
