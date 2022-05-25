<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard-Apni Dukan</title>
    <?php $this->load->view("home/css-file");?>
     <style media="screen">
     </style>
  </head>
  <body>
    <!--body section--> <?php $this->load->view("home/header");?>
    <h4 style="padding-left:10px; font-size:25px; margin-top:10px;"> Welcome User </h4>
    <div class="row" style="margin-bottom:0px;">
      <div class="col l4 m5 s12">
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col l4 m4 s4">
                <h4>
                  <span class="fa fa-shopping-cart" style="color:#ff3d00;"></span>
                </h4>
              </div>
              <div class="col l8 m8 s8">
                <h6 class="right-align" style="color:grey; font-size:14px;">My Cart</h6>
                <h4 class="right-align" style="margin-top:0px;">
                  <b><?= count($cart_products);?></b>
                </h4>
              </div>
            </div>
          </div>
          <div class="card-action">
            <a href="<?= base_url('home/carts');?>" style="">View Cart</a>
          </div>
        </div>
      </div>
      <div class="col l4 m5 s12">
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col l4 m4 s4">
                <h4>
                  <span class="fa fa-shopping-cart" style="color:#ff3d00;"></span>
                </h4>
              </div>
              <div class="col l8 m8 s8">
                <h6 class="right-align" style="color:grey; font-size:14px;">My Order's</h6>
                <h4 class="right-align" style="margin-top:0px;">
                  <b><?= count($orders);?></b>
                </h4>
              </div>
            </div>
          </div>
          <div class="card-action">
            <a href="<?= base_url('home/my_orders');?>" style="">View Order's</a>
          </div>
        </div>
      </div>
      <div class="col l4 m5 s12">
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col l4 m4 s4">
                <h4>
                  <span class="fa fa-shopping-cart" style="color:#ff3d00;"></span>
                </h4>
              </div>
              <div class="col l8 m8 s8">
                <h6 class="right-align" style="color:grey; font-size:14px;">Delivered Order's</h6>
                <h4 class="right-align" style="margin-top:0px;">
                  <b><?=count($delivered_orders) ;?></b>
                </h4>
              </div>
            </div>
          </div>
          <div class="card-action">
            <a href="<?= base_url('home/my_orders');?>" style="">View Order's</a>
          </div>
        </div>
      </div>
      <div class="col l4 m5 s12">
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col l4 m4 s4">
                <h4>
                  <span class="fa fa-shopping-cart" style="color:#ff3d00;"></span>
                </h4>
              </div>
              <div class="col l8 m8 s8">
                <h6 class="right-align" style="color:grey; font-size:14px;">My Cart</h6>
                <h4 class="right-align" style="margin-top:0px;">
                  <b>50</b>
                </h4>
              </div>
            </div>
          </div>
          <div class="card-action">
            <a href="" style="">View Cart</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
       <p style="text-align:center; font-size:14px; color:grey; font:weight:500px; margin-top:10px;">
         Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut t </p>
    </div>
    <?php $this->load->view("home/footer");?>
     <?php $this->load->view("home/js-file.php");?>
  </body>
</html>
