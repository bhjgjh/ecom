<?php

Class Home extends CI_Controller
{
  private $user_profile;
  public function __construct()
  {
    parent::__construct();
    $this->load->model('main','cm');
    //get user detail
    $args = [
      'email'  => $this->session->userdata('email'),
      'password'  => $this->session->userdata('password')
    ];
    $this->user_profile = $this->cm->fetch_records_by_args('users_table',$args);
  }
  public function index()
  {
    $args =[
      'status' => '0'
    ];
     $data['categories']=$this->cm->fetch_records_by_args('my_categories',$args);
    $this->load->view("home/index",$data);
  }
  public function user_signup($page = "")
  {

    $this->load->view('home/user_signup',['page'=>$page]);
  }
  public function user_registerd($page = "")
  {
    $data = [
      'fullname' =>  $this->input->post('full_name'),
      'email' =>      $this->input->post('email'),
      'mobile_no' =>   $this->input->post('mobile'),
      'password' =>     $this->input->post('password'),
      'address' =>       $this->input->post('address'),
      'register_date' =>  date('Y-m-d')
    ];
    if($data['fullname'] == "" && $data['email'] == "" && $password == "" ){
      echo "Please Enter Required Information";
        //return redirect('home/user_signup');
    }else {
      $result = $this->cm->insert_data('users_table',$data);
      if($result == true){
        $user_session = [
        'email'   => $data['email'],
        'password'=> $data['password']
        ];
        $this->session->set_userdata($user_session);
        if($page == 'cart'){
          return redirect('home/carts');
        }else {
          return redirect('home/dashboard');

        }
      }else {
        echo "User Register Fail";
        return redirect('home/user_signup/'.$page);
      }
    }

  }
  public function user_signin($page = "")
  {
    $this->load->view('home/user_signin',['page'=>$page]);
  }
  public function user_logged_in($page = "")
  {
    $args = [
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password')
    ];
    //print_r($args);
  //  die();
    $result = $this->cm->fetch_records_by_args('users_table',$args);
    if($result == true){
      $user_session = [
      'email'   => $args['email'],
      'password'=> $args['password']
      ];
      $this->session->set_userdata($user_session);
      if($page =="cart")
      {
        return redirect('home/carts');

      }else {
        return redirect('home/dashboard');

      }
    }else {
      echo "Your Username & Password Not match";
      return redirect('home/user_signin/'.$page);
    }
  }
  public function carts()
  {
    $args = [
      'session_id' => $this->session->userdata('session_id')
    ];
    $data['products'] = $this->cm->fetch_records_by_args('cart_table',$args);
    $this->load->view('home/my_cart',$data);
  }
  public function remove_product($product_id = 0)
  {
    $args = [
      'product_id'    => $product_id,
      'session_id'    => $this->session->userdata('session_id')
    ];
    $result = $this->cm->delete_record_by_args('cart_table',$args);
    if($result == true){
      echo "ok";
        return redirect('home/carts');
    }else {
      echo "ok";
      return redirect('home/carts');
    }
  }
  public function update_quantity($quantity,$type,$product_id)
  {
    if($type=="add"){
      $new_qty = $quantity + 1;
      $args = [
        'product_id' =>  $product_id
      ];
      $data = [
        'quantity' => $new_qty
      ];
      $result = $this->cm->update_record_by_args('cart_table',$data,$args);

    }else {
      $new_qty = $quantity - 1;
      $args = [
        'product_id' =>  $product_id
      ];
      $data = [
        'quantity' => $new_qty
      ];
      $result = $this->cm->update_record_by_args('cart_table',$data,$args);
    }
    if($result == true){
      echo "1";
    }else {
      echo "0";
    }
  }

  public function calculate_cart_products()
  {
    $args = [
      'session_id'  => $this->session->userdata('session_id')
    ];
    $products=$this->cm->fetch_records_by_args('cart_table',$args);
    $cal_amount = 0;
    if(count($products)){
      foreach($products as $product){
          $cal_amount += ($product->rate * $product->quantity);
      }
    }else {
     $cal_amount= 0;
    }
    $data = [
      'total_products'  => count($products),
      'total_amount'    => ($cal_amount > 0) ?  number_format($cal_amount) : '0'
    ];
    echo json_encode($data);
  }

  public function category_products($id ="")
  {
    $args = [
      'category_id'  => $id
    ];
    $data['produc'] = $this->cm->fetch_records_by_args('products_table',$args);
   $args = [
     'id'  => $id
    ];
    $data['category_detail'] = $this->cm->fetch_records_by_args('my_categories',$args);
    $this->load->view('home/view_category',$data);
  }
  public function product_filter($id,$order)
  {
    if($order == "default"){
      $order_format = [
        'column_name'  => 'id',
        'order'        =>  'desc'
      ];
   }else if($order == "best_metch"){
     $order_format = [
       'column_name'  => 'count_sales',
       'order'        =>  'desc'
     ];
   }else if($order == "lowest_price"){
     $order_format = [
       'column_name'  => 'price',
       'order'        =>  'asc'
     ];
   }else if($order == "highest_price"){
     $order_format = [
       'column_name'  => 'price',
       'order'        =>  'desc'
     ];
   }else {
     $order_format = [
       'column_name'  => 'id',
       'order'        =>  'desc'
     ];
   }
   $args = [
     'category_id' => $id
   ];
   $data['produc'] = $this->cm->fetch_records_by_args_with_order('products_table',$args,$order_format);
   $args = [
     'id'  => $id
   ];
   $data['category_detail'] = $this->cm->fetch_records_by_args('my_categories',$args);
   $this->load->view('home/view_category',$data);

  }
  public function product_detail($id ="")
  {
    $args =[
      'id' => $id
    ];
    $data['product']=$this->cm->fetch_records_by_args('products_table',$args);
    $args = [
      'id!=' =>  $id,
      'category_id'  => $data['product'][0]->category_id
    ];
    $data['related_products']=$this->cm->fetch_records_by_args_with_limit('products_table',$args,'6');
    $this->load->view('home/view_product',$data);
  }
  public function dashboard()
  {
    if($this->session->userdata('email') =="" && $this->session->userdata('password') == ""){
      return redirect('home/user_signin');
    }else {
      $user = $this->user_profile;
      $args = [
        'user_id' => $user[0]->id
      ];
      $data['orders'] = $this->cm->fetch_records_by_args('order_table',$args);
      $args =[
            'session_id'  => $this->session->userdata('session_id')
      ];
      $data['cart_products'] = $this->cm->fetch_records_by_args('cart_table',$args);

      $args = [
        'user_id' => $user[0]->id,
        'order_status' => 'Delivered'
      ];
      $data['delivered_orders'] = $this->cm->fetch_records_by_args('order_table',$args);
    }
    $this->load->view('home/dashboard',$data);
  }
  public function my_order()
  {
    $this->load->view("home/my_order");
  }
  public function my_orders()
  {
    $user = $this->user_profile;
    $args =[
      'user_id' => $user[0]->id
    ];
    $data['orders']=$this->cm->fetch_records_by_args('order_table',$args);
    $this->load->view('home/my_orders',$data);
  }

public function get_product_details($product_id = 0)
{
  $args = [
    'id'  => $product_id
  ];
  $data['product'] = $this->cm->fetch_records_by_args('products_table',$args);
  $this->load->view('home/view_product_details_modal',$data);
}
public function add_to_cart($product_id)
{
  if($this->session->userdata('session_id') == ""){
    $user_session_id = [
      'session_id' =>  rand(9999,999999)
    ];
     $this->session->set_userdata($user_session_id);
  }else {
  //  $session_id = $this->session->userdata('session_id');
  }
  $args = [
    'id'  => $product_id
  ];
  $product_details = $this->cm->fetch_records_by_args('products_table',$args);
  $args = [
    'product_id' => $product_id,
    'session_id' => $this->session->userdata('session_id')
  ];
  $check_product = $this->cm->fetch_records_by_args('cart_table',$args);
  if(count($check_product)){
    $old_qty = $check_product[0]->quantity;
    $new_qty = $old_qty + 1;
    $args = [
      'id'  => $check_product[0]->id
    ];
    $data = [
      'quantity'  => $new_qty
    ];
    $result = $this->cm->update_record_by_args('cart_table',$data,$args);
    if($result == true){
      echo "1";
    }else {
          echo "0";
    }

  }else {
    $data = [
      'product_id' => $product_details[0]->id,
      'session_id' => $this->session->userdata('session_id'),
      'product_name' => $product_details[0]->product_title,
      'quantity' =>   '1',
      'rate' =>    $product_details[0]->price
    ];
    $result = $this->cm->insert_data('cart_table',$data);
    if($result==true){
      echo "1";
    }else {
      echo "0";

    }
  }

}
public function place_order()
{
  $args = [
    'session_id'  => $this->session->userdata('session_id')
  ];
  $data['products'] = $this->cm->fetch_records_by_args('cart_table',$args);
  $this->load->view('home/place_order',$data);
}
public function complete_purchase()
{
  if($this->session->userdata('email') =="" && $this->session->userdata('password') == ""){
    return redirect('home/user_signin');
  }else {
    $args = [
      'session_id'  => $this->session->userdata('session_id')
    ];
    $products = $this->cm->fetch_records_by_args('cart_table',$args);
    $user = $this->user_profile;
    //get shipping Address
  $args = [
    'user_id'  => $user[0]->id
  ];
  $temp_address = $this->cm->fetch_records_by_args('ms_temp_address',$args);
    //get shipping Address
    $total_quantity = 0;
    $total_amount = 0;
    if(count($products)){
      foreach($products as $pro){
        $total_quantity += $pro->quantity;
        $total_amount += ($pro->quantity * $pro->rate);

      }
    }
    else {
      $total_quantity = 0;
    }
   $data = [
     'user_id'  => $user[0]->id,
     'user_name'  =>$user[0]->fullname,
     'total_quantity'  => $total_quantity,
     'total_amount'  => $total_amount,
     'order_date'  =>   date('Y-m-d'),
     'shipping_address'  =>$temp_address[0]->address,
     'order_status'  => 'pending'






   ];
   $order_id = $this->cm->insert_data_with_last_id('order_table',$data);
   //insert order products

   if(count($products)){
     foreach($products as $pro){
      $result = $this->db->insert('order_products',[
        'order_id' =>  $order_id,
        'product_id' =>  $pro->product_id,
        'product_name' => $pro->product_name,
        'quantity'    => $pro->quantity,
        'rate'   => $pro->rate

      ]);

     }
   }
   else {
    // $total_quantity = 0;
   }
   //insert order products
$args = [
  'session_id' =>$this->session->userdata('session_id')
];
$result = $this->cm->delete_record_by_args('cart_table',$args);
$args = [
  'user_id' => $user[0]->id
];
$result = $this->cm->delete_record_by_args('ms_temp_address',$args);
if($result == true){
  echo "done";
}else {
  echo "not";
}
return redirect('home/dashboard');
  }
}
public function save_temp_address($user_id = 0)
{
  if($this->session->userdata('email') =="" && $this->session->userdata('password') == ""){
    return redirect('home/user_signin');
  }else {
    $data = [
      'user_id'  => $user_id,
      'address'  => $this->input->post('shipping_address')
    ];
    if($data['user_id'] =="" && $fata['address'] ==""){
      return redirect('home/place_order');
    }else {
      $result = $this->cm->insert_data('ms_temp_address',$data);
      if($result ==true){
        return redirect('home/place_order');
      }else {
            return redirect('home/place_order');
      }
    }
  }
}
public function logout()
{
  $this->session->unset_userdata('email');
  $this->session->unset_userdata('password');
//  $this->session->unset_userdata('admin_fullname');
  return redirect("home/user_signin");

}
public function search_products($val)
{

  $args =[
    'product_title' => $val
  ];

  $products = $this->cm->fetch_records_by_args_with_like('products_table',$args);
  $output = '';
  if(count($products)){
    $i = 0;
    foreach($products as $pro){
      $i++;
      //$output .= '<a href="'.base_url("home/product_detail/").$pro->id.'">'.$pro->product_title.'</a>';
      $output .= '<a href='.base_url().'home/product_detail/'.$pro->id.'>'.$pro->product_title.'</a>';
      if($i>9): break;
    endif;
    }
  }
  else {
    $output = ' <a href="#!">Product Not Found.</a>';
  }
  echo   $output;
}
public function contact()
      {

     $this->form_validation->set_rules('name','Name','required');
     $this->form_validation->set_rules('email','Email','required|valid_email');
     //$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
     if($this->form_validation->run()==true){
       // smtp code -- jisse localhost ke thorw email send kanra

        $this->load->library('email');
        $this->email->from(set_value('email'),set_value('name'));
        $this->email->to("ganeshmishra1997@gmail.com");
        $this->email->subject("You have recevied an enquery..");
       $this->email->message("Thank you for connecting with us, will get back to you shortly");
        $this->email->set_newline("\r\n");
       $this->email->send();

       if(!$this->email->send()){
      show_error($this->email->print_debugger());
          }
        else{
          $this->session->set_flashdata('message','Thanks for your enquery');
          redirect (base_url('home/contact'));
          }


     }else {
       $this->load->view('home/contact_us');
     }


     }
     public function profile()
     {
       $this->load->view('home/about');
     }

}



 ?>
