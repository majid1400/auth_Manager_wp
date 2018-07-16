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
    if (strpos($currenUrl, 'auth/register') !== false) {
        include_once ATHM_TPL_FRONT . 'frontend.php';
        exit();
    }
}

add_action('parse_request', 'authManagerCheckUrls');