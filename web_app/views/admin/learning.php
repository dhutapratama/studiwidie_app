
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>LEARNING</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="<?php echo site_url('admin/learning'); ?>"><?php echo $this->m_mata_pelajaran->get_mata_pelajaran_by_id($id_mapel)->mapel; ?></a>
            </li>
            <li class="active">
                <strong>Materi Learning</strong>
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
                    <h5>Materi Learning</h5>
                    <div class="ibox-tools">
                        <a class="btn btn-primary btn-xs" href="<?php echo site_url('admin/learning/add').'?id_mapel='.urlencode($id_mapel); ?>">
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
                                <th>No.</th>
                                <th>ID</th>
                                <th>Soal</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nomor = 1;
                            foreach ($get_learning as $key => $value) { 
                            ?>
                            <tr>
                                <td><?php echo $nomor; ?>.</td>
                                <td><?php echo $value->id; ?></td>
                                <td><?php echo $value->materi; ?></td>
                                <td class="center">
                                    <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/learning/edit').'?id='.hash_id($value->id); ?>">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                    <a class="btn btn-danger btn-xs" href="<?php echo site_url('admin/learning/delete').'?id='.hash_id($value->id); ?>">
                                        <i class="fa fa-trash-o"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php $nomor++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
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