<div class="wrap">
    <h1>مدیریت کاربران</h1>

    <table class="widefat">
        <tr>
            <th>نام</th>
            <th>ایمیل</th>
            <th>شماره تماس</th>
            <th>موجودی</th>
            <th>عملیات</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <th><?php echo $user->user_nicename ?></th>
                <th><?php echo $user->user_email ?></th>
                <th><?php echo '' ?></th>
                <th><?php echo '' ?></th>
                <th><?php echo '' ?></th>
            </tr>
        <?php endforeach; ?>
    </table>
</div>