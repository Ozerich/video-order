<div id="main_page">
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

    <div id="page_about" class="page page-1" style="display: none"><?=$this->renderPartial('about');?></div>

    <div id="page_step_1" class="page page-2" style="display: block">
        <?=$this->renderPartial('step1');?>
        <?=$this->renderPartial('status'); ?>
    </div>

    <div id="page_step_2" class="page page-3" style="display: none">
        <?=$this->renderPartial('step2');?>
        <?=$this->renderPartial('status'); ?>
    </div>

    <div id="page_final" class="page page-4" style="display: none">
        <?=$this->renderPartial('status');?>
        <?=$this->renderPartial('final'); ?>
    </div>


    <div id="page_success" class="page page-5" style="display: none">
        <?=$this->renderPartial('success');?>
    </div>
</div>
