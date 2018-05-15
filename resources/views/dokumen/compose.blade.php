@extends('layouts.app')

@section('title')
    Daftar Dokumen
@endsection

@section('breadcrumb')
    @parent
    <li> Dokumen </li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        <a href="" class="btn btn-primary btn-block margin-bottom">Kirim Dokumen</a>
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Berkas</h3>
                <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#"><i class="fa fa-inbox"></i> Kotak Masuk
                        <span class="label label-primary pull-right">12</span></a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> Terkirim</a></li>
                    <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <form class="form-horizontal" data-toggle="validator" role="form" method="post">
                {{ csrf_field() }} {{  method_field('POST') }}
                <div class="modal-header">
                    <h3 class="box-title">Kirim Dokumen Baru</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <select class="form-control select2" id="kepada" name="kepada" style="width:60%">
                                <option value="0">&nbsp;</option>
                                @foreach($mako as $list)
                                <option value="{{ $list->id_mako }}">{{ $list->nama }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input class="form-control" placeholder="Subjek:" style="width:60%">
                            <span class="help-block with-error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group form-inline">
        						<label class="input-group-btn">
        							<span class="btn btn-success btn-md">
        								<i class="fa fa-paperclip"></i> Attachment
                                        <input type="file" id="namafile" name="namafile" style="display: none;" required>
        							</span>
        						</label>
        						<input type="text" class="form-control input-md" size="10" readonly required>
                                <label class="input-group-btn">
        							<span class="btn btn-default btn-md upload" id="upload">
        								<i class="fa fa-upload"></i> Upload
        							</span>
                                </label>
                            </div>
                            <p class="help-block">Max. 32MB</p>
                            <div class="progress" style="display:none">
                                <div id="progressBar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                    <span class="sr-only">0%</span>
                                </div>
                            </div>
                            <div class="msg alert alert-info text-left" style="display:none"></div>
                            <div class="clearfix"></div>
                       </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="form-control" id="ket" name="ket" placeholder="keterangan"></textarea>
                            <span class="help-block with-error"></span>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                    </div>
                    <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
        $(".select2").select2();
        CKEDITOR.replace('ket');
        $(document).on('change', ':file', function() {
            var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        $(document).ready( function() {
            $(':file').on('fileselect', function(e, numFiles, label) {

            var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

            });
        });

        $('body').on('click', '.upload', function(e){
            if(!e.isDefaultPrevented()){
                $('.msg').hide();
                $('.progress').show();
                $.ajax({
                    xhr : function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function(e){
                            if(e.lengthComputable){
                            	console.log('Bytes Loaded : ' + e.loaded);
                            	console.log('Total Size : ' + e.total);
                            	console.log('Persen : ' + (e.loaded / e.total));

                            	var percent = Math.round((e.loaded / e.total) * 100);

                            	$('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                            }
                        });
                        return xhr;
                    },
                    type : 'POST',
        			url : '{{ route('dokumen.upload') }}',
                    success: function(e){
                        if(e === ""){
                            alert('Gagal Upload File !');
                        }
                    }
                });
                return false;
            }
        });
    });
</script>
@endsection
