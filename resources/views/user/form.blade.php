<div class="modal" id="modal-form" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" style="width:50%;">
        <div class="modal-content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <form class="form-horizontal" data-toggle="validator" role="form" method="post">
                        {{ csrf_field() }} {{  method_field('POST') }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="iduser">Kode</label>
                                <input type="text" class="form-control" id="iduser" name="iduser" readonly="readonly"  style="width:30%;">
                                <span class="help-block with-errors"></span>
                            </div>
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                                <span class="help-block with-errors"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                                <span class="help-block with-errors"></span>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label><br/>
                                    <select class="form-control select2" id="status" name="status" style="width:50%">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                <span class="help-block with-errors"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <span class="help-block with-errors"></span>
                            </div>
                            <div class="form-group">
                                <label for="password1">Ulangi Password</label>
                                <input type="password" class="form-control" id="password1" name="password1" data-match="#password" placeholder="Re-type Password">
                                <span class="help-block with-errors"></span>
                            </div>
                            <i class="fa fa-warning text-red" id="notice"><b><i><small><span class="notice"></span></small></b></i></i>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Keluar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
