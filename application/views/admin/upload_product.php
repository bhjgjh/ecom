<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload-Product-Apni Dukan</title>
    <?php $this->load->view("home/css-file");?>
     <style>
      body {
        background: #ffebe5;
      }

      #input_box {
        border: 1px solid silver;
        box-shadow: none;
        box-sizing: border-box;
        padding-left: 10px;
        padding-right: 10px;
        height: 40px;
        border-radius: 3px;
        display: block;
      }

      #input_file {
        border: 1px solid silver;
        padding: 8px;
        width: 40%;
        margin-bottom: 15px;
        font-size: 14px;
      }

      textarea {
        border: 1px solid silver;
        outline: none;
        resize: none;
        padding: 10px;
        border-radius: 3px;
        height: 90px;
        width: 40%;
      }

      select {
        display: block;
        border: 1px solid silver;
        outline: none;
        width: 40%;
        height: 40px;
        border-radius: 3px;
      }
    </style>
  </head>
  <body>
    <?php $this->load->view('admin/topbar');?>
    <!--upload product section-->
    <div class="container">
      <div class="card">
        <div class="card-content" style="border-bottom:1px solid silver; padding:10px;">
          <?= form_open_multipart('admin/save_product');?>
          <h6 style="font-size:14px; font-weight:500;">Upload New Product</h6>
        </div>
        <div class="card-content">
          <h6>product title</h6>
          <input type="text" name="product_title" id="input_box" placeholder="Enter product title" required>
          <h6 style="font-size:14px; font-weight:500;">Image</h6>
          <input type="file" name="product_image" id="input_file" required>
          <h6>category</h6>
          <select name="category_id">
            <option value="" selected>Select Category</option>
            <?php if(count($categories)):
              foreach($categories as $cate):?>
              <option value="<?= $cate->id;?>"> <?= $cate->category_name;?> </option>
             <?php endforeach;
                  else:?>
              <option value="">Category Not Found</option>
            <?php endif;?>
          </select>
          <h6>Short description</h6>
          <textarea name="short_desc" placeholder="Product Description"></textarea>
          <h6>Color</h6>
          <input type="text" name="color" id="input_box" placeholder="Enter Product Color" style="width:40%;">
          <h6>Weight</h6>
          <input type="text" name="Weight" id="input_box" placeholder="Enter Product Weightr" style="width:40%;">
          <h6>Price</h6>
          <input type="number" name="price" id="input_box" placeholder="Rs. 150" style="width:40%;" required>
          <button type="submit" class="btn waves-effect waves-light" style="background:black; color:white; box-shadow:none; height:40px; margin-top:15px;">Save product</button>
          <button type="reset" class="btn waves-effect waves-light" style="background:red; color:white; box-shadow:none; height:40px;  margin-top:15px;">Reset </button>
        </div>
      </div>
    </div>
    <!--upload product section-->
     <?php $this->load->view("home/js-file.php");?>
      <?php $this->load->view("admin/custom_js");?>
  </body>
</html>
