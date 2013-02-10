<div class="page-loader-overlay" data-bind="visible: loader"></div>
<div class="page-loader" data-bind="visible: loader">
    <p>Идет загрузка....</p>

    <p>Пожалуйста подождите</p>
    <img src="/images/page-loader.gif"/>
</div>

<form>
    <div class="step-block">
        <div class="t">&nbsp;</div>
        <div class="c">
            <div class="gallery-holder">
                <h2>
                <span>
                    1. ДИЗАЙН РОЛИКА:
                   					<a href="#" class="help">
                                           <img src="images/icon01.png" width="21" height="22"
                                                alt="<a href='#' class='prev'>ссылка</a>"/>
                                       </a>
                </span>
                </h2>

                <div class="gallery">
                    <a href="#" class="next">next</a>
                    <a href="#" class="prev">prev</a>

                    <div class="frame">
                        <ul data-bind="foreach: designs, gallery:{}">
                            <li>
                            <span class="text">№<span data-bind="text: getID()"></span> <span
                                    data-bind="text: getName()"></span></span>

                                <div class="visual">
                                    <img data-bind="attr:{src: getImage()}" width="182" height="102"/>

                                    <div class="demo">
                                        <a class="iframe" data-bind="attr:{href: getVideo()}">смотреть демо</a>
                                    </div>
                                </div>

                                <div class="check-holder">
                                    <div class="radio" data-bind="click: $root.selectDesign"><input type="radio" name="radio"/></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="b">&nbsp;</div>
    </div>
    <div class="step-block">
        <div class="t">&nbsp;</div>
        <div class="c">
            <div class="gallery-holder sound">
                <h2>
                <span>
                    2. ГОЛОС ДИКТОРА:
                    <a href="#" class="help">
                        <img src="../../../images/icon01.png" width="21" height="22"
                             alt="<a href='#' class='prev'>ссылка</a>"/>
                    </a>
                </span>
                </h2>

                <h3>Мужские голоса:</h3>

                <div class="gallery">
                    <a href="#" class="next">next</a>
                    <a href="#" class="prev">prev</a>

                    <div class="frame">
                        <ul data-bind="foreach: menVoices">
                            <li>
                           <span class="text">№<span data-bind="text: getID()"></span> <span
                                   data-bind="text: getName()"></span></span>

                                <div class="play">
                                    <a href="#" data-bind="attr:{href:getFile()}" class="sm2_button"></a>
                                </div>
                                <div class="check-holder" data-bind="click: $root.selectVoice">
                                    <input type="radio" name="radio1"/>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <h3>Женские голоса:</h3>

                <div class="gallery">
                    <a href="#" class="next">next</a>
                    <a href="#" class="prev">prev</a>

                    <div class="frame">
                        <ul data-bind="foreach: womanVoices">
                            <li>
                           <span class="text">№<span data-bind="text: getID()"></span> <span
                                   data-bind="text: getName()"></span></span>

                                <div class="play">
                                    <a href="#" data-bind="attr:{href:getFile()}" class="sm2_button"></a>
                                </div>
                                <div class="check-holder" data-bind="click: $root.selectVoice">
                                    <input type="radio" name="radio1"/>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="b">&nbsp;</div>
    </div>

    <div class="step-block">
        <div class="t">&nbsp;</div>
        <div class="c">
            <div class="gallery-holder sound">
                <h2>
								<span>
									3. ФОНОВАЯ МУЗЫКА:
									<a href="#" class="help">
                                        <img src="../../../images/icon01.png" width="21" height="22"
                                             alt="<a href='#' class='prev'>ссылка</a>"/>
                                    </a>
								</span>
                </h2>

                <h3>Выберите фоновую музыку</h3>

                <div class="gallery">
                    <a href="#" class="next">next</a>
                    <a href="#" class="prev">prev</a>

                    <div class="frame">
                        <ul data-bind="foreach: music">
                            <li>
                           <span class="text">№<span data-bind="text: getID()"></span> <span
                                   data-bind="text: getName()"></span></span>

                                <div class="play">
                                    <a href="#" data-bind="attr:{href:getFile()}" class="sm2_button"></a>
                                </div>
                                <div class="check-holder" data-bind="click: $root.selectMusic">
                                    <input type="radio" name="radio2"/>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <h3>Или загрузите свой mp3 файл:</h3>
							<span class="upload file" data-bind="visible: !file_loader()">
									<input class="file-input-area" type="file" name="UploadForm[image]" id="file_input" value="Browse..." onchange="Video.loadMusic();"/>
									<a class="button" href="#">ЗАГРУЗИТЬ</a>
							</span>
                <div class="file-loader" data-bind="visible: file_loader"></div>

                <span class="filename" data-bind="text: custom_file_realname, visible: !file_loader()" readonly="readonly"></span>
            </div>
        </div>
        <div class="b">&nbsp;</div>
    </div>

    <div class="btn-next">
        <input type="submit" onclick="Video.ViewModel.changePage(3); return false;" value="ДАЛЕЕ ШАГ 2"/>
    </div>

</form>