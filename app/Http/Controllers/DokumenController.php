<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use App\Auth;
use App\Mako;
use App\User;
use App\Helpers\AutoNumber;

class DokumenController extends Controller
{
    public function index()
    {
        return view('dokumen.index');
    }

    public function compose(){
        $mako = Mako::all();
        $dokumen = Dokumen::all();
        return view('dokumen.compose', compact('dokumen', 'mako'));
    }

    public function upload(Request $request){
        $msg = "success";
        if($request->hasFile('namafile')){
            $file = $request->file('namafile');
            $namaberkas = "dokumen".$id.".".$file->getClientOriginalExtension();
            $lokasi = public_path('files');

            $file->move($lokasi, $namaberkas);
            $datadokumen = $namaberkas;
        }else{
            $datadokumen = "";
        }

        echo json_encode(array('msg'=>$msg, 'url'=>asset('files/'.$datadokumen)));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
