<div class="fill-block">
    <h2>
        Наполните кадры вашего ролика:
        <a href="#" class="help">
            <img src="images/icon01.png" width="21" height="22" alt="описание"/>
        </a>
    </h2>

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
                        <span><span class="frame-number"><span data-bind="text: $index() + 1"></span> кадр</span>
                            <a href="#" class="erase" data-bind="click: $root.deleteFrame">erase</a>
                            <span class="direction">
                                <a href="#" class="up">up</a>
                                <a href="#" class="down">down</a>
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
                                <a href="#" data-bind="attr:{href: image()}">
                                    <img data-bind="attr:{src: preview_image()}" width="236" height="132"/>
                                </a>
                            </div>

                            <span class="upload file" data-bind="visible: !loader() && !loaded()">

                                <input class="file-input-area" name="UploadForm[image]" onchange="Video.loadFile(event);"
                                       data-bind="attr: {id: 'file_' + getID()}" type="file" value="Browse..."/>

                                <a class="button" href="#">ЗАГРУЗИТЬ</a>
                            </span>

                        </div>

                        <div class="col2">
                            <textarea class="textarea2" cols="30" rows="10"></textarea>
                            <span class="symbols">235 знаков</span>
                        </div>

                        <div class="col3">
                            <textarea class="textarea3" cols="30" rows="10"></textarea>
                            <span class="symbols">105 знаков</span>
                        </div>

                    </div>
                </div>
                <div class="b">&nbsp;</div>
            </div>
        </div>

        <div class="add-still">
            <span class="add"><a data-bind="click: addFrame" href="#">+ ДОБАВИТЬ КАДР</a></span>
            ИЛИ
            <span class="save"><input data-bind="click: submit" type="submit"
                                      value="СОХРАНИТЬ И ПЕРЕДАТЬ В ПРОИЗВОДСТВО"/></span>
        </div>
    </fieldset>
</form>