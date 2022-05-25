<?php $this->load->helper('product')?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Apni Dukan</title>
  <?php $this->load->view("home/css-file");?>

    <style>
      body {
        background: #ffebe5;
      }


    </style>
  </head>
  <body>
    <!--body Section-->
  <?php $this->load->view("home/header");?>
    <!--image slider start-->
    <div style="height:10; margin-left:1px;">
      <div class="carousel carousel-slider" style="height:50px;">
        <div class="carousel-item" href="#one!" style="background:#ffebe5 height:500px;">
          <img src="<?=base_url('image\off.webp');?>" class="responsive-img" style="height:700px;">
        </div>
        <div class="carousel-item" href="#one!">
          <img src="<?=base_url('image\shopping-online-isometric-infographic-flowchart-poster_1284-15255.webp');?>" class="responsive-img" style="height:700px;">
        </div>
        <div class="carousel-item" href="#one!">
          <img src="<?=base_url('image\sss.webp');?>" class="responsive-img" style="height:700px;">
        </div>
        
      </div>
    </div>
    <!--image slider and-->
    <!--category section-->
    <div class="row" style="margin-top:15px; margin-left:1px;">
      <?php if(count($categories)):
        foreach($categories as $cate):?>
        <div class="card waves-effect  h-100" style="width:20%; box-shadow:none; padding:5px; padding-left:10px;">
        <img src="<?=base_url().'upload/category_image/'.$cate->image;?>"
        class="responsive-img" alt="..." style="border:1px solid rgba(0,0,0,0.1); width:100%; margin-top:5px; height:90px;">
        <div class="card-body">
          <h6 style="font-size:15px;color:black;font-weight:500; text-align:center;"><?= $cate->category_name;?></h6>
          <?php $count_products = get_category_products($cate->id); ?>
          <h6 style="font-size:14px;color:grey; margin-top:5px; text-align:center;"><?= count($count_products);?>&nbsp;Products</h6>
          <div style="text-align:center;">
            <a href="<?= base_url('home/category_products/'.$cate->id);?>" class="btn waves-effect waves-light" style="background:#ff3d00; box-shadow:none; margin-top:10px;">View More</a>
          </div>
        </div>
      </div> <?php endforeach;
    else:?>
    <h6>Category Not Found.</h6>
  <?php endif;?>
     </div>
    <!--category section and-->
    <!--category product section-->

    <?php if(count($categories)):
       foreach($categories as $cate):?>
    <div class="row">

       <h5 style="padding-left:20px; font-size:22px; font-weight:500;"><?= $cate->category_name;?> <span class="right">
         <a href="<?= base_url('home/category_products/'.$cate->id);?>" class="btn waves-effect" style="margin-right:12px; background:black; color:white;">View More</a>
       </span>
     </h5>
    <?php
    $products = get_category_products($cate->id);
     if(count($products)):
      foreach($products as $pro):

        ?>

      <div class="col l2 m3 s6">
        <a href="<?= base_url('home/product_detail/'.$pro->id);?>" target="_blank">
        <div class="card">
          <div class="card-image">
            <img src="<?=base_url().'upload/product_image/'.$pro->image;?>" alt="" style="width:100%;height:200px;">
          </div>
          <div class="card-content" style=" padding: 10px;border-bottom: 1px solid silver;">
            <h6 style="font-size:15px; color:black;font-weight:500;margin-top:5px; text-align:center;"><?= $pro->product_title;?></h6>
            <h6 style="font-size:20px; color:grey; margin-top:5px; text-align:center;"><?= $pro->category_name;?></h6>
            <h5 style="text-align:center;color:grey; margin-top:5px; margin-bottom:5px;">
           <span class="fa fa-inr"></span>&nbsp;<?= number_format($pro->price);?>
         </h5>
          </div>
          <div class="card-content" style="padding: 3px;">
            <center>
             <a href="#!" class="btn btn-flat btn-floating waves-effect">
               <span class="fa fa-shopping-cart" onclick="add_to_cart('<?= $pro->id; ?>');"></span>
             </a>
             <a href="#!" class="btn btn-flat btn-floating waves-effect">
               <span class="fa fa-eye" onclick="view_product_details('<?= $pro->id; ?>')"></span>
             </a>
           </center>
          </div>
        </div>
      </a>
      </div>
    <?php endforeach;?>
 <?php else:?>
 <h6>Product Not Found.</h6>
 <?php endif;?>
    </div>
  <?php endforeach;?>
 <?php else:?>
 <h6>Category Not Found.</h6>
 <?php endif;?>
    <!--category product section and-->
  <?php $this->load->view("home/footer");?>
    <!--body Section and-->
    <!-- JQUERY FILE ADD-->
  <?php $this->load->view("home/js-file.php");?>
    <!--script tag and-->
  </body>
</html>
