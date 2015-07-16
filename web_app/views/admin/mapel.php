
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tabel Mata Pelajaran</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li class="active">
                <strong>Mata Pelajaran</strong>
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
                    <h5>Mata pelajaran digunakan sebagai pilihan materi tryout</h5>
                    <div class="ibox-tools">
                        <a class="btn btn-primary btn-xs" href="#addForm" data-toggle="modal">
                            <i class="fa fa-plus"></i> Add
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
                                <th>ID</th>
                                <th>Mata Pelajaran</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($get_mata_pelajaran as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value->id; ?></td>
                                <td><?php echo $value->mapel; ?></td>
                                <td class="center">
                                    <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/mapel/edit').'?id='.hash_id($value->id); ?>">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                    <a class="btn btn-danger btn-xs" href="<?php echo site_url('admin/mapel/delete').'?id='.hash_id($value->id); ?>">
                                        <i class="fa fa-trash-o"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Mata Pelajaran</th>
                                <th>Opsi</th>
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
                                <h5>TAMBAH <small>MATA PELAJARAN</small></h5>
                            </div>
                            <div class="ibox-content">
                                <form method="post" class="form-horizontal" action="<?php echo site_url('admin/mapel/add'); ?>">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nama Mata Pelajaran</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="mapel" required></div>
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