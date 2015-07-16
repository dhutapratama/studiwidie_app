
<!--main content start-->
<section id="main-content">
  <section class="wrapper">

   <!-- BASIC FORM ELELEMNTS -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4 class="mb"><i class="fa fa-angle-right"></i> TAMBAH SOAL</h4>
        <form class="form-horizontal style-form" method="post" action="<?php echo site_url("admin/soal/add/do"); ?>">
          <div class="form-group">
            <label class="col-sm-3 col-sm-3 control-label">MATA PELAJARAN</label>
            <div class="col-sm-9">
              <select class="form-control" name="mata_pelajaran">
                <?php
                  foreach ($mapel as $key => $value) {
                      echo '<option value="'.$value->id.'">'.$value->mapel.'</option>';
                  }
                ?>
            </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-sm-3 control-label">NOMOR SERI</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="no_seri">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-sm-3 control-label">SOAL</label>
            <div class="col-sm-9">
              <textarea id="wysiwyg" name="soal"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-sm-3 control-label">JAWABAN A</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="jawaban_a">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-sm-3 control-label">JAWABAN B</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="jawaban_b">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-sm-3 control-label">JAWABAN C</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="jawaban_c">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-sm-3 control-label">JAWABAN D</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="jawaban_d">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-sm-3 control-label">JAWABAN E</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="jawaban_e">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-sm-3 control-label">KUNCI JAWABAN</label>
            <div class="col-sm-9">
              
              <div class="radio">
                <label>
                  <input type="radio" name="kunci_jawaban" value="a">
                  A
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="kunci_jawaban" value="b">
                  B
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="kunci_jawaban" value="c">
                  C
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="kunci_jawaban" value="d">
                  D
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="kunci_jawaban" value="e">
                  E
                </label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-sm-3 control-label">HINT 1</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="hint_1">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-sm-3 control-label">HINT 2</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="hint_2">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-sm-3 control-label">HINT 3</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="hint_3">
            </div>
          </div>

          <button type="submit" class="btn btn-theme">SIMPAN</button>
        </form>
      </div>
    </div><!-- col-lg-12-->      	
  </div><!-- /row -->


</section><!--/wrapper -->
</section><!-- /MAIN CONTENT -->

<!--main content end-->
<!--footer start-->
<footer class="site-footer">
  <div class="text-center">
    Studiwidie &copy; 2015
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
<script src="<?php echo site_url(); ?>assets/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({plugins: "image",
selector:'textarea'});</script>


<!--common script for all pages-->
<script src="<?php echo site_url(); ?>assets/js/common-scripts.js"></script>

<!--script for this page-->
<script src="<?php echo site_url(); ?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>

<script src="<?php echo site_url(); ?>assets/js/form-component.js"></script>    


<script>
      //custom select box

$(function(){
  $('select.styled').customSelect();
  });
</script>

    </body>
    </html>
