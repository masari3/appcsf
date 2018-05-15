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
        <a href="{{ route('dokumen.compose')}}" class="btn btn-primary btn-block margin-bottom">Kirim Dokumen</a>
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
      <!--
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Labels</h3>

          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
          </ul>
        </div>
      </div>
       -->
    </div>
    <div class="col-md-9">
      <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Kotak Masuk</h3>
            <div class="box-tools pull-right">
                <div class="has-feedback">
                    <input type="text" class="form-control input-sm" placeholder="Cari Berkas">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
            </div>
        </div>
        <div class="box-body no-padding">
            <div class="mailbox-controls">
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                    1-50/200
                    <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <td style="text-align:center;font-weight:bold;"></td>
                            <td style="text-align:center;font-weight:bold;"></td>
                            <td style="font-weight:bold;">Pengirim</td>
                            <td style="font-weight:bold;">Nama Berkas</td>
                            <td style="font-weight:bold;">Keterangan</td>
                            <td style="font-weight:bold;text-align:center"><i class="fa fa-eye"></i></td>
                            <td style="font-weight:bold;text-align:center"><i class="fa fa-download"></i></td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><input type="checkbox" style="position: absolute; opacity: 0;"></div></td>
                            <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                            <td class="mailbox-name"><a href=""></a>Cabang</td>
                            <td class="mailbox-attachment">
                                <a href="">
                                <i class="fa fa-file-excel-o"></i> Laporan Bulan Mei 2018.xlsx</a>
                            </td>
                            <td class="mailbox-subject"> Keterangan Dokumen ...</td>
                            <td class="mailbox-name" style="text-align:center"> 221 </td>
                            <td class="mailbox-name" style="text-align:center">34</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td style="text-align:center;font-weight:bold;"></td>
                            <td style="text-align:center;font-weight:bold;"></td>
                            <td style="font-weight:bold;">Pengirim</td>
                            <td style="font-weight:bold;">Nama Berkas</td>
                            <td style="font-weight:bold;">Keterangan</td>
                            <td style="font-weight:bold;text-align:center"><i class="fa fa-eye"></i></td>
                            <td style="font-weight:bold;text-align:center"><i class="fa fa-download"></i></td>
                        </tr>
                    </tfoot>
                </table>
                <!-- /.table -->
            </div>
        </div>
        <div class="box-footer no-padding">
          <div class="mailbox-controls">
            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
            </div>
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
            <div class="pull-right">
              1-50/200
              <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @section('script')
    <script type="text/javascript">
        $(function () {
            $('.mailbox-messages input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });

            $(".checkbox-toggle").click(function () {
            var clicks = $(this).data('clicks');
                if (clicks) {
                  $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
                  $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
                } else {
                  $(".mailbox-messages input[type='checkbox']").iCheck("check");
                  $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
                }
                $(this).data("clicks", !clicks);
            });

            $(".mailbox-star").click(function (e) {
                e.preventDefault();
                var $this = $(this).find("a > i");
                var glyph = $this.hasClass("glyphicon");
                var fa = $this.hasClass("fa");

                if (glyph) {
                    $this.toggleClass("glyphicon-star");
                    $this.toggleClass("glyphicon-star-empty");
                }

                if (fa) {
                    $this.toggleClass("fa-star");
                    $this.toggleClass("fa-star-o");
                }
            });
        });
    </script>
  @endsection
