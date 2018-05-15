<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mako;
use App\Helpers\AutoNumber;

class MakoController extends Controller
{
    public function index()
    {
        return view('mako.index');
    }

    public function listData()
    {
        $mako = Mako::orderBy('id_mako', 'asc')->get();
        $no = 0;
        $data = array();
        foreach ($mako as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->id_mako;
            $row[] = $list->nama;
            $row[] = $list->alamat;
            $row[] = $list->komandan;
            $row[] = $list->status==1?'Pusat':'Cabang';
            $row[] = "
                <div class=\"btn-group\">
                    <a onclick=\"editForm('" . $list->id_mako . "')\" class=\"btn btn-primary btn-sm\"><i class=\"fa fa-pencil\"></i></a>
                    <a onclick=\"deleteData('" . $list->id_mako . "')\" class=\"btn btn-danger btn-sm\"><i class=\"fa fa-trash\"></i></a>
                </div>
            ";
            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }

    public function store(Request $request)
    {
        $mako = new Mako;
        $mako->id_mako = $request['idmako'];
        $mako->nama = strtoupper($request['nama']);
        $mako->alamat = ucfirst($request['alamat']);
        $mako->komandan =  ucfirst($request['komandan']);
        $mako->status = $request['status'];
        $mako->save();
    }

    public function edit($id)
    {
        $mako = Mako::find($id);
        echo json_encode($mako);
    }

    public function update(Request $request, $id)
    {
        $mako = Mako::find($id);
        $mako->nama = strtoupper($request['nama']);
        $mako->alamat = ucfirst($request['alamat']);
        $mako->komandan = ucfirst($request['komandan']);
        $mako->status = $request['status'];
        $mako->update();
    }

    public function destroy($id)
    {
        $mako = Mako::find($id);
        $mako->delete();
    }

    public function getnumber() {
        $table = 'mako';
        $primary = 'id_mako';
        $prefix = 'MKO-';
        $data = Autonumber::autonumber($table, $primary, $prefix);
        echo json_encode($data);
    }
}
