<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sidebar_model extends CI_Model
{
    public function getRoleMenu()
    {
        $role_id = $this->session->userdata('role_id');
        $sql = "SELECT m.*
                FROM `user_menu` m JOIN `user_access_menu` am
                ON m.id = am.menu_id
                WHERE am.role_id = $role_id
                ORDER BY am.menu_id ASC";
        return $this->db->query($sql)->result_array();
    }

    public function getSideMenu()
    {
        $menu = $this->getRoleMenu();
        $submenu = [];

        foreach($menu as $m) {
            $id = $m['id'];
            $sql = "SELECT *
                    FROM `user_sub_menu`
                    WHERE `menu_id` = '$id'
                    AND `is_active` = 1";
            $submenu[$id] = $this->db->query($sql)->result_array();
        }
        return $submenu;
    }

    public function getMenuPengaturan()
    {
        return $this->db->get('pengaturan_naskah')->result_array();
    }
}