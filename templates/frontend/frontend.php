<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>صفحه ثبت نام کاربران</title>
    <link rel="stylesheet" href="<?php echo ATHM_ASSETS . 'css/milligram-rtl.css' ?>">
    <link rel="stylesheet" href="<?php echo ATHM_ASSETS . 'css/normalize.css' ?>">
    <link rel="stylesheet" href="<?php echo ATHM_ASSETS . 'css/custom.css' ?>">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="column column-50 column-offset-25">
            <?php if ($hashError): ?>
                <ul>
                    <?php foreach ($errorMsg as $error): ?>
                        <li style="color: red;"><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form action="" method="post">
                <fieldset>
                    <label for="user_full_name">نام و نام خانوادگی: </label>
                    <input type="text" name="user_full_name" id="user_full_name">

                    <label for="user_email">ایمیل: </label>
                    <input type="email" name="user_email" id="user_email">

                    <label for="user_pass">کلمه عبور: </label>
                    <input type="password" name="user_pass" id="user_pass">

                    <input class="button-primary" name="save_register_form" type="submit" value="ثبت نام">
                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>