<style media="screen">
.header{
  background: #ee5253;
  width: 100%;
  height: 60px;
  position: fixed;
  z-index: 10;
}
#sidebarMenu{
  height: 100%;
  position: fixed;
  left: 0;
  top: 0;
  width: 250px;
  margin-top: 50px;
  background: #2e86de;
  transform: translateX(-250px);
  transition: transform 250ms ease-in-out
}
#openSidebarMenu:checked ~ #sidebarMenu{
  transform: translateX(0px);

}
.menu{
  list-style: none;
  padding: 0px;
  margin: 0px;
}
.menu li{
  color: #fff;
  border-bottom: 1px solid rgba(255,255,255,0.10);

}
.menu li a{
  color: #fff;
  display: block;
  text-decoration: none;
  text-transform: uppercase;
  padding: 17px;
}
.sidebarIcon{

  width: 22px;
  height: 22px;
  position: absolute;
  z-index: 20;
  top: 22px;
  left: 15px;
  cursor: pointer;
}
.spinner{
  height: 5px;
  background: #fff;
  transition: all 0.3s;
  background: blue;
}
.spinner.middle,
.spinner.bottom{
  margin-top: 3px;
}


</style>
<div class="header">
  <a href="<?= base_url("admin/signout");?>" class="right" style="margin-right:20px; margin-top:15px; border:2px solid black;color:white; text-decoration:none; font-size:20px; background:black;">&nbsp;Sign Out&nbsp;</a>

  <input type="checkbox" id="openSidebarMenu">
  <label for="openSidebarMenu" class="sidebarIcon" style="align:right;">
  <div class="spinner top"></div>
  <div class="spinne middle"></div>
  <div class="spinner bottom"></div>
  <div class="spinner bottom"></div>

  </label>
  <div id="sidebarMenu" style="margin-bottom:500px;">
        <ul class="nav" style="margin-top:5px;">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("admin/index");?>">
              <i class=""></i>
              <span class="" style="color:white;">Dashboard</span>
            </a>
          </li>
        </ul>

        <ul class="nav" style="margin-top:5px;">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("admin/add_category");?>">
              <i class=""></i>
              <span class="" style="color:white;">Add Category</span>
            </a>
          </li>
        </ul>
        <ul class="nav" style="margin-top:5px;">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/manage_category');?>">
              <i class=""></i>
              <span class="" style="color:white;">Manage Category</span>
            </a>
          </li>
        </ul>
        <ul class="nav" style="margin-top:5px;">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/add_product');?>">
              <i class=""></i>
              <span class="" style="color:white;">Add Product</span>
            </a>
          </li>
        </ul>
        <ul class="nav" style="margin-top:5px;">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("admin/manage_products");?>">
              <i class=""></i>
              <span class="" style="color:white;">Manage Product</span>
            </a>
          </li>
        </ul>
        <ul class="nav" style="margin-top:5px;">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("admin/manage_orders");?>">
              <i class=""></i>
              <span class="" style="color:white;">Manage Orders</span>
            </a>
          </li>
        </ul>
        <ul class="nav" style="margin-top:5px;">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("admin/pandding_orders");?>">
              <i class=""></i>
              <span class="" style="color:white;">Pandding Orders</span>
            </a>
          </li>
        </ul>
        <ul class="nav" style="margin-top:5px;">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("admin/delivered_orders");?>">
              <i class=""></i>
              <span class="" style="color:white;">Delivered Orders</span>
            </a>
          </li>
        </ul>
        <ul class="nav" style="margin-top:5px;">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/today_sales');?>">
              <i class=""></i>
              <span class="" style="color:white;">Today Sales</span>
            </a>
          </li>
        </ul>
        <ul class="nav" style="margin-top:5px;">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/all_sales');?>">
              <i class=""></i>
              <span class="" style="color:white;">All Time Sales</span>
            </a>
          </li>
        </ul>
      
  </div>
</div>

<div class="alert alert-success">
  <?php if($msg = $this->session->flashdata('success')):?>
  <?php endif;?>
</div>
<div class="alert alert-success">
  <?php if($msg = $this->session->flashdata('error')):?>
  <?php endif;?>
</div>
