<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard-Apni Dukan</title>
    <?php $this->load->view("home/css-file");?>
     <style media="screen">
  /*    nav {
      background:#ff3d00;
      height:45px;
      line-height:45px;
      margin-top: 0px;
      }
      nav.brand-logo{
        font-size: 20px;
        font-weight: 500;

      }*/

      *{
        box-sizing: border-box;
      }
      html,body{
        overflow: auto;
        height: 100%;
      }
      body{
        font-family: arial,sans-serif;
        background: #fff;
        padding: 0;
        margin:0;
        background-color:#ffebe5;
      }

      .main{
        height: 100%;
        margin-top: 60px;
        padding: 10px 50px;

      }





 ul#order_dropdown{
   width: 200px !important;
   padding-top: 8px;
   padding-bottom: 8px;

 }
 #order_dropdown a{
   color: grey;
   font-style: 14px;
   font-weight: 500;
 }
 ul#income_dropdown{
   width: 200px !important;
   padding-top: 8px;
   padding-bottom: 8px;

 }
 #income_dropdown a{
   color: grey;
   font-style: 14px;
   font-weight: 500;
 }
 ul#products_dropdown{
   width: 200px !important;
   padding-top: 8px;
   padding-bottom: 8px;

 }
 #products_dropdown a{
   color: grey;
   font-style: 14px;
   font-weight: 500;
 }
 ul#customers_dropdown{
   width: 200px !important;
   padding-top: 8px;
   padding-bottom: 8px;

 }
 #customers_dropdown a{
   color: grey;
   font-style: 14px;
   font-weight: 500;
 }
 #top_sold_products li{
   border-bottom: 1px dashed silver;
   padding: 10PX;
 }
 #top_sold_products li:hover{
   background: rgba(0,0,0,0.1);
 }

</style>
  </head>
  <body>
  <!--body section-->

<?php $this->load->view("admin/topbar");?>

   <!--card section -->
