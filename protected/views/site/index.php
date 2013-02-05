<div id="page_about" class="page" data-bind="visible: active_tab() == 1"><?=$this->renderPartial('about');?></div>
<div id="page_step_1" class="page" data-bind="visible: active_tab() == 2"><?=$this->renderPartial('step1');?></div>
<div id="page_step_2" class="page" data-bind="visible: active_tab() == 3"><?=$this->renderPartial('step2');?></div>

<div id="status_block">
    <h3>
        ТЕКУЩИЙ СТАТУС ВАШЕГО ВИДЕО:
        <a href="#" class="help">
            <img src="../../../images/icon01.png" width="21" height="22" alt="<a href='#' class='prev'>ссылка</a>"/>
        </a>
    </h3>

    <div class="t">&nbsp;</div>
    <div class="c">
        <div class="aside">
            <h4>
                Срок изготовления:
                <a href="#" class="help">
                    <img src="../../../images/icon01.png" width="21" height="22" alt="<a href='#' class='prev'>ссылка</a>"/>
                </a>
            </h4>
            <strong data-bind="text: days"></strong>
            <h4>
                Стоимость:
                <a href="#" class="help">
                    <img src="../../../images/icon01.png" width="21" height="22" alt="<a href='#' class='prev'>ссылка</a>"/>
                </a>
            </h4>
            <strong><span data-bind="text: price"></span> руб.</strong>
        </div>
        <div class="info-block">
            <div class="video-info">
                <span>Кадров: <em data-bind="text: frames().length"></em></span>
							<span>
								Примерный хронометраж:
								<a href="#" class="help">
                                    <img src="../../../images/icon01.png" width="21" height="22"
                                         alt="<a href='#' class='prev'>ссылка</a>"/>
                                </a>
							</span>
                <span data-bind="text: time"></span>
            </div>
            <ul>
                <li>
                    <span class="text">Дизайн</span>
                    <span class="name">&nbsp;</span>

                    <div style="display:none;" class="visual">
                        <img src="images/none.gif" width="110" height="61" alt="image description"/>

                        <div class="demo">
                            <a class="iframe" href="http://www.youtube.com/embed/YYct5aH_Fik">смотреть демо</a>
                        </div>
                    </div>
                </li>
                <li>
                    <span class="text">Диктор</span>
                    <span class="name">&nbsp;</span>

                    <div style="display:none;" class="play">
                        <a href="#">play</a>
                    </div>
                </li>
                <li>
                    <span class="text">Музыка</span>
                    <span class="name">&nbsp;</span>

                    <div style="display:none;" class="play">
                        <a href="#">play</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="b">&nbsp;</div>
</div>