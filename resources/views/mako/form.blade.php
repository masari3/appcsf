<div class="modal" id="modal-form" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <form class="form-horizontal" data-toggle="validator" role="form" method="post">
                        {{ csrf_field() }} {{  method_field('POST') }}
                        <div class="modal-header">
                                <div style="right:0;float:right;line-height:1;">
                                    <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Keluar</button>
                                </div>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="idmako">Kode Mako</label>
                                <input type="text" class="form-control" id="idmako" name="idmako" readonly="readonly">
                                <span class="help-block with-errors"></span>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Mako</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mako">
                                <span class="help-block with-errors"></span>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea rows="3" class="form-control" id="alamat" name="alamat"></textarea>
                                <span class="help-block with-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="komandan">Nama Komandan</label>
                                <input type="text" class="form-control" id="komandan" name="komandan" placeholder="Nama komandan">
                                <span class="help-block with-errors"></span>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label><br/>
                                    <select class="form-control select2" id="status" name="status" style="width:50%">
                                        <option value="1">Pusat</option>
                                        <option value="0">Cabang</option>
                                    </select>
                                <span class="help-block with-errors"></span>
                            </div>
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
