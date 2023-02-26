<?php

function is_logged_in()
{
    $inst = get_instance();
    if (!$inst->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $inst->session->userdata('role_id');
        $menu = $inst->uri->segment(1);

        $queryMenu = $inst->db->get_where('tb_menu', ['menu_name' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $queryAccess = $inst->db->get_where('tb_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($queryAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
