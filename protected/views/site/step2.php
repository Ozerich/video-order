<div class="frames-block">
<div class="fill-block">
    <h2>
        Наполните кадры вашего ролика:
        <a href="#" class="help">
            <img src="images/icon01.png" width="21" height="22" alt="описание"/>
        </a>
    </h2>

    <h3>Вы в любой момент можете вернуться на шаг1 и изменить ваш выбор, наполненные кадры сохраняться.</h3>

    <div class="columns">
        <div class="t">&nbsp;</div>
        <div class="c">
            <ul>
                <li class="col1">
								<span>Фото
									<a href="#" class="help">
                                        <img src="images/icon01.png" width="21" height="22" alt="описание"/>
                                    </a>
								</span>
                </li>
                <li class="col2">
								<span>Текст диктора
									<a href="#" class="help">
                                        <img src="images/icon01.png" width="21" height="22" alt="описание"/>
                                    </a>
								</span>
                </li>
                <li class="col3">
								<span>Текст в кадре
									<a href="#" class="help">
                                        <img src="images/icon01.png" width="21" height="22" alt="описание"/>
                                    </a>
								</span>
                </li>
            </ul>
        </div>
        <div class="b">&nbsp;</div>
    </div>
</div>
<form action="#" class="still-block-holder">
    <fieldset>
        <div class="frame-list" data-bind="foreach: frames">

            <div class="still-block">
                <div class="t">&nbsp;</div>
                <div class="c">

                    <h2>
                        <span><span class="frame-number"><!--ko text: $index() + 1 --><!--/ko--> кадр</span>
                            <a href="#" class="erase" data-bind="click: $root.deleteFrame">erase</a>
                            <span class="direction">
                                <a href="#" class="up" data-bind="click: $root.upFrame">up</a>
                                <a href="#" class="down" data-bind="click: $root.downFrame">down</a>
                            </span>
                        </span>
                    </h2>

                    <div class="content-block active">

                        <div class="col1">

                            <div class="file-loader" data-bind="visible: loader"></div>

                            <div class="erase-block" data-bind="visible: loaded() && !loader()">
                                <a href="#" class="erase" data-bind="click: $root.deletePhoto">erase</a>
                            </div>

                            <div class="visual" data-bind="visible: loaded() && !loader()">
                                <a href="#" target="_blank" data-bind="attr:{href: image()}">
                                    <img data-bind="attr:{src: image()}" width="236" height="132"/>
                                </a>
                            </div>

                            <span class="upload file" data-bind="visible: !loader() && !loaded()">

                                <input class="file-input-area" name="UploadForm[image]"
                                       onchange="Video.loadFile(event);"
                                       data-bind="attr: {id: 'file_' + getID()}" type="file" value="Browse..."/>

                                <a class="button" href="#">ЗАГРУЗИТЬ</a>
                            </span>

                        </div>

                        <div class="col2">
                            <textarea class="textarea2" cols="30" rows="10" data-bind="value: text, valueUpdate: 'afterkeydown'"></textarea>
                            <span class="symbols"><span data-bind="text: words_count"></span> слов</span>
                        </div>

                        <div class="col3">
                            <textarea class="textarea3" cols="30" rows="10" data-bind="value: speaker_text, valueUpdate: 'afterkeydown'"></textarea>
                            <span class="symbols"><span data-bind="text: speaker_words_count"></span> слов</span>
                        </div>

                    </div>
                </div>
                <div class="b">&nbsp;</div>
            </div>
        </div>

        <div class="add-still">
            <span class="add"><a data-bind="click: addFrame" href="#">+ ДОБАВИТЬ КАДР</a></span>
            ИЛИ
            <span class="save"><input data-bind="click: go_to_final" type="submit"
                                      value="СОХРАНИТЬ И ПЕРЕДАТЬ В ПРОИЗВОДСТВО"/></span>
        </div>
    </fieldset>
</form>

</div>