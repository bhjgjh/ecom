<?php

Class Admin extends CI_Controller
   {
    public function __construct()
    {
    parent::__construct();
    $this->load->model('main','cm');
   }
  public function index()
    {
      if($this->session->userdata('admin_id')==""){
        $this->load->view("admin/login");
      }
      else {
         return redirect ("admin/dashboard");

      }
  //  $this->load->view("admin/login");
    }
   public function loggedin()
   {
   $args =[
     'username' => $this->input->post('username'),
     'password' => $this->input->post('password')
   ];
  // print_r($args);
   //die();
    $result =$this->cm->login_auth('ms_admin',$args);
     if(count($result)){
       $admin_session_data =[
       'admin_id' => $result[0]->id,
       'fullname' => $result[0]->fullname,
       'username' => $result[0]->username,
        ];
      $this->session->set_userdata($admin_session_data);
      $response = "1";
      echo $response;
      }
      else
       {
        $response = "0";
        echo $response;
   }

  }

       public function dashboard()
       {
       if($this->session->userdata('admin_id')==""){
         return redirect ("admin/index");
             }
           else
            {
              $order = [
                'column_name' => 'count_sales',
                'order'   =>  'desc'
              ];
              $data['top_sold_products'] = $this->cm->fetch_all_records_with_order('products_table',$order,'5');
              //order chart data
               $args= [
                 'order_date' => date('Y-m-d')
               ];
               $today_orders_data = $this->cm->fetch_records_by_args('order_table',$args);

               $args= [
                 'order_date' => date('Y-m-d',strtotime("-1 day"))
               ];
               $yesterday_orders_data = $this->cm->fetch_records_by_args('order_table',$args);

               $args= [
                 'order_date' => date('Y-m-d',strtotime("-2 day"))
               ];
               $last_3_day_order_data = $this->cm->fetch_records_by_args('order_table',$args);

               $args= [
                 'order_date' => date('Y-m-d',strtotime("-3 day"))
               ];
               $last_4_day_order_data = $this->cm->fetch_records_by_args('order_table',$args);

               $args= [
                 'order_date' => date('Y-m-d',strtotime("-4 day"))
               ];
               $last_5_day_order_data = $this->cm->fetch_records_by_args('order_table',$args);

               $args= [
                 'order_date' => date('Y-m-d',strtotime("-5 day"))
               ];
               $last_6_day_order_data = $this->cm->fetch_records_by_args('order_table',$args);

               $args= [
                 'order_date' => date('Y-m-d',strtotime("-6 day"))
               ];
               $last_7_day_order_data = $this->cm->fetch_records_by_args('order_table',$args);

               $data['chart_data'] = [
                 'ch_today_order' => count($today_orders_data),
                 'ch_yesterday_order' => count($yesterday_orders_data),
                  'ch_last_3_day_order' => count($last_3_day_order_data),
                  'ch_last_4_day_order' => count($last_4_day_order_data),
                    'ch_last_5_day_order' => count($last_5_day_order_data),
                      'ch_last_6_day_order' => count($last_6_day_order_data),
                        'ch_last_7_day_order' => count($last_7_day_order_data),
               ];
              //order chart data

         $this->load->view('admin/dashboard',$data);
        }

     }
     public function signout()
     {
       $this->session->unset_userdata('admin_id');
       $this->session->unset_userdata('admin_username');
       $this->session->unset_userdata('admin_fullname');
       return redirect("admin/index");

     }
     public function add_category()
     {
       if($this->session->userdata('admin_id')==""){
         return redirect ("admin/index");
       }else{
         $args =[
           'date>=' => date('Y-m-d',strtotime("-7 days"))
         ];
         $data['categories'] =$this->cm->fetch_records_by_args('my_categories', $args);
         $this->load->view('admin/add_category',$data);
       }
     }
     public function upload_category()
     {
       if($this->session->userdata('admin_id')==""){
         return redirect ("admin/index");
       }else {
         $config = [
           'upload_path' => './upload/category_image',
           'allowed_types'=> 'jpg|jpeg|png|gif'
         ];
         $this->load->library('upload', $config);
         $this->upload->do_upload('image');
         $img =$this->upload->data('file_name');
         $data=[
           'category_name' => $this->input->post('category_name'),
           'image' => $img,
           'date' => date('Y-m-d'),
            'status'=>'0'
         ];
         if($data['category_name']=="" &&$data['image']==""){
           $this->session->set_flashdata('error','Please Enter Required Information');
         }else {
           $result=$this->cm->insert_data('my_categories',$data);
           if($result==true){
             $this->session->set_flashdata('success','Congratulaton ! Category Insert Successfully');
           }else {
              $this->session->set_flashdata('error','Fail ! Category Insert');
           }
         }

         return redirect('admin/add_category');
       }
     }
     public function manage_category()
     {
       if($this->session->userdata('admin_id')==""){
         return redirect ("admin/index");
       }else{
         $data['categories']=$this->cm->fetch_all_records('my_categories','desc','limit');
         $this->load->view('admin/manage_category', $data);

       }

     }
     public function del_category($id="")
     {
       if($this->session->userdata('admin_id')=="")
       {
         return redirect ("admin/index");
       }
       else{
         if($id==""){

         }
         else {
           $args = [
             'id' => $id
           ];
           $result=$this->cm->delete_record_by_args('my_categories',$args);
           if($result==true){
             echo "<script>alert('Data delete Successfully')</script>";
             return redirect("admin/manage_category");

           }else {
                echo"<script>alert(' Data  Not delete Please try again')</script>";
                return redirect("admin/manage_category");
           }
         }

       }
     }
     public function edit_category($id="")
     {
        if($this->session->userdata('admin_id')=="")
        {
          return redirect ("admin/index");
        }
        else {
          if($id==""){

          }else {
            $args =[
              'id'  => $id
            ];
            $data['category'] = $this->cm->fetch_records_by_args('my_categories',$args);
            $args =[
              'date>=' => date('Y-m-d',strtotime("-7 days"))
            ];
            $data['categories'] =$this->cm->fetch_records_by_args('my_categories', $args);
            $this->load->view('admin/edit_category',$data);
          }
        }
     }
     public function update_category($id)
     {
       if($this->session->userdata('admin_id')==""){
         return redirect ("admin/index");
       }else {
         $config = [
           'upload_path' => './upload/category_image',
           'allowed_types'=> 'jpg|jpeg|png|gif'
         ];
         $this->load->library('upload', $config);
         if($_FILES['image']['name']==""){

         }else {
           $args =[
             'id' => $id
           ];
           $old_data = $this->cm->fetch_records_by_args('my_categories',$args);
           //dele old file
            unlink('upload/category_image/'.$old_data[0]->image);
           //delete old image

           $this->upload->do_upload('image');
           $img =$this->upload->data('file_name');
           $data['image'] = $img;
         }

         $data['category_name'] = $this->input->post('category_name');
          if($data['category_name']==""){
           $this->session->set_flashdata('error','Please Category Name');
           }else
            {
                $args=[
                          'id'  => $id
                      ];

            $result =$this->cm->update_record_by_args('my_categories',$data,$args);
           if($result==true){
             $this->session->set_flashdata('success','Congratulaton ! Category Update Successfully');
           }else {
              $this->session->set_flashdata('error','Fail ! Category Not Updated');
           }
         }

         return redirect('admin/edit_category/'.$id);
       }
     }
     public function search_category()
     {
       if($this->session->userdata('admin_id')==""){
         return redirect ("admin/index");
       }
       else {
         $args =[
           'category_name' => $this->input->post('category_name')
         ];
         $data['categories'] =$this->cm->fetch_records_by_args_with_like('my_categories',$args);
         $this->load->view('admin/manage_category',$data);
       }
     }

     public function filter_category($filter){
       if($this->session->userdata('admin_id')==""){
         return redirect ("admin/index");
       }else {
         if($filter == "new_category"){
           $order =[
             'column_name'  => 'id',
             'order'        =>  'desc'
           ];
         }
         else if($filter == "old_category"){
           $order =[
             'column_name'  => 'id',
             'order'        =>  'asc'
           ];
         }
         else if($filter == "highest_products"){
           $order =[
             'column_name'  => 'count_products',
             'order'        =>  'desc'
           ];
         }
         else if($filter == "lowest_Products"){
           $order =[
             'column_name'  => 'count_products',
             'order'        =>  'asc'
           ];
         }
         else {
           $order =[
             'column_name'  => 'id',
             'order'        =>  'desc'
           ];
         }
         $data['categories'] = $this->cm->fetch_records_by_order('my_categories',$order);
         $this->load->view('admin/manage_category',$data);
       }
     }
     public function add_product()
     {
       if($this->session->userdata('admin_id')==""){
         return redirect ("admin/index");
       }else {
         $data['categories']=$this->cm->fetch_all_records('my_categories','desc','limit');
         $this->load->view('admin/upload_product',$data);
       }
     }
     public function save_product()
     {
       if($this->session->userdata('admin_id')==""){
         return redirect ("admin/index");
       }else {
         $config = [
           'upload_path' => './upload/product_image',
           'allowed_types'=> 'jpg|jpeg|png|gif'
         ];
         $this->load->library('upload', $config);
         $this->upload->do_upload('product_image');
         $img = $this->upload->data('file_name');

         $data =[
           'product_title' => $this->input->post('product_title'),
           'image' =>$img,
           'category_id' => $this->input->post('category_id'),
           'short_description'  => $this->input->post('short_desc'),
           'color'            => $this->input->post('color'),
           'weight'           => $this->input->post('Weight'),
           'price'            =>  $this->input->post('price'),
           'status'           => '0',
           'upload_date'      => date('Y-m-d')
         ];
         if($data['product_title'] =="" && $data['image'] =="" && $data['price'] ==""){
           $this->session->set_userdata('error','Please Enter Required Information');
         }else {
            //$this->session->set_userdata('error','Please Enter Required Information'),
            $result = $this->cm->insert_data('products_table',$data);
            if($result == true){
              echo "insert";
              return redirect('admin/add_product');
            }else {
              echo "not";
              return redirect('admin/add_product');

            }
         }

       }
     }
     public function change_category_status($id,$status)
     {

         if($this->session->userdata('admin_id')==""){
           return redirect ("admin/index");
         }else {
           $args = [
             'id'  =>$id
           ];
           $data = [
             'status'  => $status
           ];
           $result = $this->cm->update_record_by_args('my_categories',$data,$args);
           if( $result==true){
            return redirect('admin/manage_category');
          }else{
            echo "not";
            return redirect('admin/manage_category');

          }
          }
        }
         public function manage_products()
         {
         if($this->session->userdata('admin_id')==""){
           $this->load->view("admin/index");
         }
         else {
           //creat pagination
           $config['base_url'] = base_url('admin/manage_products');
           $config['per_page'] = 10;
           $config['total_rows'] = $this->db->count_all('products_table');
           $this->load->library('pagination',$config);

             $order = [
               'column_name'  => 'id',
               'order'       =>   'desc'
             ];
           $data['products']=$this->cm->fetch_all_records_with_pagination('products_table',$order,$config['per_page'],$this->uri->segment(3));
           $this->load->view('admin/manage_products',$data);
         }

       }
       public function del_product($id)
       {
         if($this->session->userdata('admin_id')==""){
           $this->load->view("admin/index");
         }
         else {
             $args =[
              'id'   => $id
             ];
             $product = $this->cm->fetch_records_by_args('products_table',$args);
             //delete image in folder
             unlink('upload/product_image/'.$product[0]->image);
             $result = $this->cm->delete_record_by_args('products_table',$args);
             if($result == true){
               echo "delete";
               return redirect('admin/manage_products');
             }else {
               echo "not delete";
               return redirect('admin/manage_products');
             }
         }
       }
      public function change_product_status($id,$status)
      {
        if($this->session->userdata('admin_id')==""){
          $this->load->view("admin/index");
        }else {
          $args =[
            'id' => $id
          ];
          $data = [
            'status' => $status
          ];
          $result = $this->cm->update_record_by_args('products_table',$data,$args);
          if($result == true){
            echo "ok";
             redirect('admin/manage_products');

          }else {
               echo "ok";
                redirect('admin/manage_products');
          }
        }
      }
      public function filter_product($filter)
      {
        if($this->session->userdata('admin_id')==""){
          $this->load->view("admin/index");
        }else {

          if($filter == "new_product"){
            $order =[
              'column_name'  => 'id',
              'order'        =>  'desc'
            ];
          }
          else if($filter == "old_product"){
            $order =[
              'column_name'  => 'id',
              'order'        =>  'asc'
            ];
          }
          else if($filter == "highest_price"){
            $order =[
              'column_name'  => 'price',
              'order'        =>  'desc'
            ];
          }
          else if($filter == "lowest_price"){
            $order =[
              'column_name'  => 'price',
              'order'        =>  'asc'
            ];
          }
          else {
            $order =[
              'column_name'  => 'id',
              'order'        =>  'desc'
            ];
        }
        $config['base_url'] = base_url('admin/filter_product/'.$filter);
        $config['per_page'] = 10;
        $config['total_rows'] = $this->db->count_all('products_table');
        $this->load->library('pagination',$config);
        //creat pagination
        $data['products']=$this->cm->fetch_all_records_with_pagination('products_table',$order,$config['per_page'],$this->uri->segment(4));
        $this->load->view('admin/manage_products',$data);
  }
}
    public function search_product()
    {
      if($this->session->userdata('admin_id')==""){
        $this->load->view("admin/index");
      }
      else {
        $args = [
          'product_title'  => $this->input->post('product_name')
        ];
        $order = [
             'column_name'  => 'id',
             'order'        =>  'desc'
        ];
        $config['base_url'] = base_url('admin/search_product/');
        $config['per_page'] = 10;
        $config['total_rows'] = count($this->cm->fetch_records_by_args_with_like('products_table',$args));
        $this->load->library('pagination',$config);

        $data['products']=$this->cm->fetch_records_by_like_with_pagination('products_table',$args,$order,$config['per_page'],$this->uri->segment(3));
        $this->load->view('admin/manage_products',$data);

      }
    }

   public function edit_product($id = 0)
   {
     if($this->session->userdata('admin_id')==""){
       $this->load->view("admin/index");
     }
     else {
       $args = [
             'id'   => $id
       ];
       $data['product']=$this->cm->fetch_records_by_args('products_table',$args);
       $data['categories']=$this->cm->fetch_all_records('my_categories','desc','limit');
       $this->load->view('admin/edit_product',$data);
     }
   }
   public function update_product($id)
   {
     if($this->session->userdata('admin_id')==""){
       return redirect ("admin/index");
     }else {
       $config = [
         'upload_path' => './upload/product_image',
         'allowed_types'=> 'jpg|jpeg|png|gif'
       ];
       $this->load->library('upload', $config);
       if($_FILES['product_image']['name']==""){

       }else {
         $args =[
           'id' => $id
         ];
         $old_data = $this->cm->fetch_records_by_args('products_table',$args);
         //dele old file
          unlink('upload/product_image/'.$old_data[0]->image);
         //delete old image

         $this->upload->do_upload('product_image');
         $img =$this->upload->data('file_name');
         $data['image'] = $img;
       }

       $data['product_title'] = $this->input->post('product_title');
       $data['category_id	'] = $this->input->post('category_id');
        $data['short_description'] = $this->input->post('short_desc');
        $data['color'] = $this->input->post('color');
        $data['weight'] = $this->input->post('Weight');
        $data['price'] = $this->input->post('price');

        if($data['product_title'] == "" && $data['category_id']=="" && $data['price']==""){
          echo "please enter required detail";
        }
        else
          {
              $args=[
                        'id'  => $id
                    ];

          $result =$this->cm->update_record_by_args('products_table',$data,$args);
         if($result==true){
           $this->session->set_flashdata('success','Congratulaton ! product Update Successfully');
         }else {
            $this->session->set_flashdata('error','Fail ! product Not Updated');
         }
       }

       return redirect('admin/edit_product/'.$id);
     }
   }
  public function manage_orders()
  {
    if($this->session->userdata('admin_id')==""){
      $this->load->view("admin/index");
    }else {
      //creat pagination
      $config['base_url'] = base_url('admin/manage_orders');
      $config['per_page'] = 10;
      $config['total_rows'] = $this->db->count_all('order_table');
      $this->load->library('pagination',$config);

        $order = [
          'column_name'  => 'id',
          'order'       =>   'desc'
        ];
      $data['Orders']=$this->cm->fetch_all_records_with_pagination('order_table',$order,$config['per_page'],$this->uri->segment(3));
      $this->load->view('admin/manage_orders',$data);
    }
  }


  public function pandding_orders()
  {
    if($this->session->userdata('admin_id')==""){
      $this->load->view("admin/index");
    }else
      $args =[
        'order_status!='  => 'Delivered'
      ];

     {
      //creat pagination
      $config['base_url'] = base_url('admin/pandding_orders');
      $config['per_page'] = 10;
      $config['total_rows'] = count($this->cm->fetch_records_by_args('order_table',$args));
      $this->load->library('pagination',$config);

        $order = [
          'column_name'  => 'id',
          'order'       =>   'desc'
        ];
      $data['Orders']=$this->cm->fetch_all_records_by_args_with_pagination('order_table',$args,$order,$config['per_page'],$this->uri->segment(3));
      $this->load->view('admin/manage_orders',$data);
    }
  }

  public function delivered_orders()
  {
    if($this->session->userdata('admin_id')==""){
      $this->load->view("admin/index");
    }else
      $args =[
        'order_status'  => 'Delivered'
      ];

     {
      //creat pagination
      $config['base_url'] = base_url('admin/delivered_orders');
      $config['per_page'] = 10;
      $config['total_rows'] = count($this->cm->fetch_records_by_args('order_table',$args));
      $this->load->library('pagination',$config);

        $order = [
          'column_name'  => 'id',
          'order'       =>   'desc'
        ];
      $data['Orders']=$this->cm->fetch_all_records_by_args_with_pagination('order_table',$args,$order,$config['per_page'],$this->uri->segment(3));
      $this->load->view('admin/manage_orders',$data);
    }
  }



  public function search_orders()
  {
    if($this->session->userdata('admin_id')==""){
      return redirect ("admin/index");
    }else {
      $args = [
        'id'  => $this->input->post('order_id')
      ];
      $order = [
           'column_name'  => 'id',
           'order'        =>  'desc'
      ];
      $config['base_url'] = base_url('admin/search_product/');
      $config['per_page'] = 10;
      $config['total_rows'] = count($this->cm->fetch_records_by_args_with_like('products_table',$args));
      $this->load->library('pagination',$config);

      $data['Orders']=$this->cm->fetch_records_by_like_with_pagination('order_table',$args,$order,$config['per_page'],$this->uri->segment(3));
      $this->load->view('admin/manage_orders',$data);
    }
  }


  public function order_delete($order_id =0)
  {
    if($this->session->userdata('admin_id')==""){
      return redirect ("admin/index");
    }else
     {
       $args =[
         'order_id' => $order_id
       ];
       $result =$this->cm->delete_record_by_args('order_products',$args);

      $args = [
        'id'  => $order_id
      ];
      $result =$this->cm->delete_record_by_args('order_table',$args);
      if($result == true){
        echo "delete";
        return redirect('admin/manage_orders');
      }else {
        echo "not delete";
        return redirect('admin/manage_orders');
      }
    }
  }
    public function view_order($order_id)
    {
      if($this->session->userdata('admin_id')==""){
        return redirect ("admin/index");
      }else {
        $args = [
          'id'  => $order_id
        ];
             $data['order_details']=$this->cm->fetch_records_by_args('order_table',$args);

             $args=[
               'order_id' => $order_id
             ];
             $data['product_list']=$this->cm->fetch_records_by_args('order_products',$args);
        $this->load->view('admin/order_details',$data);
      }
    }
    public function print_label($order_id)
    {
      if($this->session->userdata('admin_id')==""){
        return redirect ("admin/index");
      }else {
        $args = [
          'id'  => $order_id
        ];
             $data['order_details']=$this->cm->fetch_records_by_args('order_table',$args);

             $args=[
               'order_id' => $order_id
             ];
             $data['product_list']=$this->cm->fetch_records_by_args('order_products',$args);
        $this->load->view('admin/print_label',$data);
      }
    }
    public function change_order_status($order_id)
    {
      if($this->session->userdata('admin_id')==""){
        return redirect ("admin/index");
      }else {
        //cout sold products
        if($this->input->post('status')=="Delivered"){

      $args =  [
          'order_id' => $order_id
        ];
        $check_products=$this->cm->fetch_records_by_args('order_products',$args);
        $products_ids ="";
        if(count(  $check_products)){
          foreach($check_products as $check_pro){
                $products_ids = $check_pro->product_id;
            $this->db->insert('sold_products',['product_id'=>$check_pro->product_id]);
          }
        //fetch product
        $sold_products = $this->db->select('product_id,COUNT(product_id)')
            ->from('sold_products')
            ->where_in('product_id',$products_ids)
            ->group_by('product_id')
            ->get()->result_array();
            //echo "<pre>";
            //print_r($sold_products->result());
            //die();
            for($i=0; $i<count($sold_products); $i++){
              $result = $this->db->where('id',$sold_products[$i]['product_id'])->update('products_table',[
                'count_sales'=>$sold_products[$i]
                ['COUNT(product_id)'
            ]
            ]);
            }
        }

      }else {
        // code...
      }
        $args = [
          'id'  => $order_id
        ];
        $data = [
          'order_status' => $this->input->post('status')
        ];

        $result = $this->cm->update_record_by_args('order_table',$data,$args);

        if($result == true){
          echo "update";
        }else {
          echo "not update";
          return redirect('admin/view_order/'.$order_id);
        }
      }
    }
    public function all_sales()
    {
      if($this->session->userdata('admin_id')==""){
        return redirect ("admin/index");
      }else {
       $args =[
          'order_status' =>'Delivered'
        ];
        $data['sales'] = $this->cm->fetch_all_sales($args);
        $this->load->view('admin/sales',$data);
      }
    }

    public function search_sales()
    {
      if($this->session->userdata('admin_id')==""){
        return redirect ("admin/index");
      }else {
       $args =[
          'order_status' =>'Delivered',
          'order_date>=' => $this->input->post('start_date'),
          'order_date<=' => $this->input->post('last_date')
        ];
        $data['sales'] = $this->cm->fetch_all_sales($args);
        $this->load->view('admin/sales',$data);
      }
    }
    public function today_sales()
    {
      if($this->session->userdata('admin_id')==""){
        return redirect ("admin/index");
      }else {
       $args =[
          'order_status' =>'Delivered',
          'order_date' => date('Y-m-d')
        ];
        $data['sales'] = $this->cm->fetch_all_sales($args);
        $this->load->view('admin/sales',$data);
      }
    }
    public function count_orders($type)
    {
      if($this->session->userdata('admin_id')==""){
        return redirect ("admin/index");
      }else {
      if($type=="all"){
        $orders = $this->cm->fetch_all_records('order_table','desc','limit');
      }else if($type== "today") {
        $args = [
          'order_date'  => date('Y-m-d')
        ];
        $orders = $this->cm->fetch_records_by_args('order_table',$args);

      }
      else if($type == "yesterday") {
        $args = [
          'order_date'  => date('Y-m-d',strtotime("-1 day"))
        ];
        $orders = $this->cm->fetch_records_by_args('order_table',$args);

      }
      else if($type == "last_30_days") {
        $args = [
          'order_date>='  => date('Y-m-d',strtotime("-30 days")),
          'order_date<=' => date('Y-m-d')
        ];
        $orders = $this->cm->fetch_records_by_args('order_table',$args);

      }

      else {
        $orders = $this->cm->fetch_all_records('order_table','desc','limit');

      }
      echo count($orders);
      }
    }

}

    ?>
