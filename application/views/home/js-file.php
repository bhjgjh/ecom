
<!--js or jquery ke file sari isme hai jo link ke thi-->
<style>
#product_detail_modal{
  width: 80%;
}
</style>
<!--view product detail model-->
<div class="modal" id="product_detail_modal">

</div>

<div class="modal" id="preloader"style="width:25%; height:150px; margin-top:50px;">
<div class="modal-content" style="padding:0px;">
<h5 style="padding-left: 15px; font-size:22px;font-weight:500;">Please Wait...</h5>
<div class="progress">
  <div class="indeterminate" style="background-color:#ff3d00;"></div>
</div>
</div>
<div class="modal-content" style="padding:10px;">
<h6 id="preloader_heading" style="margin-top:0px;">Login Your Account</h6>
</div>

</div>

<!--view product detail model-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/jquery/jquery.js');?>">
</script>
<!-- JAVASCRIPT FILE ADD-->
<script type="text/javascript" src="<?= base_url('assets/javascript/materialize.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/chart/chart.js');?>"></script>



<!--script tag start-->
<script>
  $(document).ready(function(){
//modal script jo upper banaya hai
$('.modal').modal();
//$('#product_detail_modal').modal('open');
//modal script jo upper banaya hai


    //side nav SCRIPT..
  //  $('.sidenav').sidenav();

    //side nav SCRIPT
    //dropdown script
    $('.dropdown-trigger').dropdown({
    coverTrigger: false
    });
  });
 $('.carousel.carousel-slider').carousel({
    fullWidth: true,
  indicators: true
  });

</script>
<!-- custam ajax script jo modal wala h-->
<script>
function view_product_details(product_id)
{
  //alert(product_id);
  $.ajax({
    type: 'ajax',
    method:'GET',
    url: '<?= base_url('home/get_product_details/'); ?>'+product_id,
    beforeSend:function(data){
     $('#preloader').modal('open');
     $('#preloader_heading').text('Fetch product Detail');
    },
    success:function(data){
      $('#product_detail_modal').modal('open');
      $('#product_detail_modal').html(data);
      $('#preloader').modal('close');
    },
    error:function(){
      alert('Erroe ! Fetch product Detail');
    }
  });
}
// add to cart script
function add_to_cart(product_id)
{
  $.ajax({
    type: 'ajax',
    method:'GET',
    url: '<?= base_url('home/add_to_cart/'); ?>'+product_id,
    beforeSend:function(data){
     $('#preloader').modal('open');
     $('#preloader_heading').text('Product Add In Your Cart.');
    },
    success:function(data){
      $('#preloader').modal('close');
      if(data == "1"){
          alert('product Successfuly Add In Cart.');
          calculate_carts_products();
      }else {
          alert('product Not Add In Cart.')
      }
    alert('product Successfuly Add In Cart.')
    },
    error:function(){
      alert('Erroe ! Add to Cart.');
    }
  });
}
// add to cart script
//update quantity + and - wali jo cart me hai
function update_quantity(type,product_id,id){
  var qname = "quantity_"+id;
  var quantity = $('input[name="'+qname+'"]').val();
  //alert(quantity);
  $.ajax({
    type: 'ajax',
    method:'GET',
    url: '<?= base_url('home/update_quantity/'); ?>'+quantity+'/'+type+'/'+product_id,
    beforeSend:function(data){
     $('#preloader').modal('open');
     $('#preloader_heading').text('Update product Quantity.');
    },
    success:function(data){
      $('#preloader').modal('close');
      if(data == "1"){
          alert('product Quantity Update.')
          location.reload();
      }else {
          alert('quantity update Fail.')
      }
    alert('product Successfuly Add In Cart.')
    },
    error:function(){
      alert('Update Quantity.');
    }
  });
}
// calculate_carts_products();
calculate_carts_products();
function calculate_carts_products()
{
  $.ajax({
    type: 'ajax',
    method:'GET',
    url: '<?= base_url('home/calculate_cart_products'); ?>',
    beforeSend:function(data){
     //$('#preloader').modal('open');
     //$('#preloader_heading').text('Update product Quantity.');
    },
    success:function(data){
      //$('#preloader').modal('close');
     var json_data = JSON.parse(data);
      $('#total_products').html(json_data.total_products);
      $('#total_amount').html(json_data.total_amount);


    },
    error:function(){
      alert('Update Quantity.');
    }
  });
}


// calculate_carts_products();

// search products script jo home me h
$('body').click(function(){
  $('#show_product_list').hide();

});
function search_products(val)
{
  if(val.length > 1){
    $.ajax({
      type: 'ajax',
      method:'GET',
      url: '<?= base_url('home/search_products/'); ?>'+val,
      beforeSend:function(data){
       //$('#preloader').modal('open');
       //$('#preloader_heading').text('Update product Quantity.');
      },
      success:function(data){
        //$('#preloader').modal('close');
        $('#show_product_list').show();
       $('#show_product_list').html(data);
      //  $('#total_products').html(json_data.total_products);
      //  $('#total_amount').html(json_data.total_amount);


      },
  error:function(){
        alert('Error ! product search.');
      }
    });
  }

}

// search products script jo home me h





</script>
