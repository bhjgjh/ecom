<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage Category-Apni Dukan</title>
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
    </style>
  </head>
  <body>
    <!--body section-->
     <?php $this->load->view('admin/topbar');?>
      <div class="container">
      <div class="card">
        <div class="card-content" style="border-bottom:1px solid silver; padding:10px;">
          <h5>Manage Categories</h5>

          <!-- category search form-->
            <div class="row">
          <div class="col l6 m6 s12">
            <?= form_open('admin/search_category');?>
         <ul id="search_category">
        <li>
        <input type="text" name="category_name" id="input_box" placeholder="Enter Category Name" value="<?= set_value('category_name');?>">
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
        <li><a href="<?= base_url('admin/filter_category/new_category');?>" class="waves-effect">New Category First</a></li>
        <li><a href="<?= base_url('admin/filter_category/old_category');?>" class="waves-effect">Old Category First</a></li>
        <li><a href="<?= base_url('admin/filter_category/highest_products');?>" class="waves-effect">Highest Products</a></li>
        <li><a href="<?= base_url('admin/filter_category/lowest_Products');?>" class="waves-effect">Lowest Products</a></li>
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
              <th>PRODUCTS</th>
              <th>STATUS</th>
              <th style="text-align:center;">ACTION</th>
            </tr>
            <?php if(count($categories)):
              foreach($categories as $cate):?>
              <tr>
              <td>
                <center>
                  <img src="<?= base_url().'upload/category_image/'.$cate->image;?>" class="responsive-img" id="category_image">
                </center>
              </td>
              <td style="font-size:14px; color:grey;">
                 <?=  $cate->category_name;?> </br>
                <a href="" style="text-decoration:none;">View On Home</a>
              </td>
              <td style="font-size:14px; color:grey;">
                <a href="#" style="text-decoration:none">0 Products</a>
              </td>
              <td style="font-size:14px; color:grey;"> <?= ($cate->status =="0") ?'active':'Inactive';?> </td>
              <td>
                <center>
                  <a href="" class="btn btn-flat btn-floating dropdown-trigger" data-target="action_dropdown_<?=$cate->id;?>">
                    <span class="fa fa-ellipsis-v"></span>
                  </a>
                </center>
                <ul class="dropdown-content" id="action_dropdown_<?=$cate->id;?>">
                  <li>
                    <a href="<?= base_url('admin/edit_category/'.$cate->id);?>">
                      <span class="fa fa-edit"></span>&nbspEdit </a>
                  </li>
                  <li>
                    <a href="<?= base_url('admin/del_category/'.$cate->id);?>" onclick="return confirm('Are You Sure Delete This Category.')">
                      <span class="fa fa-trash"></span>&nbspDelete </a>
                  </li>
                  <?php if($cate->status == "0"): ?>
                    <li><a href="<?= base_url('admin/change_category_status/'.$cate->id.'/1');?>" style="width:100px; text-decoration:none;"><span class="fa fa-eye-slash"></span>&nbsp;Inactive</a></li>
                  <?php else: ?>
                    <li><a href="<?= base_url('admin/change_category_status/'.$cate->id.'/0');?>" style="width:100px; text-decoration:none;"><span class="fa fa-eye"></span>&nbsp;Active<a></li>
                    <?php endif;?>
                </ul>
              </td>
            </tr>
          <?php endforeach;
         else:?>
          <tr>
           <td colspan="5" style="text-align:center;">Category Not Found</td>
            </tr>
          <?php endif;?>

          </table>
        </div>
      </div>
    </div>
    <!--card section -->
     <?php $this->load->view("home/js-file.php");?>
     <?php $this->load->view("admin/custom_js");?>
  </body>
</html>
