<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Vital Ozierski, ozicoder@gmail.com">


    <link rel="stylesheet/less" type="text/css" href="/css/reset.less">
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css">
    <link rel="stylesheet/less" type="text/css" href="/css/site.less">


    <script src="/js/jquery-1.9.0.min.js"></script>
    <script src="/js/less-1.3.3.min.js"></script>
    <script src="/js/knockout-2.2.1.js"></script>

    <script type="text/javascript" src="js/jquery.gallery.js"></script>
    <script type="text/javascript" src="js/autoscaling-menu.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="js/jquery.main.js"></script>
    <script type="text/javascript" src="js/form.js"></script>
    <script type="text/javascript" src="js/jquery.simpletip-1.3.1.pack.js"></script>
    <script type="text/javascript" src="js/ajaxfileupload.js"></script>
    <script type="text/javascript" src="js/soundmanager2-nodebug-jsmin.js"></script>
    <script type="text/javascript" src="js/mp3-player-button.js"></script>

    <script src="/js/site.js"></script>



</head>

<body>
<div id="wrapper">

    <header>

        <h1 class="logo"><a href="#">LOGO.ru</a></h1>

        <nav>
            <ul>
                <li data-bind="css:{active: active_tab() == 1}, click: function(data, event) { changeActiveTab(1); }"><span><a
                        href="#">О ПРОДУКТЕ</a></span></li>
                <li data-bind="css:{active: active_tab() == 2}, click: function(data, event) { changeActiveTab(2); }"><span><a
                        href="#">ШАГ 1</a></span></li>
                <li data-bind="css:{active: active_tab() == 3}, click: function(data, event) { changeActiveTab(3); }"><span><a
                        href="#">ШАГ 2</a></span></li>
            </ul>
        </nav>

    </header>


    <?=$content?>
</div>
</body>
</html>
