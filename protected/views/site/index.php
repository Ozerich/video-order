<header>

    <h1 class="logo"><a href="#">LOGO.ru</a></h1>

    <nav>
        <ul data-bind="visible: active_tab() < 4">
            <li data-bind="css:{active: active_tab() == 1}, click: function(data, event) { changeActiveTab(1); }"><span><a
                    href="#">О ПРОДУКТЕ</a></span></li>
            <li data-bind="css:{active: active_tab() == 2}, click: function(data, event) { changeActiveTab(2); }"><span><a
                    href="#">ШАГ 1</a></span></li>
            <li data-bind="css:{active: active_tab() == 3}, click: function(data, event) { changeActiveTab(3); }"><span><a
                    href="#">ШАГ 2</a></span></li>
        </ul>
    </nav>

</header>

<div id="page_about" class="page" data-bind="visible: active_tab() == 1"><?=$this->renderPartial('about');?></div>

<div id="page_step_1" class="page" data-bind="visible: active_tab() == 2">
    <?=$this->renderPartial('step1');?>
    <?=$this->renderPartial('status'); ?>
</div>

<div id="page_step_2" class="page" data-bind="visible: active_tab() == 3">
    <?=$this->renderPartial('step2');?>
    <?=$this->renderPartial('status'); ?>
</div>

<div id="page_final" class="page" data-bind="visible: active_tab() == 4">
    <?=$this->renderPartial('status');?>
    <?=$this->renderPartial('final'); ?>
</div>


    <div id="page_success" class="page" data-bind="visible: active_tab() == 5">
        <?=$this->renderPartial('success');?>
    </div>