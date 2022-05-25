<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage Products-Apni Dukan</title>
     <?php $this->load->view("home/css-file");?>
      <style>
      body {
        background: #ffebe5;
      }

      #category_image {
        width: 50px;
        height: 50px;
        border-radius: 100%;
        border: 1px solid silver;
      }

      .btn-flat:hover {
        background: #ff3d00;
        color: white;
      }
      #category_filter{
        width: 180px!important;

      }
      #category_filter li a{
        color:grey;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
      }
      #search_category{
        display: flex;
        }
      #search_category li:first-child{
       width: 250px;
      }
      #input_box {
        border: 1px solid silver;
        box-shadow: none;
        box-sizing: border-box;
        padding-left: 10px;
        padding-right: 10px;
        height: 40px;

      }
      #pagination a{
        color: black;
        font-weight: 500;
        border: 1px solid black;
        padding: 5px 10px;
        margin-left: 5px;
        text-decoration: none;

      }
      #pagination strong{

        font-weight: 500;
        border: 1px solid black;
        padding: 5px 10px;
        margin-left: 5px;
        background: black;
        color: white;
      }
    </style>
  </head>
  <body>
    <!--body section-->
     <?php $this->load->view('admin/topbar');?>
      <div class="container">
      <div class="card">
        <div class="card-content" style="border-bottom:1px solid silver; padding:10px;">
          <h5>Manage Products</h5>

          <!-- category search form-->
            <div class="row">
          <div class="col l6 m6 s12">
            <?= form_open('admin/search_product');?>
         <ul id="search_product">
        <li>
        <input type="text" name="product_name" id="input_box" placeholder="Enter Product Name" value="<?= set_value('product_name');?>">
        </li>
        <li>
       <button type="submit" class="btn waves-effect waves-light"style="background:black; color:white; box-shadow:none; height:40px;">Search Now</button>

        </li>
         </ul>
         <?= form_close();?>
          </div>
          <div class="col l6 m6 s12">
          <span class="right">
         <button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="category_filter"
           style=" background:black; color:white;"><span class="fa fa-filter"></span>&nbsp;Filter</button>
          </span>
          <!--category_filter-->
         <ul class="dropdown-content" id="category_filter">
        <li><a href="<?= base_url('admin/filter_product/new_product');?>" class="waves-effect">New Product First</a></li>
        <li><a href="<?= base_url('admin/filter_product/old_product');?>" class="waves-effect">Old Product First</a></li>
        <li><a href="<?= base_url('admin/filter_product/highest_price');?>" class="waves-effect">Highest Price</a></li>
        <li><a href="<?= base_url('admin/filter_product/lowest_price');?>" class="waves-effect">Lowest Price</a></li>
      </ul>

          <!--category_filter-->
          </div>
            </div>

          <!-- category search form-->


        </div>
        <div class="card-content" style="padding:0px;">
          <table class="table">
            <tr>
              <th style="text-align:center; font-size:14px;">IMAGE</th>
              <th>NAME</th>
              <th>CATEGORY</th>
              <th>PRICE</th>
              <th>COUNT SOLD</th>
              <th>STATUS</th>
              <th style="text-align:center;">ACTION</th>
            </tr>
            <?php if(count($products)):
              foreach($products as $pro):?>
              <tr>
              <td>
                <center>
                  <img src="<?= base_url().'upload/product_image/'.$pro->image;?>" class="responsive-img" id="category_image">
                </center>
              </td>
              <td style="font-size:14px; color:grey;">
                 <?=  $pro->product_title;?> </br>
                <a href="<?= base_url('home/product_detail/'.$pro->id);?>" style="text-decoration:none;">View On Home</a>
              </td>
              <td style="font-size:14px; color:grey;">
                <a href="#" style="text-decoration:none"><?php
              $category_data = get_category_details($pro->category_id); echo $category_data[0]->category_name;  ?></a>
              </td>
                <td><?= number_format($pro->price);?></td>
                <td><?= $pro->count_sales;?></td>
              <td style="font-size:14px; color:grey;"> <?= ($pro->status =="0") ?'active':'Inactive';?> </td>
              <td>
                <center>
                  <a href="" class="btn btn-flat btn-floating dropdown-trigger" data-target="action_dropdown_<?=$pro->id;?>">
                    <span class="fa fa-ellipsis-v"></span>
                  </a>
                </center>
                <ul class="dropdown-content" id="action_dropdown_<?=$pro->id;?>">
                  <li>
                    <a href="<?= base_url('admin/edit_product/'.$pro->id);?>">
                      <span class="fa fa-edit"></span>&nbspEdit </a>
                  </li>
                  <li>
                    <a href="<?= base_url('admin/del_product/'.$pro->id);?>" onclick="return confirm('Are You Sure Delete This Category.')">
                      <span class="fa fa-trash"></span>&nbspDelete </a>
                  </li>
                  <?php if($pro->status == "0"): ?>
                    <li><a href="<?= base_url('admin/change_product_status/'.$pro->id.'/1');?>" style="width:100px; text-decoration:none;"><span class="fa fa-eye-slash"></span>&nbsp;Inactive</a></li>
                  <?php else: ?>
                    <li><a href="<?= base_url('admin/change_product_status/'.$pro->id.'/0');?>" style="width:100px; text-decoration:none;"><span class="fa fa-eye"></span>&nbsp;Active<a></li>
                    <?php endif;?>
                </ul>
              </td>
            </tr>
          <?php endforeach;
         else:?>
          <tr>
           <td colspan="5" style="text-align:center;">Product Not Found</td>
            </tr>
          <?php endif;?>
        <tr>
          <td colspan="7">
            <div id="pagination">
             <?= $this->pagination->create_links();?>
        </div>
          </td>
        </tr>
          </table>
        </div>
      </div>
    </div>
    <!--card section -->
     <?php $this->load->view("home/js-file.php");?>
     <?php $this->load->view("admin/custom_js");?>
  </body>
</html>
