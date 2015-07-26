<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>ADD LEARNING</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="<?php echo site_url('admin/learning/add'); ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mata Pelajaran</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id_mapel" value="<?php echo $id_mapel; ?>">
                                <input type="text" class="form-control" value="<?php echo $this->m_mata_pelajaran->get_mata_pelajaran_by_id($id_mapel)->mapel; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Judul Materi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="materi" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Isi Materi</label>
                            <div class="col-sm-10">
                                <textarea class="summernote" name="isi"><h3>Judul</h3>Tulis materi learning disini...</textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a class="btn btn-white" href="<?php echo base_url('admin/learning/mapel.html?id_mapel='.$id_mapel); ?>">Batal</a>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>