<div class="wrap">
    <h1>تنظیمات</h1>
    <form action="" method="post">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">قالب صفحات ورود و ثبت نام</th>
                <td>
                    <?php foreach ($templates as $template => $title): ?>
                        <input type="radio"
                               name="athm_template"
                               value="<?php echo $template; ?>"
                            <?php checked($default_template, $template); ?>>
                        <span><?php echo $title; ?></span>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">آدرس صفحه ورود</th>
                <td>
                    <input
                            type="text"
                            name="athm_login_path"
                            value="<?php echo $login_path; ?>"
                    >
                    <code>auth/</code>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">آدرس صفحه ثبت نام</th>
                <td>
                    <input
                            type="text"
                            name="athm_register_path"
                            value="<?php echo $register_path; ?>"
                    >
                    <code>auth/</code>
                </td>
            </tr>
        </table>
        <!--        <button class="button button-primary" name="athm_saver_options" type="submit">ذخیره اطلاعات</button>-->
        <?php submit_button('ذخیره اطلاعات', 'primary', 'athm_saver_options'); ?>
    </form>
</div>