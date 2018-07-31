<?php
function athm_users_manager_handler()
{
//    add_user_meta();
//    update_user_meta();
//    delete_user_meta();
//    get_user_meta();

    global $wpdb, $table_prefix;
    $users_tabel = $table_prefix . 'users';
    $action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : null;
    if ($action) {
        $action_callback = $action . '_handler'; // => edit_user_handler
        if (function_exists($action_callback)) {
            $action_callback();
            return;
        }
    }
    $users = $wpdb->get_results("SELECT * FROM {$users_tabel}");
    athm_load_tpl('users.users', compact('users'));
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

function add_auth_manager_settings_menu()
{
    add_options_page(
        'تنظیمات ورود و ثبت نام',
        'تنظیمات ورود و ثبت نام',
        'manage_options',
        'athm_options',
        'auth_manager_settings_page'
    );

}

function auth_manager_settings_page()
{

//    add_option();
//    update_option();
//    delete_option();
//    get_option();

    if (isset($_POST['athm_saver_options'])) {
        $default_template = isset($_POST['athm_template']) ? $_POST['athm_template'] : 'red';
        update_option('athm_update_template_setting', $default_template);
        $login_path = !empty($_POST['athm_login_path']) ? $_POST['athm_login_path'] : 'login';
        $register_path = !empty($_POST['athm_register_path']) ? $_POST['athm_register_path'] : 'register';
        update_option('athm_login_path', $login_path);
        update_option('athm_register_path', $register_path);

    }
    $default_template = get_option('athm_update_template_setting');

    $login_path = get_option('athm_login_path', 'login');
    $register_path = get_option('athm_register_path', 'register');

    $templates = [
        'red' => 'قالب قرمز',
        'blue' => 'قالب آبی',
        'purple' => 'قالب بنفش'
    ];
    athm_load_tpl('settings.settings', compact('templates', 'default_template', 'login_path', 'register_path'));
}

add_action('admin_menu', 'athm_add_admin_page');
add_action('admin_menu', 'add_auth_manager_settings_menu');

function edit_user_handler()
{
    global $wpdb, $table_prefix;
    $user_id = $_GET['user_id'];
    $user = get_user_by('id', $user_id);
//	var_dump($user);
    athm_load_tpl('users.edit');

}
