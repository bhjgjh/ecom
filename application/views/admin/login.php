<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Login-Apni Dukan</title>
    <?php $this->load->view("home/css-file");?>
     <style media="screen">
      body {
        background-color: #ff3d00;
      }

      #input_box {
        border: 1px solid silver;
        box-shadow: none;
        box-sizing: border-box;
        padding-left: 10px;
        padding-right: 10px;
        height: 40px;
        border-radius: 3px;
      }
    </style>
  </head>
  <body style="margin-right:15px;">
    <!--body section-->
    <div class="row" style="margin-top:15px;">
      <div class="col l4 m4 s12"></div>
      <div class="col l4 m4 s12">
        <div class="card">
          <div class="card-content">
            <h4 class="center-align" style="margin-bottom:0px;">
              <span class="fa fa-users"></span>
            </h4>
            <h5 class="center-align" style="margin-top:0px;">Admin Login</h5>
            <h6 style="font-size:14px; font-weight:500px; color:grey;">Username</h6>
            <input type="text" name="username" id="input_box" placeholder="Username">
            <h6 style="font-size:14px; font-weight:500px; color:grey;">Password</h6>
            <input type="password" name="password" id="input_box" placeholder="xxxxxxxxxx">
            <button type="button" class="btn waves-effect waves-light" id="btn" style="background:black; text-transform:capitalize; width:40%; font-weight:500; margin-top:10px;height:40px;">Sig In&nbsp; <span class="fa fa-sign-in-alt"></span>
            </button>
            <h6 style="margin-top:20px;">Notes :</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </br>
          </div>
        </div>
      </div>
      <div class="col l4 m4 s12"></div>
    </div>
    <?php $this->load->view("home/js-file.php");?>
     <?php $this->load->view("admin/custom_js");?>
  </body>
</html>
