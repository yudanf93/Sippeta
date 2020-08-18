<footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img class="image-footer" src="<?php echo base_url(); ?>assets/frontend/assets/images/logo-perusahaan.png" alt="logo-perusahaan">
          <p class="description-footer">
          Direktori Profesi Keuangan (DPK) adalah portal informasi para professional bidang keuangan yang bermanfaat bagi pelaku bisnis untuk menemukan profesi yang dibutuhkan sesuai dengan permasalahan yang dihadapinya. DPK berfungsi mempertemukan antara professional dengan pelaku bisnis.</p>
        </div>
        <div class="col-md-2" id="about-footer">
          <div class="single-widget widget-contact">
            <h5 class="widget-title">Blog</h5>
            <ul>
              <li>
                  <a href="<?php echo base_url('panduan') ?>">Panduan</a>
              </li>
              <li>
                  <a href="#">Kategori 1</a>
              </li>
              <li>
                  <a href="#">Kategori 2</a>
              </li>
              <li>
                  <a href="#">Kategori 3</a>
              </li>
              <li>
                  <a href="#">Kategori 4</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="single-widget widget-contact">
            <h5 class="widget-title">Hubungi Kami</h5>
            <ul>
              <li class="phone">
                  <span class="icon"><i class="fa fa-phone"></i></span>
                  <a href="callto:02657297930">(0265) 7297930</a>
              </li>
              <li class="phone">
                  <span class="icon"><i class="fa fa-whatsapp"></i></span>
                  <a href="wa.me/6282231888840">+6282231888840</a>
              </li>
              <li class="fax">
                  <span class="icon"><i class="fa fa-envelope-o"></i></span>
                  <a href="mailto:admin@dpk.com ">admin@dpk.com </a>
              </li>
              <li class="email">
                  <span class="icon"><i class="fa fa-map-o"></i></span>
                  <a href="#">Jakarta, Daerah Khusus Ibukota Jakarta </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2">
          <div class="single-widget widget-contact">
            <h5 class="widget-title">Sosial Media</h5>
            <a href="#" class="sosm"><i class="fa fa-linkedin"></i></a>
            <a href="#" class="sosm"><i class="fa fa-facebook"></i></a>
            <a href="#" class="sosm"><i class="fa fa-twitter"></i></a>
          </div>
        </div>
      </div>

      <div id="copyright" style="text-align: center;">
       <a href="<?php echo base_url('temukan') ?>" class="copyright-text">Temukan</a> | 
       <a href="<?php echo base_url('panduan') ?>" class="copyright-text">Panduan</a> | 
       <a  href=""class="copyright-text">Copyright &copy DPK 2020</a>
      </div>
    </div>
  </footer>

  <!-- javascript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- tambahan -->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
   $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>
  <!-- script javascript upload file -->
<script type="text/javascript">
document.getElementById("file_pdf").onchange = function (e) {
    document.getElementById("upload_filed").innerHTML = "<label class='btn btn-karir'>"+ e.target.files[0].name+"</label>";
    document.getElementById("uploadDoc").value  = this.value;
};
</script>
<!-- script javascript upload file -->
<script type="text/javascript">
  document.getElementById("surat_lamar").onchange = function (e) {
    document.getElementById("upload_surat").innerHTML  = "<label class='btn btn-karir'>"+ e.target.files[0].name+"</label>";
    document.getElementById("uploadSurat").value  = this.value;
};
document.getElementById("doc_lamar").onchange = function (e) {
    document.getElementById("upload_doc").innerHTML = "<label class='btn btn-karir'>"+ e.target.files[0].name+"</label>";
    document.getElementById("uploadDoc").value  = this.value;
};
</script>
</body>
</html>