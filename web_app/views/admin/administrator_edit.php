<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit User Administrator</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="<?php echo site_url('admin/administrator/edit'); ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="text" class="form-control" name="username" value="<?php echo $get_administrator->username ?>" required pattern=".{5,}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Ganti Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" value="" pattern=".{5,}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a class="btn btn-white" href="<?php echo site_url('admin/administrator'); ?>">Batal</a>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>