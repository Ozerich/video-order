<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Bannerstudio - Control Panel</title>

    <link rel="stylesheet" type="text" href="/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/less" href="/css/admin.less"/>
    <link rel="stylesheet" type="text" href="/css/unicorn.main.css"/>


    <script type="text/javascript" src="/js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="/js/less-1.3.3.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
</head>

<body>
<div id="container">

    <header id="content-header">
        <h1>Video Control Panel</h1>
    </header>

    <div id="breadcrumb">
        <? foreach($this->breadcrumbs as $ind => $breadcrumb): ?>
            <a href="/admin/<?=$breadcrumb['url']; ?>" <?=$ind == count($this->breadcrumbs) - 1 ? 'class="current"' : ''?>>
                <? if(isset($breadcrumb['icon'])): ?>
                    <i class="icon-<?=$breadcrumb['icon'];?>"></i>
                        <? endif; ?>
                    <?=$breadcrumb['label']; ?>
            </a>
        <? endforeach; ?>
    </div>

    <div id="content">
        <?=$content?>
    </div>

    <footer>
        Powered by <a href="mailto: ozicoder@gmail.com">Vital Ozierski</a> &copy; 2013</a>
    </footer>

</div>

</body>
</html>