<div class="row" style="margin-top:70px; margin-bottom:0px; margin-left:0px; margin-right:5px;">
  <div class="col l3 m4 s12">
    <div class="card">
        <div class="card-content">
          <h6 style="font-size:15px; font-weight:500;">Order'S<span class="right"><span class="fa fa-ellipsis-v dropdown-trigger" data-target="order_dropdown" style="cursor:pointer;"></span></span></h6>
         <h5 style="margin-top:10px; color:#ff3d00;"><b><span id="show_orders"><span id="show_orders"></span></b><span class="right"><span class="fa fa-shopping-cart text-black"></span></span></h5>
         <h6 style="font-size:14px;color:silver;"><span id="show_orders_heading">Last 30 Days</span></h6>
        </div>

    </div>
    <ul class="dropdown-content" id="order_dropdown">
    <a href="#!" onclick="count_orders('today')" style="color: black;text-decoration: none; margin-left:5px;">Today Order</a></br></br>
    <a href="#!" onclick="count_orders('yesterday')" style="color: black;text-decoration: none;  margin-left:5px;">Privious Day Order</a></br></br>
    <a href="#!" onclick="count_orders('last_30_days')" style="color: black;text-decoration: none;   margin-left:5px;">Last 30 Days Order</a></br></br>
    <a href="#!" onclick="count_orders('all')" style="color: black;text-decoration: none;   margin-left:5px;">All Orders</a></br>
    </ul>
  </div>


  <div class="col l3 m4 s12">
    <div class="card">
        <div class="card-content">
          <h6 style="font-size:15px; font-weight:500;">Income<span class="right"><span class="fa fa-ellipsis-v dropdown-trigger" data-target="income_dropdown" style="cursor:pointer;"></span></span></h6>
         <h5 style="margin-top:10px; color:#ff3d00;"><b><span id="show_income">1,55,200</span></b><span class="right"><span class="fa fa-inr text-black"></span></span></h5>
         <h6 style="font-size:14px;color:silver;">Last 30 Days</h6>
        </div>

    </div>
    <ul class="dropdown-content" id="income_dropdown">
    <a href="" style="color: black;text-decoration: none; margin-left:5px;">Today Order</a></br></br>
    <a href="" style="color: black;text-decoration: none;  margin-left:5px;">Privious Day Order</a></br></br>
    <a href="" style="color: black;text-decoration: none;   margin-left:5px;">Last 30 Days Order</a></br></br>
    <a href="" style="color: black;text-decoration: none;   margin-left:5px;">All Orders</a></br>
    </ul>
  </div>


  <div class="col l3 m4 s12">
    <div class="card">
        <div class="card-content">
          <h6 style="font-size:15px; font-weight:500;">Products<span class="right"><span class="fa fa-ellipsis-v dropdown-trigger" data-target="products_dropdown" style="cursor:pointer;"></span></span></h6>
         <h5 style="margin-top:10px; color:#ff3d00;"><b>1500</b><span class="right"><span class="fa fa-cubes text-black"></span></span></h5>
         <h6 style="font-size:14px;color:silver;">Last 30 Days</h6>
        </div>

    </div>
    <ul class="dropdown-content" id="products_dropdown">
    <a href="" style="color: black;text-decoration: none; margin-left:5px;">Today Order</a></br></br>
    <a href="" style="color: black;text-decoration: none;  margin-left:5px;">Privious Day Order</a></br></br>
    <a href="" style="color: black;text-decoration: none;   margin-left:5px;">Last 30 Days Order</a></br></br>
    <a href="" style="color: black;text-decoration: none;   margin-left:5px;">All Orders</a></br>
    </ul>
  </div>


  <div class="col l3 m4 s12">
    <div class="card">
        <div class="card-content">
          <h6 style="font-size:15px; font-weight:500;">Customers<span class="right"><span class="fa fa-ellipsis-v dropdown-trigger" data-target="customers_dropdown" style="cursor:pointer;"></span></span></h6>
         <h5 style="margin-top:10px; color:#ff3d00;"><b>1500</b><span class="right"><span class="fa fa-users text-black"></span></span></h5>
         <h6 style="font-size:14px;color:silver;">Last 30 Days</h6>
        </div>

    </div>
    <ul class="dropdown-content" id="customers_dropdown">
    <a href="" style="color: black;text-decoration: none; margin-left:5px;">Today Order</a></br></br>
    <a href="" style="color: black;text-decoration: none;  margin-left:5px;">Privious Day Order</a></br></br>
    <a href="" style="color: black;text-decoration: none;   margin-left:5px;">Last 30 Days Order</a></br></br>
    <a href="" style="color: black;text-decoration: none;   margin-left:5px;">All Orders</a></br>
    </ul>
  </div>

</div>
   <!--card section -->
   <!--niche ka card-->
   <div class="row" style="margin-left:0px; margin-right:5px;">
   <div class="col l7 m7 s12">
    <div class="card">
      <div class="card-content">
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>

      </div>
    </div>
   </div>

<div class="col l5 m5 s12">
     <div class="card">
       <div class="card-content">
       <h4><b>Top Products Sold<b></h4>
       <ul id="top_sold_products">
         <?php if(count($top_sold_products)):
           foreach($top_sold_products as $t_s_pro):?>
      <li>
        <h6 style="font-size:14px; font-weight:500px;"><a href="<?=base_url('home/product_detail/'.$t_s_pro->id);?>" style="color:black;"><?=$t_s_pro->product_title;?></a></h6>
      <h6 style="font-size:15px;"><span class="fa fa-inr"></span>&nbsp;<?= number_format($t_s_pro->price);?><span class="right"><b><?=$t_s_pro->count_sales;?></b></span></h6>
        </li>
      <?php endforeach;
    else:?>
  <?php endif;?>
         </ul
       </div>
     </div>

   </div>
   </div>
   <!--niche ka card-->

   <!--sidebar start-->

    <?php $this->load->view("home/js-file.php");?>
     <?php $this->load->view("admin/custom_js");?>

  </body>
</html>
