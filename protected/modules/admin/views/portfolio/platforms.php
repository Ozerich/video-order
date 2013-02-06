<div id="project_platforms_page">

    <? if(!$model->isNewRecord): ?>
    <div class="tabs">
        <a href="/admin/portfolio/">Список</a>
        <a href="/admin/portfolio/view/id/<?=$model->id?>">Проект</a>
        <a href="/admin/portfolio/platforms/id/<?=$model->id?>">Фотографии</a>
    </div>
    <? endif; ?>

    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'project_platforms_form',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>


    <? foreach ($platforms as $platform): ?>
    <div class="platform">

        <h2><?=$platform->name?></h2>

        <div class="block">
            <? if (isset($platform_main_images[$platform->id]->image)): ?>
            <div class="platform-image">
                <h3>Текущая превью фотография:</h3>

                <div class="image">
                    <img src="<?=Yii::app()->params['projects_url'] . $platform_main_images[$platform->id]->image?>"/>
                </div>
            </div>
            <? endif; ?>

            <div class="platform-image">
                <label>Новая превью фотография:</label>
                <?php echo $form->fileField($platform_main_images[$platform->id], '[' . $platform->id . ']main_image'); ?>
                <?php echo $form->error($platform_main_images[$platform->id], 'image'); ?>
            </div>

            <?php echo $form->hiddenField($platform_main_images[$platform->id], '[' . $platform->id . ']is_main'); ?>
            <?php echo $form->hiddenField($platform_main_images[$platform->id], '[' . $platform->id . ']platform_id'); ?>
        </div>

        <div class="platform-images block">
            <h3>Фотографии подробного вида:</h3>
            <? foreach ($platform_images[$platform->id] as $image): ?>
            <div class="image-item">
                <div class="image">
                    <img src="<?=Yii::app()->params['projects_url'] . $image->image?>"/>
                </div>
                <div class="image-actions">

                    <div class="new-photo">
                        <label>Новая фотография</label>
                        <?php echo $form->fileField($image, 'images[' . $image->id . ']'); ?>
                        <?php echo $form->error($image, 'image'); ?>
                    </div>

                    <a href="#"
                       onclick="if(confirm('Вы уверены?')) $(this).parents('.image-item').remove(); return false;">Удалить</a>

                </div>
                <br clear="all"/>
            </div>
            <? endforeach; ?>
        </div>

        <div class="add-photo-block block">
            <h3>Новые фотографии</h3>
            <? foreach ($new_images[$platform->id] as $ind => $new_model): ?>
            <div class="new-photo">
                <?php echo $form->fileField($new_model, 'new_images[' . $platform->id . '][' . $ind . ']'); ?>
                <?php echo $form->error($new_model, 'image'); ?>
            </div>
            <? endforeach; ?>
        </div>

    </div>
    <? endforeach; ?>

    <div class="submit">
        <input type="submit" value="Сохранить"/>
    </div>

    <? $this->endWidget(); ?>
</div>