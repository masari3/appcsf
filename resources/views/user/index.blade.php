@extends('layouts.app')

@section('title')
    Daftar Pengguna Aplikasi
@endsection

@section('breadcrumb')
    @parent
    <li> Pengguna </li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="30">No</th>
                            <th width="80">ID User</th>
                            <th>Nama Pengguna</th>
                            <th width="180">Email</th>
                            <th width="50">Foto</th>
                            <th width="70">Level</th>
                            <th width="100">Status</th>
                            <th width="100" style="background:#DDD;">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th width="30">No</th>
                            <th width="80">ID User</th>
                            <th>Nama Pengguna</th>
                            <th width="180">Email</th>
                            <th width="50">Foto</th>
                            <th width="70">Level</th>
                            <th width="100">Status</th>
                            <th width="100" style="background:#DDD;">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody></tbody>
                </table>
            </div>
            <div class="box-header">
                <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
            </div>
        </div>
    </div>
</div>

@include('user.form')
@endsection

@section('script')
<script type="text/javascript">
    var table, save_method;
    $(function() {
        table = $('.table').DataTable({
            "processing": true,
            "ajax": {
                "url" : "{{ route('user.data') }}",
                "type": "GET"
            },
            "ordering": false
        });

        $(".select2").select2();

        $('#modal-form form').validator().on('submit', function(e){
            if(!e.isDefaultPrevented()){
                var id = $('#iduser').val();
                if(save_method === "add") url = "{{ route('user.store') }}";
                else url = "user/"+id;

                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#modal-form form').serialize(),
                    success: function(data){
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                        console.log(data);
                    },
                    error: function(){
                        alert('Tidak dapat menyimpan Data!');
                    }
                });
                return false;
            }
        });

        $('#beranda').removeClass('active');
        $('#pengguna').addClass('active treeview');

    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Pengguna / User');
        $('#name').attr('placeholder', 'Username / User ID Login');
        $('#email').attr('placeholder', 'e.x: email@domain.com');
        $('.notice').text('');
        $('#notice').removeClass();
        $.ajax({
            url: "user/iduser",
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('#iduser').val(data);
                console.log(data);
            },
            error: function(){
                alert("Tidak dapat menampilkan Data!");
            }
        });
    }

    function editForm(id) {
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url: "user/"+id+"/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Pengguna');
                $('#iduser').val(data.id_user);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#status').val(data.status).trigger('change');
                console.log(data);
            },
            error: function(){
                alert("Tidak dapat menampilkan Data!"+$('#name').val());
            }
        });
        $('.notice').text('Kosongkan Password jika tidak ingin menggantinya!');
        $('#notice').addClass('fa fa-warning text-red');
    }

    function deleteData(id) {
        if (confirm("Apakah yakin akan menghapus Data?")) {
            $.ajax({
                url: "user/"+id,
                type: "POST",
                data: {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
                success: function (data) {
                    table.ajax.reload();
                    console.log(data);
                },
                error: function () {
                    alert("Tidak dapat menghapus Data!");
                }
            });
        }
    }
</script>
@endsection
