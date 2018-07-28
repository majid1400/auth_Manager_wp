<?php
function athm_load_tpl($template, $params = array(), $type = 'admin')
{
    $template = str_replace('.', '/', $template);
    extract($params);
    $base_path = $type == 'admin' ? ATHM_TPL_ADMIN : ATHM_TPL_FRONT;
    include $base_path . $template . '.php';
}