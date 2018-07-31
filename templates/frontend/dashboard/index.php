<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>داشبورد</title>
    <link rel="stylesheet" href="<?php echo ATHM_ASSETS . 'css/normalize.css' ?>">
    <link rel="stylesheet" href="<?php echo ATHM_ASSETS . 'css/milligram-rtl.css' ?>">
    <link rel="stylesheet" href="<?php echo ATHM_ASSETS . 'css/custom.css' ?>">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="column column-50 column-offset-25">
            <form action="" method="post">
                <fieldset>
                    <label for="userFullName">قالب پیش فرض :</label>
                    <?php foreach ($templates as $template => $title): ?>
                        <input
                                type="radio"
                                name="athm_template"
                                value="<?php echo $template; ?>"
                            <?php checked($template, $default_template); ?>
                        >
                        <span><?php echo $title; ?></span>
                    <?php endforeach; ?>
                </fieldset>
                <button name="athm_save_options">ذخیره اطلاعات</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>