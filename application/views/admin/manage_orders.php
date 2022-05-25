<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage Orders-Apni Dukan</title>
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
          <h5>Manage Orders</h5>

          <!-- category search form-->
            <div class="row">
          <div class="col l6 m6 s12">
            <?= form_open('admin/search_orders');?>
         <ul id="search_product">
        <li>
        <input type="text" name="order_id" id="input_box" placeholder="Enter Order Id" value="<?= set_value('order_id');?>">
        </li>
        <li>
       <button type="submit" class="btn waves-effect waves-light"style="background:black; color:white; box-shadow:none; height:40px;">Search Now</button>

        </li>
         </ul>
         <?= form_close();?>
          </div>

            </div>

          <!-- category search form-->

        </div>
        <div class="card-content" style="padding:0px;">
          <table class="table">
            <tr>
              <th style="text-align:center; font-size:14px;">ORDER ID</th>
              <th>CUSTOMER NAME</th>
              <th>QUANTITY</th>
              <th>AMOUNT</th>
              <th>ORDER DATE</th>
              <th>STATUS</th>
              <th style="text-align:center;">ACTION</th>
            </tr>
            <?php if(count($Orders)):
            foreach($Orders as $Order):?>
            <tr>
              <td style="text-align:center;text-decoration: none;"><a href=""><?=$Order->id;?> </a></td>
              <td><?=$Order->user_name;?> </td>
              <td><?=$Order->total_quantity;?></td>
              <td><span class="fa fa-inr"><?= number_format($Order->total_amount);?></span></td>
              <td><?= date('d M Y',strtotime($Order->order_date));?></td>
              <td><?=$Order->order_status;?> </td>
              <td>
                <center>
                  <button type="" class="btn btn-flat btn-floating dropdown-trigger" data-target="order_action_<?=$Order->id;?>"><span class="fa fa-ellipsis-v"></span></button>

                </center>
                <ul class="dropdown-content action_dropdown" id="order_action_<?=$Order->id;?>">
               <li><a href="<?= base_url('admin/order_delete/'.$Order->id);?>" onclick="return confirm('Confirm ! Are You Sure Delete This Order.')" class="waves-effect"
                 style="height:35px;">Delete</a></li>
               <li><a href="<?= base_url('admin/view_order/'.$Order->id);?>" target="_blank" class="waves-effect">View </a></li>

             </ul>
              </td>
            </tr>
          <?php endforeach;
        else:?>
        <tr>
          <td colspan="7" style="text-align:center;">Order Not Found.</td>
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
