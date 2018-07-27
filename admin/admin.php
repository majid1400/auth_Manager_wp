<?php
function athm_users_manager_handler()
{
    global $wpdb, $table_prefix;
    $users_tabel = $table_prefix . 'users';
    $users = $wpdb->get_results("SELECT * FROM {$users_tabel}");
    include_once ATHM_TPL_ADMIN . 'users/users.php';
}

function athm_add_admin_page()
{
    add_menu_page(
        'مدیریت کاربران',
        'مدیریت کاربران',
        'manage_options',
        'athm_users_manager',
        'athm_users_manager_handler');
}

add_action('admin_menu', 'athm_add_admin_page');