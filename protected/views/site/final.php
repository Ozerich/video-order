<div class="page-loader-overlay" data-bind="visible: save_loader"></div>
<div class="page-loader" data-bind="visible: save_loader">
    <p>Идет загрузка....</p>

    <p>Пожалуйста подождите</p>
    <img src="/images/page-loader.gif"/>
</div>

<div class="frames-block">
    <div class="fill-block">
        <h2>
            Кадры вашего ролика:
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

    <div data-bind="foreach: frames">

        <div class="still-block">
            <div class="t">&nbsp;</div>
            <div class="c">

                <h2>
                        <span><span class="frame-number"><!--ko text: $index() + 1 --><!--/ko--> кадр</span>
                        </span>
                </h2>

                <div class="content-block active">

                    <div class="col1">

                        <div class="visual">
                            <a href="#" data-bind="attr:{href: image()}">
                                <img data-bind="attr:{src: preview_image()}" width="236" height="132"/>
                            </a>
                        </div>

                    </div>

                    <div class="col2">
                        <p data-bind="text: text"></p>
                    </div>

                    <div class="col3">
                        <p data-bind="text: speaker_text"></p>
                    </div>

                </div>
            </div>

            <div class="b">&nbsp;</div>
        </div>
    </div>
</div>
<div class="final-block">
    <p>Если все верно - введите ваш настоящий электронный адрес, имя и любую другую информацию</p>

    <div class="form">
        <div class="left">

            <div class="param">
                <label>E-mail *</label>
                <input type="text" data-bind="value: email"/>
            </div>

            <div class="param">
                <label>Имя</label>
                <input type="text" data-bind="value: name"/>
            </div>

        </div>


        <div class="right">
            <div class="param">
                <label>Любая информация</label>
                <textarea data-bind="value: information"></textarea>
            </div>
        </div>

        <br clear="all"/>

    </div>
</div>


<div class="add-still">

    <span class="add selected">
        <a data-bind="click: submit" href="#">Отправить</a>
    </span>

    ИЛИ

    <span class="save">
        <input data-bind="click: back_to_edit" type="submit" value="Вернуться к редактированию"/>
    </span>
</div>