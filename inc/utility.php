<?php
function athm_load_tpl($template, $params = array(), $type = 'admin')
{
    $template = str_replace('.', '/', $template);
    extract($params);
    $base_path = $type == 'admin' ? ATHM_TPL_ADMIN : ATHM_TPL_FRONT;
    include $base_path . $template . '.php';
}

function athm_is_admin()
{
    return current_user_can('manage_options');
}

function athm_redirect($url)
{
    wp_redirect($url);
    exit();
}