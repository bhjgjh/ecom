<!--header oe uske csske file sari isme hai jo link ke thi-->




<!--topbar Section-->
<style>
#topbar {
  background: #ff3d00 !important;
  padding: 2px;
}
#my_account_dropdown {
  width: 10% !important;
}

#my_account_dropdown li a {
  color: grey;
  font-size: 14px;
  padding-top: 10px;
  padding-bottom: 10px;
}

#searchbar {
  background: #ff3d00 !important;
}

#searchbar #logo {
  font-size: 30px;
  font-weight: 700;
  color: white;
}

#search_form {
  display: flex;
}

#search_form li:first-child {
  width: 450px;
}

#search {
  background: white;
  padding-left: 10px;
  padding-right: 10px;
  box-shadow: none;
  box-sizing: border-box;
  height: 40px;
  border-bottom: none;
  margin-bottom: 0px;

}

nav {
  background: black;
  height: 40px;
  line-height: 40px;
  box-shadow: none;
  margin-bottom: 0px;
}


#img {
  height: 150px;
  width: 200px;
}
#show_product_list{
  background: white;
  margin-top: 0px;
  position: absolute;
  z-index: 99;
  width: 450px;
  display: none;
}
#show_product_list a{
  display: block;
  font-size: 14px;
  color: grey;
  font-weight: 500px;
  padding-left: 15px;
  line-height: 35px;
}
#show_product_list a:hover{
  background: rgba(0,0,0,0.05);
}


</style>
<div id="topbar">
  <h6 style="color:white;font-size:14px;font-weight:500;margin-top:5px;padding-left:15px;">
    <span class="fa fa-mobile"></span>&nbsp;+91 - 8802931278&nbsp;&nbsp;&nbsp; <span class="fa fa-envelope"></span>
       &nbsp;ganeshmishra1997@gmail.com <span class="right" style="padding-right:15px;">
      <a href="#!" class="dropdown-trigger" data-target="my_account_dropdown" style="color:white;"style="text-decoration:none;">
        <span class="fa fa-user"></span>&nbsp;My Account </a>
    </span>
  </h6>
  <!--my_account_dropdown-->
  <ul class="dropdown-content" id="my_account_dropdown">
    <?php if($this->session->userdata('email')=="" && $this->session->userdata('password') == ""):?>
    <li>
      <a href="<?php echo base_url("home/user_signup");?>" class="waves-effect"style="text-decoration:none;">
      <span class="fa fa-user-plus"></span>&nbsp;Register </a>
    </li>
    <li>
      <a href="<?php echo base_url("home/user_signin");?>" class="waves-effect"style="text-decoration:none;">
        <span class="fa fa-sign-in-alt"></span>&nbsp;Login </a>
    </li>
  <?php else:?>
    <li>
      <a href="<?php echo base_url("home/dashboard");?>" class="waves-effect"style="text-decoration:none;">
      <span class="fa fa-user-plus"></span>&nbsp;Dashboard </a>
    </li>
    <li>
      <a href="<?php echo base_url("home/my_order");?>" class="waves-effect"style="text-decoration:none;">
      <span class="fa fa-user-plus"></span>&nbsp;My Orders</a>
    </li>
    <li>
      <a href="<?php echo base_url("home/carts");?>" class="waves-effect"style="text-decoration:none;">
      <span class="fa fa-user-plus"></span>&nbsp;Carts </a>
    </li>
    <li>
      <a href="<?php echo base_url("home/logout");?>" class="waves-effect"style="text-decoration:none;">
        <span class="fa fa-sign-in-alt"></span>&nbsp;Logout </a>
    </li>
  <?php endif;?>
  </ul>
  <!--my_account_dropdown close-->
</div>
<!--topbar Section and-->
<!--search bar Section-->
<div id="searchbar">
  <div class="row" style="margin-bottom:0px;">
    <div class="col 13 m3 s12">
      <h6 style="margin-top:10px; margin-left:10px;"> &nbsp;&nbsp; <a href="<?php echo base_url("home/index");?>" id="logo"style="text-decoration:none;">Apni Dukan</a>
      </h6>
    </div>
    <div class="col 16 m6 s12">
      <!--search bar-->
      <ul id="search_form">
        <li>
          <input type="text" name="search" id="search" onkeyup="search_products(this.value)" placeholder="search Your Products" autocomplete="of">
          <!-- product list section-->
           <div id="show_product_list">
           <a href="">Product name</a>
           <a href="">Product name</a>
           <a href="">Product name</a>
           <a href="">Product name</a>
           <a href="">Product name</a>

           </div>
          <!-- product list section-->

        </li>
        <li>
          <button type="submit" class="btn waves-effect waves-light" style=" background:black;  color:white; height:40px; font-weight:500px;">Search</button>
        </li>
      </ul>
      <!--search bar end-->
    </div>
    <div class="col 13 m3 s12">
      <h6 style="font-size:15px;color:white; text-align:center; line-height:20px; font-weight:700;margin-top:15px;">
        <a href="<?php echo base_url("home/carts");?>" style="color:white;"><span class="fa fa-shopping-cart"style="text-decoration:none;">
        </span>&nbsp;My Cart </br><span id="total_products"> 0</span> Items - <span class="fa fa-inr"></span><span id="total_amount">0</span>
      </a></h6>
    </div>
  </div>
</div>
<!--menu bar section-->
<nav>
  <div class="wrapper">
    <!--left side menue-->
    <ul class="left">
      <li>
        <a href="<?php echo base_url("home/index");?>" style="text-decoration:none;">Home</a>
      </li>
      <li>
        <a href="<?php echo base_url("home/profile");?>" style="text-decoration:none;">Company Profile</a>
      </li>

      <li>
        <a href="<?php echo base_url("home/contact");?>" style="text-decoration:none;">Contact Us</a>
      </li>
    </ul>
  </div>
  <!--left side menue and-->

</nav>
<!--menu bar section and-->
