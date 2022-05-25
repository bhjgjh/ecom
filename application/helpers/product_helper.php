<?php
 function get_category_products($id)
   {
  $CI = & get_instance();
  $fetch_data = $CI->db->select('my_categories.category_name, products_table.*')
    ->from('products_table')
    ->where('category_id',$id)
    ->join('my_categories','products_table.category_id = my_categories.id')
    ->limit(6)
    ->order_by('id','desc')
    ->get();
    if($fetch_data->num_rows() > 0){
      return $fetch_data->result();
    }else {
        return $fetch_data->result();
    }
}
function get_category_details($id)
{
  $CI =& get_instance();
  $fetch_data = $CI->db->get_where('my_categories',['id'=>$id]);
  if($fetch_data->num_rows() > 0){
    return $fetch_data->result();
  }else {
      return $fetch_data->result();
  }
}
function get_product_details($id)
{
  $CI =& get_instance();
  $fetch_data = $CI->db->get_where('products_table',['id'=>$id]);
  if($fetch_data->num_rows() > 0){
    return $fetch_data->result();
  }else {
      return $fetch_data->result();
  }
}
function get_order_products($tabLename,$order_id)
{
  $CI =& get_instance();
  $fetch_data = $CI->db->get_where($tabLename,['order_id'=>$order_id]);
  if($fetch_data->num_rows() > 0){
    return $fetch_data->result();
  }else {
      return $fetch_data->result();
  }
}
function get_all_customers($order_date)
{
        $CI =& get_instance();
        $fetch_data = $CI->db->get_where('order_table',['order_date'=>$order_date]);
        if($fetch_data->num_rows() > 0){
          return $fetch_data->result();
        }else {
            return $fetch_data->result();
        }
}
 ?>
