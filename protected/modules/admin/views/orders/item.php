<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="icon-align-justify"></i>
        </span>
        <h5>Заказ № <?=$model->id?> (<?=$model->created?>)</h5>

        <div class="public-link"><a href="<?=$model->getPublicLink()?>" target="_blank"><?=$model->getPublicLink()?></a>
        </div>
    </div>
    <div class="widget-content nopadding item-view">

        <div class="row-status">

            <div class="span4">
                <h4>Дизайн</h4>
                <? if ($model->design): ?>
                <a class="param-link" href="/reelconfig/designs/<?=$model->design->id?>"><?=$model->design->name?></a>
                <img src="<?=$model->design->getImageUrl()?>"/>
                <? endif; ?>
            </div>

            <div class="span4">
                <h4>Диктор</h4>
                <? if ($model->voice): ?>
                <a class="param-link" href="/reelconfig/voices/<?=$model->voice->id?>"><?=$model->voice->name?></a>
                <p><?=$model->voice->description?></p>
                <a href="<?=$model->voice->getFileUrl();?>" class="sm2_button"></a>
                <a href="<?=$model->voice->getFileUrl();?>" target="_blank">Скачать</a>

                <? endif; ?>
            </div>

            <div class="span4">
                <h4>Музыка</h4>
                <? if ($model->music): ?>
                <a class="param-link" href="/reelconfig/music/<?=$model->music->id?>"><?=$model->music->name?></a>
                <a href="<?=$model->music->getFileUrl();?>" class="sm2_button"></a>
                <a href="<?=$model->music->getFileUrl();?>" target="_blank">Скачать</a>
                <? elseif ($model->music_file): ?>
                <a class="param-link" target="_blank" href="<?=$model->music_file?>">Пользовательский</a>
                <a href="<?=$model->music_file?>" class="sm2_button"></a>
                <a href="<?=$model->music_file?>" target="_blank">Скачать</a>
                <? endif; ?>
            </div>

            <br clear="all"/>
        </div>

        <div class="row-status">

            <div class="span4">
                <h5>E-mail:</h5>
                <a href="mailto:<?=$model->email?>" target="_blank"><?=$model->email?></a>
            </div>

            <div class="span4">
                <h5>Имя:</h5>
                <span><?=$model->name?></span>
            </div>

            <div class="span4">
                <h5>Информация:</h5>
                <span><?=$model->information?></span>
            </div>

            <br clear="all"/>
        </div>


        <div class="frames-block">
            <form action="" method="post">
                <h4>Кадры:</h4>
                <button id="edit_frames" class="btn btn-mini">Редактировать</button>
                <input id="save_frames" type="submit" class="btn btn-mini" value="Сохранить" style="display: none"/>

                <div class="frame-columns row-status">
                    <div class="span4">Картинка</div>
                    <div class="span4">Голос диктора</div>
                    <div class="span4">Текст в кадре</div>

                    <br clear="all"/>
                </div>

                <? foreach ($model->frames as $ind => $frame): ?>
                <div class="frame">
                    <div class="frame-header">
                        <span>Кадр <?=$ind + 1?></span>
                    </div>
                    <div class="frame-content  row-status">
                        <div class="span4">
                            <a href="<?=$frame->getImage()?>" target="_blank"><img src="<?=$frame->getImage()?>"/></a>
                        </div>
                        <div class="span4">
                            <p><?=$frame->speaker_text?></p>
                            <textarea name="speaker_text[<?=$frame->id?>]"
                                      style="display: none"><?=$frame->speaker_text?></textarea>
                        </div>
                        <div class="span4">
                            <p><?=$frame->text?></p>
                            <textarea name="text[<?=$frame->id?>]" style="display: none"><?=$frame->text?></textarea>
                        </div>
                        <br clear="all"/>
                    </div>
                </div>
                <? endforeach; ?>
            </form>
        </div>

    </div>


</div>

<script>
    $(function () {

        $('#edit_frames').click(function () {
            $('#edit_frames').hide();
            $('#save_frames').show();

            $('.frame p').hide();
            $('.frame textarea').show();

            return false;
        });

    });
</script>