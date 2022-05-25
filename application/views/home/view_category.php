<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> <?= (count($category_detail)) ? $category_detail[0]->category_name.'&nbsp;products' : 'Category Not Found.'; ?>-Apni Dukan</title>
    <?php $this->load->view("home/css-file");?>
     <style media="screen">
      .btn-flat:hover {
        background: #ff3d00;
        color: white;
      }

      .btn-flat:hover {
        color: white;
      }

      #category_filter {
        color: white;
        padding-top: 10px;
        padding-bottom: 10px;
      }

      #category_filter li a {
        color: grey;
        font-size: 14px;
      }
    </style>
  </head>
  <body>
    <!--body section-->
      <?php $this->load->view("home/header");?>
      <div class="row" style="margin-left:1px;">
      <h5 style="padding-left:20px; font-size:22px; font-weight:500; margin-top:20px; margin-bottom:20px;"><?= (count($category_detail)) ? $category_detail[0]->
      category_name.'&nbsp;products' : 'Category Not Found.'; ?> <span class="right">
          <button type="button" class="btn btn-flat waves-effect waves-light dropdown-trigger" data-target="category_filter">
            <span class="fa fa-filter"></span>&nbsp;Product Filter </button>
        </span>
      </h5>


     <?php
     $cate_id = (count($category_detail)) ? $category_detail[0]->id : '0';

       ?>
      <!--category filter dropdown-->

      <ul class="dropdown-content" id="category_filter">
        <li>
          <a href="<?= base_url('home/product_filter/'.$cate_id.'/default');?>" class="waves-effect" style="text-decoration:none;">Default Product</a>
        </li>
        <li>
          <a href="<?= base_url('home/product_filter/'.$cate_id.'/best_metch');?>" class="waves-effect" style="text-decoration:none;">Best Match</a>
        </li>
        <li>
          <a href="<?= base_url('home/product_filter/'.$cate_id.'/lowest_price');?>" class="waves-effect" style="text-decoration:none;">Lowest Price</a>
        </li>
        <li>
          <a href="<?= base_url('home/product_filter/'.$cate_id.'/highest_price');?>" class="waves-effect" style="text-decoration:none;">Highest Price</a>
        </li>
      </ul>
    </div>
      <!--category filter dropdown-->
       <div class="row" style="margin-bottom:0px;">
      <?php if(count($produc)):
        foreach($produc as $Product):?>
          <div class="col l2 m3 s6">
            <a href="<?= base_url('home/product_detail/'.$Product->id);?>" target="_blank">

        <div class="card" style="width: 18rem;">
          <div class="card-image">
        <img src="<?=base_url().'upload/product_image/'.$Product->image;?>" class="responsive-img" style="width:100%;height:200px;">
        <div class="card-content" style="padding:10px;border-bottom:1px solid silver;">
          <h6 style="font-size:15px; color:black;font-weight:500;margin-top:5px; text-align:center;"><?= $Product->product_title;?></h6>
          <h6 style="font-size:20px; color:grey; margin-top:5px; text-align:center;"><?php
           $category_data = get_category_details($Product->category_id);
           echo (count($category_data)) ? $category_data[0]->category_name : 'No Category';?></h6>
          <h5 style="text-align:center;color:grey; margin-top:5px; margin-bottom:5px;">
            <span class="fa fa-inr"></span>&nbsp;<?= $Product->price;?>
          </h5>
        </div>
        <div>
          <center>
            <a href="#!" class="btn btn-flat btn-floating waves-effect" onclick="add_to_cart('<?= $Product->id; ?>');">
              <span class="fa fa-shopping-cart"></span>
            </a>
            <a href="#!" class="btn btn-flat btn-floating waves-effect" onclick="view_product_details('<?= $Product->id; ?>')">
              <span class="fa fa-eye"></span>
            </a>
          </center>
        </div>
      </div>
    </div>
  </div>
</a>




    <?php endforeach;
         else:?>
     <h6>Product Not Found.</h6>
   <?php endif;?>
    </div>
    <?php $this->load->view("home/footer");?>
    <?php $this->load->view("home/js-file.php");?>
  </body>
</html>
