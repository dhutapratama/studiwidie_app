
      <section id="main-content">
          <section class="wrapper">
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i> DATA SOAL</h4>
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>MATA PELAJARAN</th>
                                  <th>NO. SERI</th>
                                  <th>Opsi</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($soal as $value) { ?>
                              <tr>
                                  <td><?php echo $value->id_soal; ?></td>
                                  <td><?php echo $value->mapel; ?></td>
                                  <td><?php echo $value->no_seri; ?></td>
                                  <td class="numeric">
                                    <a class="btn btn-primary btn-xs" href="<?php echo site_url("admin/soal/edit/".$value->id_soal);?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs" href="<?php echo site_url("admin/soal/delete/".$value->id_soal);?>"><i class="fa fa-trash-o"></i></a>
                                  </td>
                              </tr>
                              <?php } ?>
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->

		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              Studiwidie &copy; 2015
              <a href="responsive_table.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo site_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo site_url(); ?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo site_url(); ?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo site_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo site_url(); ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="<?php echo site_url(); ?>assets/js/common-scripts.js"></script>

    <!--script for this page-->
    

  </body>
</html>
