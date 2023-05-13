<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function getSubMenu()
    {
        $query =    "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";

        return $this->db->query($query)->result_array();
    }
    public function saveRes()
    {
        $post = $this->input->post();
        $this->id               = uniqid();
        $this->name             = $post['name'];
   

        return $this->db->insert('resident', $this);
    }

    public function getAnalytics()
    {
        $query =    "SELECT `type`, count(`type`) as `tcount` FROM `user_report` GROUP by `type`";

        return $this->db->query($query)->result_array();
    }

    public function getUser($data)
    {
        $this->db->where('name', $data['name']);

        $query = $this->db->get('resident');
        return $query->row(); 
   
    }

}