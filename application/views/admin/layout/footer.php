<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright @ <b>Sevenpion</b> <?php echo Date('Y') ?></span>
    </div>
  </div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS --><!-- 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function() {


    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
  });
</script>
<!-- dataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
    $('#example1').DataTable();
    $('.example').DataTable();
  } );
</script>
<!-- ckeditor -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
   
            CKEDITOR.replace('editor',
            {
              toolbar : 'MyToolbar',
              width:"100%",
              filebrowserBrowseUrl : '<?php echo base_url();?>assets/ckfinder/ckfinder.html',
              filebrowserImageBrowseUrl : '<?php echo base_url();?>assets/ckfinder/ckfinder.html?type=Images',
              filebrowserFlashBrowseUrl : '<?php echo base_url();?>assets/ckfinder/ckfinder.html?type=Flash',
            }); 
            CKEDITOR.replace('editor1',
            {
              toolbar : 'MyToolbar',
              width:"100%",
              filebrowserBrowseUrl : '<?php echo base_url();?>assets/ckfinder/ckfinder.html',
              filebrowserImageBrowseUrl : '<?php echo base_url();?>assets/ckfinder/ckfinder.html?type=Images',
              filebrowserFlashBrowseUrl : '<?php echo base_url();?>assets/ckfinder/ckfinder.html?type=Flash',
            });
            
            //]]>
          </script>

          <script type="text/javascript">
  $(document).ready(function () {
  
  });
</script>

  <script type="text/javascript">
    $(document).ready(function(){

      $('#province_id').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('admin/user/kota');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].regency_id+'>'+data[i].regency_name+'</option>';
                        }
                        $('#regency_id').html(html);

                    }
                });
                return false; 
            }); 
            
    });
  </script>
    <script type="text/javascript">
    $(document).ready(function(){
      //call function get data edit
      get_data_edit();

      $('.province_id').change(function(){ 
                var id=$(this).val();
                var edit_regency_id = "<?php echo $regency_id;?>";
                $.ajax({
                    url : "<?php echo site_url('admin/user/kota');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){

                        $('select[name="regency_id"]').empty();

                        $.each(data, function(key, value) {
                            if(edit_regency_id==value.edit_regency_id){
                                $('select[name="regency_id"]').append('<option value="'+ value.edit_regency_id +'" selected>'+ value.regency_name +'</option>').trigger('change');
                            }else{
                                $('select[name="regency_id"]').append('<option value="'+ value.edit_regency_id +'">'+ value.regency_name +'</option>');
                            }
                        });

                    }
                });
                return false;
            }); 

      //load data for edit
            function get_data_edit(){
              var product_id = $('[name="product_id"]').val();
              $.ajax({
                url : "<?php echo site_url('product/get_data_edit');?>",
                    method : "POST",
                    data :{product_id :product_id},
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        $.each(data, function(i, item){
                            $('[name="product_name"]').val(data[i].product_name);
                            $('[name="category"]').val(data[i].product_category_id).trigger('change');
                            $('[name="sub_category"]').val(data[i].product_subcategory_id).trigger('change');
                            $('[name="product_price"]').val(data[i].product_price);
                        });
                    }

              });
            }
            
    });
  </script>

        </body>
        </html>