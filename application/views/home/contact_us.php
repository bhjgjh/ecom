<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <?php $this->load->view("home/css-file");?>

  </head>
  <body>
    <?php $this->load->view("home/header");?>

    <div class="container-fluid" style="background-image: url(../image/ball-bright-close-up-clouds-207489.jpg)">

  <div class="row">

    <div class="col-md-12">
  <h1 class="text-center text-white pt-5"> Contact Us </h1>
    </div>

    <div class="container mt-5 pb-5">
  <div class="row">
    <div class="col-md-6">
    <div class="card mb-5 h-100">
   <div class="card-header bg-secondary text-white">
     Have question or comments?
   </div>
   <div class="card-body">
     <?php
   if(!empty($this->session->flashdata('message'))){
     ?>
     <div class="alert alert-success">
     <?php echo $this->session->flashdata('message');?>
     </div>
     <?php
       }
     ?>

  <form action="<?php echo base_url('home/contact');?>" method="post" id="cotact-form">
 <div class="form-group">
  <label> Name </label>
  <input type="text" value="<?php echo set_value('name');?>" name="name" id="name" class="form-control">
  <?php echo form_error('name');?>
  </div>

  <div class="form-group">
   <label> Email </label>
   <input type="text" value="<?php echo set_value('email');?>" name="email" id="email" class="form-control">
     <?php echo form_error('email');?>
  </div>


    <div class="form-group">
     <label> Message </label>
    <textarea name="message" value="<?php echo set_value('message');?>" id="message" class="form-control" rows="5"> </textarea>
    </div>

    <button type="submit" id="submit" class="btn btn-primary" style="margin-top:10px;">Send </button>

  </form>
   </div>
</div>


    </div>
    <div class="col-md-4">
    <div class="card h-100">
      <div class="card-header bg-secondary text-white">
       Reach Us
      </div>
       <div class="card-body">
       <p class="mb-0"> <strong> Customer Service: </strong> </p>
       <p class="mb-0"> Phone: +91 8802931278,7011768909</p>
        <p class="mb-0"> E-mail: ganeshmishra1997@gmail.com</p>

          <br>

        <p class="mb-0"> <strong> Headquarter: </strong> </p>
        <p class="mb-0">Company Inc,</p>
         <p class="mb-0">PLOT NO.-10, THIRD FLOOR, PREM NAGAR,
                          UTTAM NAGAR, Delhi - 110059</p>
            <p class="mb-0">Phone:+91 8802931278,7011768909 </p>
             <p class="mb-0">ganeshmishra1997@gmail.com</p>


             <br>

           <p class="mb-0"> <strong> India: </strong> </p>
           <p class="mb-0">espoirSoft pvt.LTD,</p>
            <p class="mb-0">PLOT NO.-10, THIRD FLOOR, PREM NAGAR,
                             UTTAM NAGAR, Delhi - 110059</p>
               <p class="mb-0">Phone:+91 8802931278,7011768909 </p>
                <p class="mb-0">ganeshmishra1997@gmail.com</p>
               </div>
           </div>

         </div>
     </div>
      </div>


  </div>

</div>
<?php $this->load->view("home/footer");?>
<?php $this->load->view("home/js-file.php");?>
  </body>
</html>
