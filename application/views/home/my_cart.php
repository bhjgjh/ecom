<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cart(2)-Apni Dukan</title>
    <?php $this->load->view("home/css-file");?>
  <style media="screen">

  .bg-grey {
  background-color: #eae8e8;
  }
#quantity_form{
  display: flex;
}
#input-box{
  border: 1px solid silver;
  box-shadow: none;
  box-sizing: border-box;
  padding-left: 5px;
  padding-right: 10px;
  height: 40px;
  border-radius: 3px;
  width: 60px;

}
  </style>

  </head>
  <body>
<!--body section

<?php $this->load->view("home/header");?>
<!user signup form-->
<section class="h-100 h-custom" style="background-color: #d2c9ff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">My Cart(<?= count($products);?>)</h1>
                  </div>
                  <hr class="my-4">
                  <?php if(count($products)):
                   foreach($products as $pro):
                     $product_detail = get_product_details($pro->product_id);?>

                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img src="<?= base_url().'upload/product_image/'.$product_detail[0]->image; ?>" class="responsive-img">
                      <h6 class="text-black mb-0" style="text-align:center; margin-top:0px;"><?= $pro->product_name;?></h6>
                      <ul id="quantity_form">
                        <li>
                         <button type="button" class="btn btn-floating" onclick="update_quantity('sub','<?=$pro->product_id;?>','<?= $pro->id;?>')">-</button>
                        </li>
                        <input type="text" name="quantity_<?= $pro->id;?>" id="input-box" value="<?= $pro->quantity;?>" readonly="">
                        <li>
                         <button type="button" class="btn btn-floating" onclick="update_quantity('add','<?=$pro->product_id;?>','<?= $pro->id;?>')">+</button>
                        </li>

                      </ul>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <div class="row"style="text-align:center;">
                        <div class="col 19 m9 s12">
                         <h5><span class="fa fa-rupee-sign" style="text-align:center;"></span>&nbsp;<?php $calculate = $pro->quantity * $pro->rate; echo number_format($calculate);?></h5>
                         <h6> <?= $pro->quantity;?> Item X <?= number_format($pro->rate);?></h6>
                         <a href="<?= base_url('home/product_detail/'.$pro->product_id);?>" class="btn btn-flat"  style="text-align:center;" target="blank">View</a>
                         <a href="<?= base_url('home/remove_product/'.$pro->product_id);?>" class="btn btn-flat" style="text-align:left;">Remove Item</a>
                       </div>
                     </div>
                    </div>
                  </div>
                  <hr class="my-4">
                <?php endforeach;?>
              <?php else:?>
                <center>
                <h2><span class="fa fa-shopping-cart" style="color:#ff3d00;"></span></h2>
              <h4>Your Card Is Empty ? <a href="<?= base_url('home/index');?>" style="text-decoration:none;">Start Shopping Now</a></h4>
            </center>
              <?php endif;?>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Price Detail</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">Price <?= count($products);?></h5>
                    <h5><?php if(count($products)):
                      $t_amount = 0;
                    foreach($products as $cpro):
                      $t_amount += ($cpro->quantity * $cpro->rate);
                    endforeach;
                    else:
                      $t_amount = 0;
                    endif;
                    echo  ($t_amount > 0) ? number_format($t_amount) : '0';?></h5>

                  </div>


                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5><?php if(count($products)):
                      $t_amount = 0;
                    foreach($products as $cpro):
                      $t_amount += ($cpro->quantity * $cpro->rate);
                    endforeach;
                    else:
                      $t_amount = 0;
                    endif;
                    echo  ($t_amount > 0) ? number_format($t_amount) : '0';?></h5>
                  </div>
                  <hr class="my-4">

                   <?php if(count($products)):?>
                    <a href="<?= base_url('home/index');?>" class="btn waves-effect waves-light" style="text-align:right; background:#ff3d00;">Continue Shopping</a>
                    <a href="<?= base_url('home/place_order');?>" class="btn waves-effect waves-light" style="text-align:center; background:#ff3d00; margin-top:15px;">Place Order</a>

                  <?php else:?>
                    <a href="<?= base_url('home/index');?>" class="btn waves-effect waves-light" style="text-align:center; background:#ff3d00; margin-top:15px;">Continue Shopping</a>

                  <?php endif;?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $this->load->view("home/footer");?>

  <?php $this->load->view("home/js-file.php");?>

  </body>
</html>
