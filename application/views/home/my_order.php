<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Orders-Apni Dukan</title>
    <?php $this->load->view("home/css-file");?>
     <style media="screen">
     </style>
  </head>
  <body>
    <!--body section-->
     <?php $this->load->view("home/header");?>
     <h4 style="padding-left:40px; font-size:25px; margin-top:10px;"> My Orders(20) </h4>
      <?php for($j=0; $j<10; $j++):?>
      <div class="container">
      <div class="card">
        <div class="card-content" style="border-bottom:1px solid silver;">
          <a href="" class="btn waves-effect waves-light" style="background:#ff3d00; box-shadow:none;">Order Id -110086 </a>
          <a href="" class="btn waves-effect waves-dark right" style="background:no-repeat;color:grey;box-shadow:none;border:1px solid silver;">track Order </a>
        </div>
        <div class="card-content">
           <?php for($i=0; $i<5; $i++):?>
           <div class="row" style="margin-bottom:0px;">
            <div class="col l2 m3 s12">
              <img src="<?php echo base_url('image/bag.jpg');?>"
              class="responsive-img" alt="" style="width:100px; height:100px;">
            </div>
            <div class="col l5 m5 s12">
              <h5 style="font-size:20px; font-weight:500;">Panasonic LED 32 Inch Full HD</h5>
              <h6 style="font-size:14px; color:grey; margin-top:0px;">Quantity: 5</h6>
            </div>
            <div class="col l5 m4 s12">
              <h5 style="font-size:20px; font-weight:500;">
                <span class="fa fa-rupee-sign"></span>&nbsp;250
              </h5>
              <h6 style="font-size:14px; color:grey; margin-top:0px;">Your Product is Not Delivered</h6>
            </div>
          </div>
        <?php endfor;?>
       </div>
        <div class="card-content" style="padding:10px;">
          <h6> Ordered On : <b> Sun , Jun. 05 2022</b>
            <span class="right">Order Total :&nbsp; <span class="fa fa-rupee-sign">&nbsp; <b>2,500</b>
              </span>
            </span>
          </h6>
        </div>
      </div>
    </div>
  <?php endfor;?>
  <?php $this->load->view("home/footer");?>
  <?php $this->load->view("home/js-file.php");?>
  </body>
</html>
