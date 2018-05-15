<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\User;
use Hash;
use Auth;
use App\Helpers\AutoNumber;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function listData()
    {
        $user = User::where('level', '!=', 0)->orderBy('id_user', 'asc')->get();
        $no = 0;
        $data = array();
        foreach($user as $list){
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->id_user;
            $row[] = $list->name;
            $row[] = $list->email;
            $row[] = '<img src="images/'.$list->foto.'" width="32" height="32">';
            $row[] = $list->level==1?'Administrator':'Operator';
            $row[] = $list->status==1?'Aktif':'Tidak Aktif';
            $row[] = "
                <div class=\"btn-group\">
                    <a onclick=\"editForm('". $list->id_user ."')\" class=\"btn btn-primary btn-sm\"><i class=\"fa fa-pencil\"></i></a>
                    <a onclick=\"deleteData('". $list->id_user ."')\" class=\"btn btn-danger btn-sm\"><i class=\"fa fa-trash\"></i></a>
                </div>
            ";
            $data[] = $row;
        }
        $output = array("data"=>$data);
        return response()->json($output);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->id_user = $request['iduser'];
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->status = $request['status'];
        $user->level = 2;
        $user->foto = "user.png";
        $user->save();
    }

    public function edit($id)
    {
        $user = User::find($id);
        echo json_encode($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->status = $request['status'];
        if(!empty($request['password']))
        $user->password = bcrypt($request['password']);
        $user->update();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    public function profil(){
        $user = Auth::user();
        return view('user.profil', compact('user'));
    }

    public function changeProfil(Request $request, $id){
        $msg = "success";
        $user = User::find($id);
        if(!empty($request['password'])){
            if(Hash::check($request['passwordlama'], $user->password)){
                $user->password = bcrypt($request['password']);
            }else{
                $msg = 'error';
            }
        }

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $nama_gambar = "fotouser".$id.".".$file->getClientOriginalExtension();
            $lokasi = public_path('images');

            $file->move($lokasi, $nama_gambar);
            $user->foto = $nama_gambar;
            $datagambar = $nama_gambar;
        }else{
            $datagambar = $user->foto;
        }

        $user->update();
        echo json_encode(array('msg'=>$msg, 'url'=>asset('images/'.$datagambar)));
    }

    public function getnumber() {
        $table = 'users';
        $primary = 'id_user';
        $prefix = 'USR-';
        $data = Autonumber::autonumber($table, $primary, $prefix);

        echo json_encode($data);
    }
}
