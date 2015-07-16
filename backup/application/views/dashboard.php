      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <h3><i class="fa fa-angle-right"></i> DASHBOARD</h3>
              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  	<div class="row mtbox">
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span class="li_study"></span>
					  			<h3><?php echo $status["tryout"];?> TRYOUT</h3>
                  			</div>
					  			<p><?php echo $status["tryout"];?> kali tryout telah di lakukan.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_lab"></span>
					  			<h3><?php echo $status["learning"];?> LEARN</h3>
                  			</div>
					  			<p>Total materi learning yg online : <?php echo $status["learning"];?>.</p>
                  		</div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_data"></span>
                  <h3><?php echo $status["mata_pelajaran"];?> MAPEL</h3>
                        </div>
                  <p>Ada <?php echo $status["mata_pelajaran"];?> pilihan mata pelajaran Tryout.</p>
                      </div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_news"></span>
					  			<h3>+<?php echo $status["soal"];?> SOAL</h3>
                  			</div>
					  			<p>Jumlah soal tryout : <?php echo $status["soal"];?>.</p>
                  		</div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_user"></span>
                  <h3><?php echo $status["user"];?> USERS</h3>
                        </div>
                  <p><?php echo $status["user"];?> orang mendaftar di studiwidie.</p>
                      </div>
                  	</div><!-- /row mt -->	
						
					</div><!-- /row -->
					
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                
              </div><!-- /row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              Studiwidie &copy; 2015
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo site_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo site_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo site_url(); ?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo site_url(); ?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo site_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo site_url(); ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo site_url(); ?>assets/js/jquery.sparkline.js"></script>

    <!--common script for all pages-->
    <script src="<?php echo site_url(); ?>assets/js/common-scripts.js"></script>
	  <script type="application/javascript">
       
        $(document).ready(function () {
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
