@extends('layouts.app')

@section('title')
    Daftar Mako
@endsection

@section('breadcrumb')
    @parent
    <li> Mako </li>
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
                            <th width="100">Kode</th>
                            <th width="200">Nama Mako</th>
                            <th>Alamat</th>
                            <th>Komandan</th>
                            <th>Status</th>
                            <th width="100" style="background:#DDD;">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th width="30">No</th>
                            <th width="100">Kode</th>
                            <th width="200">Nama Mako</th>
                            <th>Alamat</th>
                            <th>Komandan</th>
                            <th>Status</th>
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
    @include('mako.form')
@endsection

@section('script')
<script type="text/javascript">
    var table, save_method;
    $(function() {
        table = $('.table').DataTable({
            "processing": true,
            "ajax": {
                "url" : "{{ route('mako.data') }}",
                "type": "GET"
            },
            "ordering": false
        });

        $('#modal-form form').validator().on('submit', function(e){
            if(!e.isDefaultPrevented()){
                var id = $('#idmako').val();
                if(save_method === "add") url = "{{ route('mako.store') }}";
                else url = "mako/"+id;
                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#modal-form form').serialize(),
                    success: function(data){
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                    },
                    error: function(){
                        alert('Tidak dapat menyimpan Data!');
                    }
                });
                return false;
            }
        });
        $('#beranda').removeClass('active');
        $('#mako').addClass('active treeview');
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Mako');
        $.ajax({
            url: "mako/idmako",
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('#idmako').val(data);
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
            url: "mako/"+id+"/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit kegiatan');
                $('#idmako').val(data.id_mako);
                $('#nama').val(data.nama);
                $('#alamat').val(data.alamat);
                $('#komandan').val(data.komandan);
                $('#status').val(data.status);
            },
            error: function(){
                alert("Tidak dapat menampilkan Data!");
            }
        });
    }

    function deleteData(id) {
        if (confirm("Apakah yakin akan menghapus Data?")) {
            $.ajax({
                url: "mako/"+id,
                type: "POST",
                data: {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
                success: function (data) {
                    table.ajax.reload();
                },
                error: function () {
                    alert("Tidak dapat menghapus Data!");
                }
            });
        }
    }
</script>
@endsection
