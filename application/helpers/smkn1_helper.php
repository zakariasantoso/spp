<?php

function cekLogin()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $roleId = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menuId = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $roleId,
            'menu_id' => $menuId
        ]);

        // var_dump($queryMenu);die;
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
function cekAkses($roleId, $menuId)
{
    $ci = get_instance();

    $result = $ci->db->get_where('user_access_menu', [
        'role_id' => $roleId,
        'menu_id' => $menuId
    ]);

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
