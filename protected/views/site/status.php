<div class="status-block">
    <h3>
        ТЕКУЩИЙ СТАТУС ВАШЕГО ВИДЕО:
        <a href="#" class="help">
            <img src="../../../images/icon01.png" width="21" height="22" alt="">
        </a>
    </h3>

    <div class="t">&nbsp;</div>
    <div class="c">
        <div class="aside">
            <h4>
                Срок изготовления:
                <a href="#" class="help">
                    <img src="../../../images/icon01.png" width="21" height="22" alt="">
                </a>
            </h4>
            <strong data-bind="text: days"></strong>
            <h4>
                Стоимость:
                <a href="#" class="help">
                    <img src="../../../images/icon01.png" width="21" height="22" alt="">
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
                                         alt=""/>
                                </a>
							</span>
                <span data-bind="text: time"></span>
            </div>
            <ul>
                <li>
                    <span class="text">Дизайн</span>
                    <span class="name" data-bind="text: selectedDesign() ? selectedDesign().getName() : ''">&nbsp;</span>

                    <div data-bind="visible: selectedDesign()" class="visual">
                        <img  data-bind="attr: {src: selectedDesign() ? selectedDesign().getImage() : ''}" width="110" height="61"/>

                        <div class="demo">
                            <a class="iframe" data-bind="attr: {href: selectedDesign() ? selectedDesign().getVideo() : ''}">смотреть демо</a>
                        </div>
                    </div>
                </li>
                <li>
                    <span class="text">Диктор</span>
                    <span class="name" data-bind="text: selectedVoice() ? selectedVoice().getName() : ''"></span>

                    <div  data-bind="visible: selectedVoice()" class="play">
                        <a data-bind="attr: {href: selectedVoice() ? selectedVoice().getFile() : '#'}"  class="sm2_button">play</a>
                    </div>
                </li>
                <li>
                    <span class="text">Музыка</span>
                    <span class="name" data-bind="text: musicFile() ? musicFile().real : ''"></span>

                    <div data-bind="visible: musicFile()" class="play">
                        <a data-bind="attr: {href: musicFile() ? musicFile().server : '#'}" class="sm2_button">play</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="b">&nbsp;</div>
</div>