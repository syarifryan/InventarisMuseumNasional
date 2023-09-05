<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\PameranRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PameranController extends Controller
{

    private $pameranRepository;


    function __construct( PameranRepository $pameranRepository)
    {
        $this->middleware('permission:pameran-index|pameran-add|pameran-update|pameran-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:pameran-add',['only'=>['store']]);
        $this->middleware('permission:pameran-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pameran-delete', ['only' => ['destroy']]);
        $this->pameranRepository = $pameranRepository;

        $this->middleware('auth');
    }

    public function index()
    {
        if (request('search')?? false){
            $data = $this->pameranRepository->search(request('search'));
            return view('dashboard.pameran.index', compact('data'));
        }else {
            $data = $this->pameranRepository->getPaginate(10);
            return view('dashboard.pameran.index', compact('data'));
        }
    }

    public function search(Request $request)
    {
        if(isset($request['q'])){
                $data = $this->pameranRepository->search($request['q']);
                return view('dashboard.pameran.index', compact('data'));

        }
        return view('dashboard.pameran.index', compact('data'));
    }

    public function store(Request $request)
    {
        $isSucces = $this->pameranRepository->store($request);
        if($isSucces['status'] == "succes"){
            return redirect()->back()->with(['status'=>$isSucces["message"]]);
        }else {
            return redirect()->back()->withErrors($isSucces["message"]);
        }
    }

    public function show(Request $request,$id)
    {
        if($request->ajax()){
            $data = $this->pameranRepository->find($id);
            return response()->json($data);
        }
    }

    public function update(Request $request, $id)
    {
        $isSuccess = $this->pameranRepository->update($request, $id);
        if($isSuccess['status'] == "success"){
            return redirect()->back()->with(['status'=>$isSuccess["message"]]);
        } else {
            return redirect()->back()->withErrors($isSuccess["message"]);
        }
    }

    public function destroy($id)
    {
        $isSuccess = $this->pameranRepository->destroy($id);
        if($isSuccess){
            return redirect()->back()->with(['status'=>"Data deleted succesfully"]);
        } else {
            return redirect()->back()->withErrors("Failed to delete data.");
        }
    }

    public function getUserId(Request $request)
    {
        $user = User::where('id',$id)->firstOrFail();
    return view('dashboard.index', compact('user'));

    }
}
