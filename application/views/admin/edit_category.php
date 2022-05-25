<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Category-Apni Dukan</title>
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
      }

      #input_file {
        border: 1px solid silver;
        padding: 8px;
        width: 100%;
        margin-bottom: 15px;
        font-size: 14px;
      }

      #category_image {
        width: 70px;
        height: 70px;
        border-radius: 100%;
        border: 1px solid silver;
      }
    </style>
  </head>
  <body>
    <!--body section-->
    <?php $this->load->view('admin/topbar');?>
    <div class="row">
      <div class="col l5 m5 s12">
       <?= form_open_multipart('admin/update_category/'.$category[0]->id);?>
        <div class="card" style="margin-top:70px; margin-left:10px;">
          <div class="card-content" style="border-bottom:1px solid silver; padding:10px;">
            <h6 style="font-size:14px; font-weight:500;">Edit Category</h6>
          </div>
          <div class="card-content">
            <h6 style="font-size:14px; font-weight:500;">Category Name</h6>
            <input type="text" name="category_name" id="input_box" value="<?= $category[0]->category_name;?>"placeholder="Enter Category Name">
            <h6 style="font-size:14px; font-weight:500;">Image</h6>
            <img src="<?=base_url().'upload/category_image/'.$category[0]->image;?>" alt="" style="width:200px; height:200px; border:2px dashed silver;">
            <input type="file" name="image" id="input_file" placeholder="Enter Category Name">
            <small style="color:red;">Max. Image Size : 2MB | 100px X 100px</small>
            <button type="submit" class="btn waves-effect waves-light" style="background:black; color:white; display:block; text-transform: capitalize;
            font-weight:500; margin-top:10px;"> Update Category</button>
          </div>
        </div>
      </div>
     <div class="col l7 m7 s12">
        <div class="card" style="margin-top:70px;">
          <div class="card-content" style="border-bottom:1px solid silver; padding:10px;">
            <h6 style="font-size:14px; font-weight:500;">Recent Upload Category (<span class="red-text">Last 7 Days)</span></h6>
          </div>
          <div class="card-content" style="padding:0px;">
            <table>
              <tr>
                <th class="center-align">Image</th>
                <th>Category Name</th>
                <th>Action</th>
              </tr>
              <?php if(count($categories)):
                foreach($categories as $cate):?>
                <tr>
                <td>
                  <center>
                    <img src="<?= base_url().'upload/category_image/'.$cate->image;?>" class="responsive-img" id="category_image">
                  </center>
                </td>
                <td><?=$cate->category_name;?></td>
                <td>
                  <a href=" <?= base_url('admin/edit_category/'.$cate->id);?>"><span class="fa fa-edit"></span></a> - <a href="<?=base_url('admin/del_category/'.$cate->id);?>"
                    onclick="return confirm('Are You Sure Delete This Category.')">
                    <span class="fa fa-trash"></span>
                  </a>
                </td>
              </tr>
            <?php endforeach;
          else:?>
        <?php endif;?>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!--card section -->
    <?php $this->load->view("home/js-file.php");?>
    <?php $this->load->view("admin/custom_js");?>
  </body>
</html>
