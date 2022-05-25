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
    <div class="container" style="width:900px; margin-left:30%;">
      <div class="row" style="margin-bottom:0px;margin-top:10px;">
        <div class="col l4 m4 s12">
          <div class="card">
            <div class="card-content">
              <?php echo form_open('home/user_logged_in/'.$page);?>

              <center>
                <h5>
                  <span class="fa fa-users"></span>
                </h5>
                <h6>Signin Account</h6>
              </center>
              <h6>Username/Email</h6>
              <input type="email" name="email" id="inpu_box" placeholder="email">
              <h6>Password</h6>
              <input type="password" name="password" id="inpu_box" placeholder="xxxxxxxxxx">
              <button type="submit" class="btn waves-effect" style="background:black; color:white; width:100%; margin-top:10px; box-shadow:none;">Login Now</button>
              <h6 style="font-size:14px; color:grey; font-weight:500;text-align:center; margin-top:10px;">dont have Account</h6>
              <a href="<?php echo base_url("home/user_signup");?>" class="btn waves-effect" style="background:#ff3d00; width:100%; margin-top:10px; box-shadow:none;">Creat Account </a>

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
  </body>
</html>
