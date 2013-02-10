<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?=$this->page_title ? $this->page_title : 'Bannerstudio - Control Panel'?></title>

    <link rel="stylesheet" type="text" href="/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/less" href="/css/admin.less"/>
    <link rel="stylesheet" type="text" href="/css/unicorn.main.css"/>


    <script type="text/javascript" src="/js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="/js/less-1.3.3.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/soundmanager2-nodebug-jsmin.js"></script>
    <script type="text/javascript" src="/js/mp3-player-button.js"></script>

    <script>
        $(function(){
            var basicMP3Player = new BasicMP3Player();

            $(".help").simpletip({

                onBeforeShow:function () {
                    var text = this.getParent().find('img').attr('alt');
                    this.getTooltip().html(text);
                },
                // Configuration properties
                content:'My Simpletip',
                offset:[-$('#page_step_1').offset().left, -$('#page_step_1').offset().top + 5]
            });

        });
    </script>
</head>

<body>
<div id="container">

    <header id="content-header">
        <ul class="quick-actions">
            <li>
                <a href="/reelconfig/orders">
                    Заказы
                </a>
            </li>
            <li>
                <a href="/reelconfig/music">
                    Музыка
                </a>
            </li>
            <li>
                <a href="/reelconfig/designs">
                    Дизайны
                </a>
            </li>
            <li>
                <a href="/reelconfig/voices">
                    Голос
                </a>
            </li>
        </ul>
    </header>

    <div id="breadcrumb">
        <? foreach($this->breadcrumbs as $ind => $breadcrumb): ?>
            <a href="/reelconfig/<?=$breadcrumb['url']; ?>" <?=$ind == count($this->breadcrumbs) - 1 ? 'class="current"' : ''?>>
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
