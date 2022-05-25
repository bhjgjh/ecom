<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= (count($product))?$product[0]->product_title : 'Product Not Found.';?>-Apni Dukan</title>
    <?php $this->load->view("home/css-file");?>
     <style media="screen">

    </style>
  </head>
  <body>
    <!--body section-->
    <?php $this->load->view("home/header");?>
    <div class="card" style="margin-top:10px;">
      <div class="card-content" style="padding:10px;">
        <!--product detail section-->

<div class="row">
<div class="col l4 m5 s12">
  <img src="<?php echo base_url().'upload/product_image/'.$product[0]->image;?>" class="responsive-img"  style="border:1px solid:rgba(0,0,0,0.1); margin-top:30px;">
</div>
<div class="col l6 m4 s12">
  <h5><?= $product[0]->product_title;?></h5>

   <?php $category_detail = get_category_details($product[0]->category_id);?>
    <h6 style="font-size:14px;color:silver; font-weight:500;"><a href="<?= base_url('home/index');?>" style="text-decoration:none;">Home</a>/
      <a href="<?= base_url('home/category_products/'.$product[0]->category_id);?>" style="text-decoration:none;"><?= $category_detail[0]->category_name;?></a>/<?= $product[0]->product_title;?></h6>
    <div class="divider" style="margin-top:15px;margin-bottom:15px;"></div>
    <p style="margin-top:15px; color:grey;"><?= $product[0]->short_description;?></p>
    <h6 style="margin-top:10px; font-size:15px;font-weight:500;color:grey;">Color: <?= $product[0]->color;?></h6>
      <h6 style="margin-top:10px; font-size:15px;font-weight:500;color:grey;">Weight:<?= $product[0]->weight;?> </h6>
      <div class="divider" style="margin-top:15px;margin-bottom:15px;"></div>

    <h5><b><span class="fa fa-rupee-sign"></span>&nbsp;<?= $product[0]->price;?></b></h5>
    <div class="row">
      <div class="col l6 m6 s12">
        <button type="button" class="btn waves-effect  waves-light" style="background:#ff3d00; width:100%;height:40px; box-shadow:none;"><span class="fa fa-shopping-cart" ></span>&nbsp;Add to Cart</button>
      </div>
      <div class="col l6 m6 s12">
        <button type="button" class="btn waves-effect waves-light" style="background:black; color:white; width:100%;height:40px; box-shadow:none;"><span class="fa fa-cube" ></span>&nbsp;Buy Now</button>
      </div>

    </div>
</div>
<div class="col l2 m3 s12">
  <div class="card" style="box-shadow:none; border:1px dashed silver;">
    <div class="card-content">
      <h6 style="font-size:15px; font-weight:500px; margin-top:0px;">Gift Card</h6>
      <p style="color:grey;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
    </div>
  </div>
  <div class="card" style="box-shadow:none; border:1px dashed silver;">
    <div class="card-content">
      <h6 style="font-size:15px; font-weight:500px; margin-top:0px;">Gift Card</h6>
      <p style="color:grey;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
    </div>
  </div>

  <div class="card" style="box-shadow:none; border:1px dashed silver;">
    <div class="card-content">
      <h6 style="font-size:15px; font-weight:500px; margin-top:0px;">Gift Card</h6>
      <p style="color:grey;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
    </div>
  </div>
  <div class="card" style="box-shadow:none; border:1px dashed silver;">
    <div class="card-content">
      <h6 style="font-size:15px; font-weight:500px; margin-top:0px;">Gift Card</h6>
      <p style="color:grey;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
    </div>
  </div>


</div>

</div>
<!--product detail section-->

<!--related product-->
<div class="row" style="margin-left:1px;">
<h5 style="padding-left:20px; font-size:22px; font-weight:500;">Related Products
</h5>
<?php if(count($related_products)):
  foreach($related_products as $r_pro):?>
 <div class="card" style="width: 16rem;">
 <img src="<?=base_url().'upload/product_image/'.$r_pro->image;?>" class="responsive-img" style="width:100%;height:200px;">
 <div class="card-content" style="padding:10px;border-bottom:1px solid silver;">
   <h6 style="font-size:15px; color:black;font-weight:500;margin-top:5px; text-align:center;"><?php echo $r_pro->product_title;?></h6>
   <h6 style="font-size:20px; color:grey; margin-top:5px; text-align:center;"><?php
      $category_data = get_category_details($r_pro->category_id);
      echo $category_data[0]->category_name;?></h6>
   <h5 style="text-align:center;color:grey; margin-top:5px; margin-bottom:5px;">
     <span class="fa fa-inr"></span>&nbsp;<?= $r_pro->price;?>
   </h5>
 </div>
 <div>
   <center>
     <a href="" class="btn btn-flat btn-floating waves-effect">
       <span class="fa fa-shopping-cart"></span>
     </a>
     <a href="" class="btn btn-flat btn-floating waves-effect">
       <span class="fa fa-eye"></span>
     </a>
   </center>
 </div>
</div>
<?php endforeach;
else:?>
<h6>Related Product Not Found</h6>
<?php endif; ?>
</div>
<!--related product-->


</div>
</div>




    </div> <?php $this->load->view("home/footer");?>
    <?php $this->load->view("home/js-file.php");?>
  </body>
</html>
