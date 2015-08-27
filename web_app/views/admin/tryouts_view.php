
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>TRYOUT HISTORY</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li class="active">
                <strong>Tryout History</strong>
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
                    <h5>Tryout History Siswa</h5>
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
                                <th>Tanggal</th>
                                <th>Mata Pelajaran</th>
                                <th>No. Seri</th>
                                <th>Jawaban Benar</th>
                                <th>Jawaban Salah</th>
                                <th>Jumlah Soal</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($get_tryout as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value->tanggal; ?></td>
                                <td><?php echo $this->m_mata_pelajaran->get_mata_pelajaran_by_id($value->id_mapel, false)->mapel; ?></td>
                                <td><?php echo $value->no_seri; ?></td>
                                <td><?php echo $value->jawaban_benar; ?></td>
                                <td><?php echo $value->jawaban_salah; ?></td>
                                <td><?php echo $value->jumlah_soal; ?></td>
                                <td><?php echo $value->nilai; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tanggal</th>
                                <th>Mata Pelajaran</th>
                                <th>No. Seri</th>
                                <th>Jawaban Benar</th>
                                <th>Jawaban Salah</th>
                                <th>Jumlah Soal</th>
                                <th>Nilai</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>