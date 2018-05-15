@extends('layouts.app')

@section('title')
    Profile
    @section('smtitle')
        Edit Profile
    @endsection
@endsection

@section('breadcrumb')
    @parent
    <li> User User </li><li> Edit Profile </li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <form class="form form-horizontal" data-toggle="validator" role="form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }} {{  method_field('PATCH') }}
                <div class="box-header with-border">
                    <h3 class="box-title">Profil Pengguna</h3>
                </div>
                <div class="box-body">
                    <div class="alert alert-success alert-dismissable" style="display:none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i>
                        Perubahan berhasil disimpan!
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-md-2 control-label">Foto Profil</label>
                        <div class="col-md-4">
                            <input type="file" class="form-control" name="foto" id="foto">
                            <br/>
                            <div class="tampil-foto"><img src="{{ asset('images/'.Auth::user()->foto) }}" width="200"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passwordlama" class="col-md-2 control-label">Password Lama</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="passwordlama" name="passwordlama" placeholder="Password Lama">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-2 control-label">Password Baru</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password1" class="col-md-2 control-label">Ulangi Password Baru</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" data-match="#password" name="password1" placeholder="Re-Type Password">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                    <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
        $('#passwordlama').keyup(function(){
            if($(this).val() !== "") $('#password, #password1').attr('required', true);
            else $('#password, #password1').attr('required', false);
        });
        $('.form').validator().on('submit', function(e){
            if(!e.isDefaultPrevented()){
                $.ajax({
                    url: "{{ Auth::user()->id_user }}/change",
                    type: "POST",
                    data: new FormData($(".form")[0]),
                    dataType: "JSON",
                    async: true,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        if(data.msg === "error"){
                            alert('Password lama salah!');
                            $('#passwordlama').focus().select();
                        }else{
                            d = new Date();
                            $('.alert').css('display', 'block').delay(2000).fadeOut();

                            $('.tampil-foto img, .user-image, .img-circle, .user-header img').attr('src', data.url+'?'+d.getTime());
                        }
                    },
                    error: function(){
                        alert("Tidak dapat menyimpan Data!");
                    }
                });
                return false;
            }
        });
        $('#beranda').removeClass('active');
        $('#users').addClass('active treeview');
    });
</script>
@endsection
