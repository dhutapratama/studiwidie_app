
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>LEARNING</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url('admin'); ?>">Home</a>
            </li>
            <li class="active">
                <a href="<?php echo site_url('admin/learning'); ?>">Pilih Mata Pelajaran</a>
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
                    <h5>PILIH MATA PELAJARAN</h5>
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
                                <th>Mata Pelajaran</th>
                                <th>Pilih</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($get_mata_pelajaran as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value->mapel; ?></td>
                                <td class="center">
                                    <a class="btn btn-primary btn-xs" href="<?php echo site_url('admin/learning/mapel').'?id_mapel='.hash_id($value->id); ?>">
                                        <i class="fa fa-folder"></i> Buka
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Mata Pelajaran</th>
                                <th>Pilih</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>