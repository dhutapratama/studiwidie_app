<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>EDIT NOMOR SERI SOAL</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="<?php echo site_url('admin/seri/edit'); ?>">
                        <div class="form-group"><label class="col-sm-2 control-label">Nomor Seri</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id" value="<?php echo hash_id($get_soal[0]->no_seri); ?>">
                                <input type="text" class="form-control" name="no_seri" value="<?php echo $get_soal[0]->no_seri; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a class="btn btn-white" href="<?php echo site_url('admin/mapel'); ?>">Batal</a>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>