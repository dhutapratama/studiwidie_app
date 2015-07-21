

                <div class="footer" >
                    <div>
                        <strong>Copyright</strong> Studiwidie App. &copy; 2015
                    </div>
                </div>

            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <?php if ($use_table == true) { ?>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jeditable/jquery.jeditable.js"></script>

        <!-- Data Tables -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/dataTables.responsive.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>
        
        <!-- Page-Level Scripts -->
        <script>
            $(document).ready(function() {
                $('.dataTables-mytable').dataTable({
                    responsive: true
                });
            });
        </script>
    <?php }
    if ($use_editor == true) { ?>
     <!-- SUMMERNOTE -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/summernote/summernote.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.summernote').summernote();
       });
    </script>
    <?php }
    if ($use_checker == true) { ?>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
    <?php } ?>
    </body>
</html>
