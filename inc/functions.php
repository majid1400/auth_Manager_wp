<?php
function athm_check_login($email, $password)
{
    $is_email =  is_email($email);
    if (!$is_email){
        return false;
    }
    $user = wp_authenticate_email_password(null, $email, $password);
    if (is_wp_error($user)){
        return false;
    }
    return $user;
}

function url_logout_new($logout_url, $redirect){
    return home_url(). '/auth/logout';
}

add_filter('logout_url', 'url_logout_new', 10, 2);