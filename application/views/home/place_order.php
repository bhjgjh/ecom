<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Place-Order-Apni Dukan</title> <?php $this->load->view("home/css-file");?> <style media="screen">
      #inpu_box {
        border: 1px solid silver;
        box-shadow: none;
        box-sizing: border-box;
        padding-left: 10px;
        padding-right: 10px;
        height: 40px;
        border-radius: 3px;
      }

      textarea {
        border: 1px solid silver;
        padding: 10px;
        outline: none;
        height: 90px;
        resize: none;
      }
    </style>
  </head>
  <body>
    <!--body section
	<?php $this->load->view("home/header");?>
			<!user signup form-->
    <div class="container">
    <div class="card">
      <div class="card-content" style="padding:10px; border-bottom:1px solid silver;">
        <h6 style="font-size:15px; color:grey; font-weight:500; margin-top:5px;">User Login & Register</h6>
      </div>
      <!-- yhan pe session ka code use karna hai ke bina login ke is page pe na aae 40th video ke start me jo hai-->
      <?php if($this->session->userdata('email') ==""):?>
      <div class="card-content">
        <a href="<?= base_url('home/user_signup/cart');?>" class="btn waves-effect waves-light" style="text-align:right; background:#ff3d00;">Register Account</a>
        <a href="<?= base_url('home/user_signin/cart');?>" class="btn waves-effect waves-light" style="text-align:center; background:black;">Login Account</a>

      </div>
      <!-- yhan pe wo upper wala session band hoga -->
    <?php endif;?>
    <div class="card-content" style="padding:10px; border-bottom:1px solid silver;">
      User Shipping Address
    </div>
    <?php if($this->session->userdata('email') !="" && $this->session->userdata('password') != ""): ?>
    <?php  $this->load->helper('user');
      $user_detail = get_user_details($this->session->userdata('email'),$this->session->userdata('password'));
      $check_address = $this ->db->get_where('ms_temp_address',['user_id'=>$user_detail[0]->id])->result();
      if(count($check_address)):
        $address = $check_address[0]->address;
      else:
        $address = ""; ?>
        <div class="card-content">
          <?php  echo form_open('home/save_temp_address/'.$user_detail[0]->id);?>
         <h6 style="font-size:14px; color:grey;font-weight:500;">Shipping Address</h6>
        </div>
          <div class="card-content" style="margin-top:0px;">
          <textarea name="shipping_address"><?= $address; ?></textarea>
          <button type="submit" class="btn-waves-effect" style="background:black; color:white;">Save Address</button>
        </div>
      <?php endif; ?>
       <?php endif;?>
       <div class="card-content"style="padding:10px; border-bottom:1px solid silver;">
         Complete Purchase
       </div>
       <div class="card-content"style="padding:10px; border-bottom:1px solid silver;">
         <?php
         $t_amount = 0;
          if(count($products)):
           foreach($products as $product):
              $t_amount += ($product->quantity * $product->rate);?>
      <h6><?= $product->product_name;?><span class="right"><span class="fa fa-inr">&nbsp;<?=$product->rate * $product->quantity;?> </span></span></h6>
        <?php endforeach;
      else:
         $t_amount = 0;?>
      <h6 style="text-align:center;">Product Not Found.</h6>
    <?php endif;?>
    <h6>Grand Total<span class="right"><span class="fa fa-inr"></span>&nbsp; <?= number_format($t_amount);?></span></h6>
    <a href="<?= base_url('home/complete_purchase');?>" class="btn btn waves-effect waves-light" style="background:black;text-transform:capitalize; color:white; margin-top:10px;">Complete Purchase</a>
       </div>

      </div>
    </div>

    <?php $this->load->view("home/footer");?>
    <?php $this->load->view("home/js-file.php");?>
  </body>
</html>
