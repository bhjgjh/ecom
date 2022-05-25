<?php
Class Main extends CI_model{
  public function __construct()
  {
    parent::__construct();
  }
  public function login_auth($tabLename, $args)
  {
    $fetch_record =$this->db->get_where($tabLename ,$args);

    if($fetch_record->num_rows() > 0){
      return $fetch_record->result();
    }else {
      return $fetch_record->result();
    }
  }
  public function insert_data($tabLename,$data)
  {
    $insert_rec=$this->db->insert($tabLename,$data);
    if($this->db->affected_rows()>0){
      return true;
    }else {
      return false;
    }
  }
  public function fetch_records_by_args($tabLename,$args)
  {
    $this->db->order_by('id','desc');
    $fetch_record =$this->db->get_where($tabLename,$args);

    if($fetch_record->num_rows() > 0){
      return $fetch_record->result();
    }else {
      return $fetch_record->result();
    }
  }
  public function fetch_all_records($tabLename,$order,$limit)
  {
    if($limit == "limit")
    {

    }
    else {
      $this->db->limit($limit);
    }
    $fetch_record =$this->db->select()
        ->from($tabLename)
        ->order_by('id',$order)
        ->get();
        if($fetch_record->num_rows() > 0){
          return $fetch_record->result();
        }else {
          return $fetch_record->result();
        }
  }
  public function delete_record_by_args($tabLename,$args)
  {
    $dalate_rec =$this->db->delete($tabLename,$args);
    if($this->db->affected_rows()>0){
      return true;
    }else {
      return false;
    }
  }
  public function update_record_by_args($tabLename,$data,$args)
  {
    $update_rec = $this->db->where($args)
    ->update($tabLename,$data);
    if($this->db->affected_rows()>0){
      return true;
    }else {
      return false;
    }

  }
  public function fetch_records_by_args_with_like($tabLename,$args)
  {
    $fetch_rec=$this->db->select()
    ->from($tabLename)
    ->like($args)
    ->get();
    if($fetch_rec->num_rows() > 0){
      return $fetch_rec->result();
    }else {
      return $fetch_rec->result();
    }
  }
  public function fetch_records_by_order($tabLename,$order_formet)
  {
    extract($order_formet);
    $fetch_rec =$this->db->select()
    ->from($tabLename)
    ->order_by($order_formet['column_name'],$order_formet['order'])
    ->get();
    if($fetch_rec->num_rows() > 0){
      return $fetch_rec->result();
    }else {
      return $fetch_rec->result();
    }
  }
  public function fetch_records_by_args_with_order($tabLename, $args ,$order_format)
  {
    extract($order_format);
    $fetch_rec = $this->db->select()
        ->from($tabLename)
        ->where($args)
        ->order_by($order_format['column_name'],$order_format['order'])
         ->get();
     if($fetch_rec->num_rows() > 0){
       return $fetch_rec->result();
     }else {
       return $fetch_rec->result();
        }
  }
  public function fetch_records_by_args_with_limit($tabLename, $args,$limit)
  {
    $this->db->limit($limit);
      $fetch_rec = $this->db->get_where($tabLename,$args);
      if($fetch_rec->num_rows() > 0){
        return $fetch_rec->result();
      }else {
        return $fetch_rec->result();
         }
  }
  public function fetch_all_records_with_pagination($tabLename,$order_format,$limit,$offset)
  {
    extract($order_format);
    $fetch_record =$this->db->select()
        ->from($tabLename)
        ->order_by($order_format['column_name'],$order_format['order'])
        ->limit($limit,$offset)
        ->get();
        if($fetch_record->num_rows() > 0){
          return $fetch_record->result();
        }else {
          return $fetch_record->result();
        }
  }

  public function fetch_records_by_like_with_pagination($tabLename,$args,$order_format,$limit,$offset)
  {
    extract($order_format);
    $fetch_record =$this->db->select()
        ->from($tabLename)
        ->like($args)
        ->order_by($order_format['column_name'],$order_format['order'])
        ->limit($limit,$offset)
        ->get();
        if($fetch_record->num_rows() > 0){
          return $fetch_record->result();
        }else {
          return $fetch_record->result();
        }
  }
  public function insert_data_with_last_id($tabLename, $data)
  {
    $insert_rec = $this->db->insert($tabLename, $data);
    if($this->db->affected_rows() > 0){
      return $this->db->insert_id();
    }else {
      return 0;
    }
  }
  public function fetch_all_records_with_order($tabLename,$order_format,$limit)
  {
    extract($order_format);
    if($limit == "limit"){

    }else {
      $this->db->limit($limit);
    }
  $fetch_record =  $this->db->select()
      ->from($tabLename)
      ->order_by($order_format['column_name'],$order_format['order'])
      ->get();
      if($fetch_record->num_rows() > 0){
        return $fetch_record->result();
      }else {
        return $fetch_record->result();
      }
  }
  public function fetch_all_sales($args)
  {

  $fetch_rec =  $this->db->select('order_date,COUNT(order_date),SUM(total_quantity), SUM(total_amount)')
         ->from('order_table')
          ->where($args)
          ->group_by('order_date')
          ->get();
          if($fetch_rec ->num_rows() > 0){
            return $fetch_rec->result_array();
          }else {
            return $fetch_rec->result_array();
          }
  }

  public function fetch_all_records_by_args_with_pagination($tabLename,$args,$order_format,$limit,$offset)
  {
    extract($order_format);
    $fetch_record =$this->db->select()
        ->from($tabLename)
        ->where($args)
        ->order_by($order_format['column_name'],$order_format['order'])
        ->limit($limit,$offset)
        ->get();
        if($fetch_record->num_rows() > 0){
          return $fetch_record->result();
        }else {
          return $fetch_record->result();
        }
  }
}




 ?>
