<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>EDIT LEARNING</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="<?php echo site_url('admin/learning/edit'); ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mata Pelajaran</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id" value="<?php echo $this->input->get('id'); ?>">
                                <input type="hidden" name="id_mapel" value="<?php echo $get_learning->id_mapel; ?>">
                                <input type="text" class="form-control" value="<?php echo $this->m_mata_pelajaran->get_mata_pelajaran_by_id(hash_id($get_learning->id_mapel))->mapel; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Judul Materi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="materi" value="<?php echo $get_learning->materi; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Isi Materi</label>
                            <div class="col-sm-10">
                                <textarea class="summernote" name="isi"><?php echo $get_learning->isi; ?></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a class="btn btn-white" href="<?php echo base_url('admin/soal/mapel/seri.html?id_seri_soal='.hash_id($get_learning->id_mapel )); ?>">Batal</a>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>