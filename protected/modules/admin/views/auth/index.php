<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <meta name="author" content="Vital Ozierski, ozicoder@gmail.com">

    <link rel="stylesheet/less" type="text/css" href="/css/reset.less">
    <link rel="stylesheet/less" type="text/css" href="/css/auth.less">

    <script src="/js/jquery-1.9.0.min.js"></script>
    <script src="/js/less-1.3.3.min.js"></script>

    <script>
        $(function () {
            $('.error').hide();

            $('#submit').click(function () {
                $.post('/reelconfig/auth', {password:$('#password').val()}, function (data) {
                    data = jQuery.parseJSON(data);
                    if (data.error == 0) {
                        document.location = data.url;
                    }
                    else {
                        $('.error').show();
                    }
                });
            });
        });
    </script>
</head>

<body>

<div id="auth_page">

    <div class="form">

        <div class="param">
            <label for="password">Пароль для доступа:</label>
            <input type="password" id="password" name="password"/>
            <span class="error" style="display: none">Доступ запрещен</span>
        </div>

        <div class="submit">
            <input type="submit" id="submit" value="Войти"/>
        </div>

    </div>

</div>

</body>
</html>


