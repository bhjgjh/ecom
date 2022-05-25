<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My-my_Orders-Apni Dukan</title>
    <?php $this->load->view("home/css-file");?>
     <style media="screen">
     </style>
  </head>
  <body>
    <!--body section-->
     <?php $this->load->view("home/header");?>
    <h4 style="padding-left:10px; font-size:25px; margin-top:10px; margin-bottom:5px;"> My Orders(<?=count($orders);?>) </h4>
     <div class="container">
       <?php if(count($orders)):
         foreach($orders as $ord):?>

       <div class="Card">
         <div class="card-content" style="border-bottom:1px solid silver;">
          <a href="" class="btn waves-effect waves-light" style="background:#ff3d00; box-shadow:none; margin-top:5px;">Order Id -<?=$ord->id;?> </a>

         <a href="" class="btn waves-effect waves-dark right" style="background:no-repeat;color:grey;box-shadow:none;border:1px solid silver;">track Order </a>

           <div class="card-content">
             <?php $this->load->helper('product');
             $order_items = get_order_products('order_products',$ord->id);?>
             <?php if(count($order_items)):
               foreach($order_items as $ord_items):?>
             <div class="row" style="margin-bottom:0px;">
               <div class="col l2 m3 s12">
                 <img src="<?php echo base_url("image/bag.jpg");?>" class="responsive-img" style="width:100px; height:100px; margin-top:15px;">

               </div>
               <div class="col l5 m5 s12">
              <h6 style="font-size:20px; font-weight:500;"><?=$ord_items->product_name;?></h6>
              <h5 style="font-size:14px; color:grey; margin-top:0px;">Quantity : <?= $ord_items->quantity;?></h5>
               </div>
               <div class="col l5 m4 s12">
                 <h5 style="font-size:20px; font-weight:500;"><span class="fa fa-rupee-sign"></span>&nbsp;<?= $ord_items->rate;?></h5>
                 <h6  style="font-size:14px; color:grey; margin-top:0px;">
                   <?php if($ord->order_status == "Delivered"):
                   $status = "Delivered";?>
                 <?php else:
                   $status = "Not Delivered";?>
                 <?php endif;?>
                   Product is <?= $status;?></h6>

               </div>




             </div>
           <?php endforeach;
         else:?>
          <h6>Product Not Found</h6>
       <?php endif;?>
           </div>

         </div>
         <div class="card-content" style="border-bottom:1px solid silver;">
           <h6 style="margin-top:10px; margin-bottom:10px;"> Ordered On : <b><?= date('D,M.d,Y',strtotime($ord->order_date));?><span class="right">
             Order Total : <span class="fa fa-rupee-sign"></span>&nbsp;<?= number_format($ord->total_amount);?></span></b>

        </div>
       </div>
     <?php endforeach;
   else:?>
    <h6>Order's Not Found</h6>
 <?php endif;?>

     </div>

    <div class="container">
       <p style="text-align:center; font-size:14px; color:grey; font:weight:500px; margin-top:10px;">
         Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut t </p>
    </div>
    <?php $this->load->view("home/footer");?>
     <?php $this->load->view("home/js-file.php");?>
  </body>
</html>
