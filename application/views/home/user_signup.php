<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Apni Dukan</title> <?php $this->load->view("home/css-file");?> <style media="screen">
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
    <div class="container" style="width:1000px; margin-left:30%;">
      <div class="row" style="margin-bottom:0px;margin-top:10px;">
        <div class="col l4 m4 s12">
          <div class="card">
            <div class="card-content">
              <?= form_open('home/user_registerd/'.$page);?>
              <center>
                <h5>
                  <span class="fa fa-users"></span>
                </h5>
                <h6>Creat Account</h6>
              </center>
              <h6>Full Name</h6>
              <input type="text" name="full_name" id="inpu_box" placeholder="Full Name">
              <h6>Email</h6>
              <input type="email" name="email" id="inpu_box" placeholder="email">
              <h6>Mobile No</h6>
              <input type="text" name="mobile" id="inpu_box" placeholder="mobile">
              <h6>Password</h6>
              <input type="password" name="password" id="inpu_box" onkeyup="check_password()" placeholder="xxxxxxxxxx">
              <h6>Retype password</h6>
              <input type="password" name="Retype_password" id="inpu_box" onkeyup="check_password()" placeholder="xxxxxxxxxx">
              <h6>Address</h6>
              <textarea name="address" placeholder="Enter YourAddress"></textarea>
              <button type="submit" class="btn waves-effect" id="btn_register_now"style="background:black; color:white; width:100%; margin-top:10px; box-shadow:none;">Register Now</button>
              <h6 style="font-size:14px; color:grey; font-weight:500;text-align:center; margin-top:10px;">I have already Account</h6>
              <a href="<?php echo base_url("home/user_signin");?>" class="btn waves-effect" style="background:#ff3d00; width:100%; margin-top:10px; box-shadow:none;">Sign In </a>
            </div>
          </div>
        </div>
        <div class="col l4 m4 s12">
          <!--card section -->

        </div>
        <!--card section and -->
      </div>
    </div> <?php $this->load->view("home/footer");?>
     <?php $this->load->view("home/js-file.php");?>
     <!--custom js -->
<script>
  //check password script
function check_password()
{
  var password = $('input[name="password"]');
  var Retype_password = $('input[name="Retype_password"]');
  if(password.val().length > 6){
    if(password.val() == Retype_password.val() || Retype_password.val() == password.val()){
      $('#btn_register_now').prop('disabled',false);

    }else {
      $('#btn_register_now').prop('disabled',true);

    }
  }else {
    $('#btn_register_now').prop('disabled',true);
  }
}
  //check password script


</script>






  </body>
</html>
