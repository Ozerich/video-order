<div id="project_page">

    <? if(!$model->isNewRecord): ?>
        <div class="tabs">
            <a href="/admin/portfolio/">Список</a>
            <a href="/admin/portfolio/view/id/<?=$model->id?>">Проект</a>
            <a href="/admin/portfolio/platforms/id/<?=$model->id?>">Фотографии</a>
        </div>
    <? endif; ?>

    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'project_form',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

    <div class="row row-2">

        <div class="param title-param">
            <?php echo $form->labelEx($model, 'name'); ?>
            <?php echo $form->textField($model, 'name'); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>

        <div class="param featured-param">
            <?php echo $form->labelEx($model, 'is_featured'); ?>
            <?php echo $form->checkbox($model, 'is_featured'); ?>
        </div>
		

        <br clear="all"/>
    </div>

    <div class="row row-2">

        <div class="param">
            <?php echo $form->labelEx($model, 'category_id'); ?>
            <?php echo $form->dropDownList($model, 'category_id', Project::categories()); ?>
            <?php echo $form->error($model, 'category_id'); ?>
        </div>

        <div class="param">
            <?php echo $form->labelEx($model, 'platforms'); ?>
            <?php echo $form->checkboxList($model, 'platforms', Project::platforms()); ?>
            <?php echo $form->error($model, 'platforms'); ?>
        </div>

        <br clear="all"/>
    </div>

    <div class="row row-3">

        <? foreach (array('ios_link', 'android_link', 'wp_link') as $param): ?>
        <div class="param">
            <?php echo $form->labelEx($model, $param); ?>
            <?php echo $form->textField($model, $param); ?>
            <?php echo $form->error($model, $param); ?>
        </div>
        <? endforeach; ?>
        <br clear="all"/>
    </div>
	
    <div class="row row-3">

        <? foreach (array('blackberry_link', 'web_link') as $param): ?>
        <div class="param">
            <?php echo $form->labelEx($model, $param); ?>
            <?php echo $form->textField($model, $param); ?>
            <?php echo $form->error($model, $param); ?>
        </div>
        <? endforeach; ?>
		
		<div class="param enterprise-param">
            <?php echo $form->labelEx($model, 'is_enterprise'); ?>
            <?php echo $form->checkbox($model, 'is_enterprise'); ?>
        </div>
        <br clear="all"/>
    </div>
	
	

    <? if($model->logo): ?>
    <div class="row">
        <div class="param">
            <label>Текущий логотип</label>
            <div class="image">
                <img src="<?=Yii::app()->params['project_logo_dir'].$model->logo?>"/>
            </div>
        </div>
    </div>
    <? endif; ?>

    <div class="row">
        <div class="param">
            <?php echo $form->labelEx($model, 'logo'); ?>
            <?php echo $form->fileField($model, 'logo'); ?>
            <?php echo $form->error($model, 'logo'); ?>
        </div>
    </div>

    <div class="row">
        <div class="param">
            <?php echo $form->labelEx($model, 'preview'); ?>
            <?php echo $form->textarea($model, 'preview', array('class' => 'preview')); ?>
            <?php echo $form->error($model, 'preview'); ?>
        </div>
    </div>

    <div class="row">
        <div class="param">
            <?php echo $form->labelEx($model, 'text'); ?>
            <?php echo $form->textarea($model, 'text', array('class' => 'text')); ?>
            <?php echo $form->error($model, 'text'); ?>
        </div>
    </div>

    <div class="submit">
        <input type="submit" value="Сохранить"/>
    </div>

    <?php $this->endWidget(); ?>
</div>