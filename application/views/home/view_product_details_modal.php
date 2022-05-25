
<span class="right modal-close" style="margin-right:25px; color:red;"><b>X</b></span>
<div class="modal-content">
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
</div>
