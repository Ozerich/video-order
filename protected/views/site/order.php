<header>
    <h1 class="logo"><a href="#">LOGO.ru</a></h1>
</header>

<div id="page_final" class="page page-4">
    <div class="frames-block">
        <div class="fill-block">
            <h2>
                Кадры вашего ролика:
                <a href="#" class="help">
                    <img src="/images/icon01.png" width="21" height="22" alt="описание"/>
                </a>
            </h2>

            <div class="columns">
                <div class="t">&nbsp;</div>
                <div class="c">
                    <ul>
                        <li class="col1">
								<span>Фото
									<a href="#" class="help">
                                        <img src="/images/icon01.png" width="21" height="22" alt="описание"/>
                                    </a>
								</span>
                        </li>
                        <li class="col2">
								<span>Текст диктора
									<a href="#" class="help">
                                        <img src="/images/icon01.png" width="21" height="22" alt="описание"/>
                                    </a>
								</span>
                        </li>
                        <li class="col3">
								<span>Текст в кадре
									<a href="#" class="help">
                                        <img src="/images/icon01.png" width="21" height="22" alt="описание"/>
                                    </a>
								</span>
                        </li>
                    </ul>
                </div>
                <div class="b">&nbsp;</div>
            </div>
        </div>

        <div>
            <? foreach ($order->frames as $ind => $frame): ?>
            <div class="still-block">
                <div class="t">&nbsp;</div>
                <div class="c">

                    <h2>
                        <span><span class="frame-number"><?=$ind + 1?> кадр</span>
                        </span>
                    </h2>

                    <div class="content-block active">

                        <div class="col1">

                            <div class="visual">
                                <a href="#" href="<?=$frame->getImage()?>">
                                    <img src="<?=$frame->getImage()?>" width="236" height="120"/>
                                </a>
                            </div>

                        </div>

                        <div class="col2">
                            <p><?=$frame->text?></p>
                        </div>

                        <div class="col3">
                            <p><?=$frame->speaker_text?></p>
                        </div>

                    </div>
                </div>

                <div class="b">&nbsp;</div>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</div>

<div class="status-block">
    <h3>
        СТАТУС ВАШЕГО ВИДЕО:
        <a href="#" class="help">
            <img src="../../../images/icon01.png" width="21" height="22" alt="">
        </a>
    </h3>

    <div class="t">&nbsp;</div>
    <div class="c">
        <div class="aside">
        </div>
        <div class="info-block">

            <ul>
                <li>
                    <span class="text">Дизайн</span>
                    <span class="name"><?=$order->design ? $order->design->name : ''?></span>

                    <? if ($order->design): ?>
                    <div class="visual">
                        <img src="<?=$order->design->getImageUrl();?>" width="110" height="61"/>

                        <div class="demo">
                            <a class="iframe" href="<?=$order->design->video?>">смотреть демо</a>
                        </div>
                    </div>
                    <? endif; ?>
                </li>
                <? if ($order->voice): ?>
                <li>
                    <span class="text">Диктор</span>
                    <span class="name"><?=$order->voice->name?></span>

                    <div class="play">
                        <a href="<?=$order->voice->getFileUrl();?>" class="sm2_button">play</a>
                    </div>
                </li>
                <? endif; ?>

                <? if ($order->music): ?>
                <li>
                    <span class="text">Музыка</span>
                    <span class="name"><?=$order->music->name?></span>

                    <div class="play">
                        <a href="<?=$order->music->getFileUrl();?>" class="sm2_button">play</a>
                    </div>
                </li>
                <? endif; ?>
            </ul>
        </div>
    </div>
    <div class="b">&nbsp;</div>
</div>