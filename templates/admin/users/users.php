<div class="wrap">
    <h1>مدیریت کاربران</h1>

    <table class="widefat">
        <tr>
            <td>نام</td>
            <td>ایمیل</td>
            <td>شماره تماس</td>
            <td>موجودی</td>
            <td>عملیات</td>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user->user_nicename ?></td>
                <td><?php echo $user->user_email ?></td>
                <td><?php echo get_user_meta($user->ID, 'mobile', true) ?></td>
                <td><?php echo get_user_meta($user->ID, 'Inventory', true) ?> </td>
                <td>
                    <a title="ویرایش اطلاعات کاربر"
                       href="<?php echo add_query_arg(['action' => 'edit_user', 'user_id' => $user->ID]); ?>">
                        <span class="dashicons dashicons-edit">
                        </span></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>