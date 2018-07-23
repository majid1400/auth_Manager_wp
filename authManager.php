<?php
/*
Plugin Name: AuthManager
Plugin URI: http://www.tarminet.com
Description: مدیریت ثبت نام و ورود کاربران
Version: 1.0.0
Author: majid behnamfard
Author URI: http://www.tarminet.com
Text Domain: http://www.tarminet.com
Domain Path: /languages
*/

######################## تعریف ثابت ها #########################

defined('ABSPATH') || die('access denied!');

define('ATHM_DIR', plugin_dir_path(__FILE__));
define('ATHM_URL', plugin_dir_url(__FILE__));
define('ATHM_TPL_FRONT', ATHM_DIR . 'templates/frontend/');
define('ATHM_ASSETS', ATHM_URL . 'assets/');

################### فعال و غیر فعال شدن پلاگین ##################
function authManagerActivation()
{
}

function authManagerDeactivation()
{
}

register_activation_hook(__FILE__, 'authManagerActivation');
register_deactivation_hook(__FILE__, 'authManagerDeactivation');
//register_uninstall_hook();

################### تغییر دادن url ##################

function authManagerCheckUrls()
{
    $currenUrl = $_SERVER['REQUEST_URI'];
    if (strpos($currenUrl, 'auth/register') != false) {

        $hashError = false;
        $isSuccess = false;
        $errorMsg = [];

        if (isset($_POST['save_register_form'])) {
            $user_full_name = $_POST['user_full_name'];
            $user_email = $_POST['user_email'];
            $user_pass = $_POST['user_pass'];

            if (empty($user_email)) {
                $hashError = true;
                $errorMsg[] = "پر کردن فیلد نام الزامی می باشد.";
            }
            if (!filter_var($user_email, FILTER_VALIDATE_EMAIL) or email_exists($user_email)) {
                $hashError = true;
                $errorMsg[] = "این ایمیل در دسترس نمی باشد.";
            }
            if (strlen($user_pass) < 6) {
                $hashError = true;
                $errorMsg[] = "تعداد کاراکترها کمتر از یک است.";
            }

            if (!$hashError) {
                list($preAt, $postAt) = explode('@', $user_email);
                $user_login = $preAt . rand(1000, 9999);
                $user_data = [
                    'user_login'    => apply_filters('pre_user_login', $user_login),
                    'display_name'  => apply_filters('pre_user_display_name', $user_full_name),
                    'user_email'    => apply_filters('pre_user_email', $user_email),
                    'user_pass'     => apply_filters('pre_user_pass', $user_pass)
                ];
                $user_register_result = wp_insert_user($user_data); # if was True return ID
                if (is_wp_error($user_register_result)) {
                    $hashError = true;
                    $errorMsg[] = 'خطایی در ثبت نام شما رخ داده است.';
                } else {
                    $isSuccess = true;
                    do_action('user_register', $user_register_result);
                }
            }
        }
        include_once ATHM_TPL_FRONT . 'frontend.php';
        exit();
    }
}

add_action('parse_request', 'authManagerCheckUrls');