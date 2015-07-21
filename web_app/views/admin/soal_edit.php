<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>EDIT SOAL</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="<?php echo site_url('admin/soal/edit'); ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mata Pelajaran</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id" value="<?php echo $this->input->get('id'); ?>">
                                <input type="text" class="form-control" value="<?php echo $this->m_mata_pelajaran->get_mata_pelajaran_by_id(hash_id($get_soal->id_mapel))->mapel; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nomor Seri</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="no_seri" value="<?php echo $get_soal->no_seri; ?>">
                                <input type="text" class="form-control" value="<?php echo $get_soal->no_seri; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Soal</label>
                            <div class="col-sm-10">
                                <textarea class="summernote" name="soal"><?php echo $get_soal->soal; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pilihan A</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jawaban_a" value="<?php echo $get_soal->jawaban_a; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pilihan B</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jawaban_b" value="<?php echo $get_soal->jawaban_b; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pilihan C</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jawaban_c" value="<?php echo $get_soal->jawaban_c; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pilihan D</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jawaban_d" value="<?php echo $get_soal->jawaban_d; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pilihan E</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jawaban_e" value="<?php echo $get_soal->jawaban_e; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kunci Jawaban</label>
                            <div class="col-sm-10">
                                <div class="radio i-checks">
                                    <label>
                                        <input type="radio" value="a" name="kunci_jawaban"<?php echo ($get_soal->kunci_jawaban =='a')?' checked':''; ?>> <i></i> A
                                    </label>
                                </div>
                                <div class="radio i-checks">
                                    <label>
                                        <input type="radio" value="b" name="kunci_jawaban"<?php echo ($get_soal->kunci_jawaban =='b')?' checked':''; ?>> <i></i> B
                                    </label>
                                </div>
                                <div class="radio i-checks">
                                    <label>
                                        <input type="radio" value="c" name="kunci_jawaban"<?php echo ($get_soal->kunci_jawaban =='c')?' checked':''; ?>> <i></i> C
                                    </label>
                                </div>
                                <div class="radio i-checks">
                                    <label>
                                        <input type="radio" value="a" name="kunci_jawaban"<?php echo ($get_soal->kunci_jawaban =='d')?' checked':''; ?>> <i></i> D
                                    </label>
                                </div>
                                <div class="radio i-checks">
                                    <label>
                                        <input type="radio" value="a" name="kunci_jawaban"<?php echo ($get_soal->kunci_jawaban =='e')?' checked':''; ?>> <i></i> E
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Hint 1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="hint_1" value="<?php echo $get_soal->hint_1; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Hint 2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="hint_2" value="<?php echo $get_soal->hint_2; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Hint 3</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="hint_3" value="<?php echo $get_soal->hint_3; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a class="btn btn-white" href="<?php echo base_url('admin/soal/mapel/seri.html?id_seri_soal='.hash_id($get_soal->no_seri)); ?>">Batal</a>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>