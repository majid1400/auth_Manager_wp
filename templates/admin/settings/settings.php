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
        </table>
        <!--        <button class="button button-primary" name="athm_saver_options" type="submit">ذخیره اطلاعات</button>-->
        <?php submit_button('ذخیره اطلاعات', 'primary', 'athm_saver_options'); ?>
    </form>
</div>