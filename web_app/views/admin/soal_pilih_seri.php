
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tabel Nomor Seri Soal</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="<?php echo site_url('admin/soal'); ?>"><?php echo $get_mapel->mapel;?></a>
            </li>
            <li class="active">
                <strong>Pilih Nomor Seri Soal</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Pilih Nomor Seri untuk mengedit soal atau pilih tambah soal</h5>
                    <div class="ibox-tools">
                        <a class="btn btn-primary btn-xs" href="#addForm" data-toggle="modal">
                            <i class="fa fa-plus"></i> Add Nomor Seri
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <?php if ($this->session->flashdata('message') != '') { ?>
                    <div class="alert alert-<?php echo $this->session->flashdata('message_type'); ?> alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                    <?php } ?>
                    <table class="table table-striped table-bordered table-hover dataTables-mytable" >
                        <thead>
                            <tr>
                                <th>Nomor Seri Soal</th>
                                <th>Jumlah Soal</th>
                                <th>Pilih</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($get_seri as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value->no_seri; ?></td>
                                <td><?php echo $this->m_soal->get_jumlah_soal_by_seri($value->no_seri); ?> Soal</td>
                                <td class="center tooltip-demo">
                                    <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/seri/edit').'?id='.hash_id($value->no_seri); ?>">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                    <a class="btn btn-danger btn-xs" href="<?php echo site_url('admin/seri/delete').'?id='.hash_id($value->no_seri); ?>" data-toggle="tooltip" data-placement="top" title="Perhatian! Menghapus nomor seri akan menghapus semua soal didalamnya.">
                                        <i class="fa fa-trash-o"></i> Hapus
                                    </a>
                                    <a class="btn btn-primary btn-xs" href="<?php echo site_url('admin/soal/mapel/seri').'?id_seri_soal='.hash_id($value->no_seri); ?>">
                                        <i class="fa fa-folder"></i> Buka
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nomor Seri Soal</th>
                                <th>Jumlah Soal</th>
                                <th>Pilih</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<div id="addForm" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>TAMBAH <small>NOMOR SERI SOAL</small></h5>
                            </div>
                            <div class="ibox-content">
                                <form method="post" class="form-horizontal" action="<?php echo site_url('admin/soal/mapel/seri/add'); ?>">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nomor Seri</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" name="id_mapel" value="<?php echo $get_mapel->id; ?>">
                                            <input type="text" class="form-control" name="no_seri" required>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="pull-right">
                                                <button class="btn" type="button" data-toggle="modal" href="#addForm">Batal</button>
                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>