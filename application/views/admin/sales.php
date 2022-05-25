<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage Sales-Apni Dukan</title>
     <?php $this->load->view("home/css-file");?>
      <style>
      body {
        background: #ffebe5;
      }
      #input_box{
        border: 1px solid silver;
        height: 35px;
        padding-left: 10px;
        box-shadow: none;
        box-sizing: border-box;
      }
      #Customize_sale_modal{
        width: 40%;
        height: 30%;
      }
    </style>
  </head>
  <body>
    <!--body section-->
  <?php $this->load->view('admin/topbar');?>
   <div class="container">
     <div class="card">
       <div class="card-content" style="border-bottom:1px solid silver; padding:10px;">
        <h5>Manage Sales<span class="right"><a href="#!" class="modal-trigger" data-target="Customize_sale_modal" style="font-size:15px; font-weight:500px; text-decoration:none;">Customize Sales</a></span></h5>
         <h6>27-06-2020 To 27-06-2020<span class="right"><a href="<?= base_url('admin/all_sales');?>" style="font-size:15px; text-decoration:none; color:red;">Reset</a></span></h6>
         <!--Customize_sale_model-->
         <div class="modal" id="Customize_sale_modal">
           <div class="modal-contant">
             <h6>Customize Sales Report</h6>

           </div>
           <div class="modal-content">
             <?= form_open('admin/search_sales');?>
             <div class="row">
               <div class="col l6 m6 s12">
                 <input type="date" name="start_date" id="input_box" required>
               </div>
               <div class="col l6 m6 s12">
                 <input type="date" name="last_date" id="input_box" required>
               </div>
               <div class="col l12 m12 s12">
                 <button type="submit" class="btn waves-effect waves-light" style="background:black; color:white;">Search Report</button>
               </div>
             </div>
           </div>
         </div>
          </div>
            <div class="card-contant" style="padding:0px; padding-right:10px;">
             <table class="table">
               <tr>
                 <th style="text-align:center;">Date</th>
                  <th>Customers</th>
                   <th style="text-align:right;">Units Sales</th>
                    <th style="text-align:right;">Amount</th>
                      </tr>
                        <?php if(count($sales)):
                          foreach($sales as $sale):?>
                          <tr>
                          <td style="text-align:center;"> <?= $sale['order_date'];?></td>
                          <td><?= $sale['COUNT(order_date)'];?> Customers<br/>
                          <?php
                          $total_customers = get_all_customers($sale['order_date']);
                           ?>
                          <?php if(count( $total_customers )):
                          foreach( $total_customers  as $total_cus):?>
                         <i><span style="color:silver;">Sold By: <?=  $total_cus->user_name;?></span></i>
                        </br>
                          <?php endforeach;
                          else:?>
                         <i>Customers Not Found</i>
                         <?php endif;?>
                        </td>
                        <td style="text-align:right;"><?= $sale['SUM(total_quantity)'];?><br/>
                        <?php
                       $total_customers = get_all_customers($sale['order_date']);
                       ?>
                         <?php if(count( $total_customers )):
                         foreach( $total_customers  as $total_cus):?>
                         <i><span style="color:silver;">Unit: <?=  $total_cus->total_quantity;?></span></i>
                        </br>
                        <?php endforeach;
                         else:?>
                     <i>Quantity Not Found</i>
                    <?php endif;?>
                    </td>
                  <td style="text-align:right;"><?= number_format($sale['SUM(total_amount)'],2,'.',',');?><br/>
                <?php
              $total_customers = get_all_customers($sale['order_date']);
              ?>
            <?php if(count( $total_customers )):
          foreach( $total_customers  as $total_cus):?>
        <i><span style="color:silver;"> <?=  $total_cus->total_amount;?></span></i>
          </br>
      <?php endforeach;
    else:?>
  <i>Quantity Not Found</i>
  <?php endif;?>
    </td>
    </tr>
<?php endforeach;
    else:?>
        <tr>
        <td style="text-align:center;" colspan="3">Sales Not Found</td>
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
