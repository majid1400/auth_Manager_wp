<div class="wrap">
    <h1>تنظیمات</h1>
    <form action="" method="post">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">شماره تماس :</th>
                <td>
                    <input type="text"
                           name="mobile"
                           value="<?php echo get_user_meta($user_id,'mobile',true);?>">
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">موجودی :</th>
                <td>
                    <input type="text"
                           name="Inventory"
                           value="<?php echo get_user_meta($user_id,'Inventory',true);?>">
                </td>
            </tr>
        </table>
        <?php submit_button('ذخیره اطلاعات', 'primary', 'athm_save_options'); ?>
    </form>
</div>
