<div class="widget-box">
    <div class="widget-title">
                <span class="icon">
                    <i class="icon-align-justify"></i>
                </span>
        <h5><?=$model->isNewRecord ? 'Новый голос' : 'Голос №' . $model->id?></h5>
    </div>
    <div class="widget-content nopadding">
        <div class="form">
            <?php $form = $this->beginWidget('CActiveForm', array(
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data',
                'class' => 'form-horizontal'
            ),
        )); ?>

            <div class="control-group">
                <?php echo $form->labelEx($model, 'name', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model, 'name'); ?>
                    <?php echo $form->error($model, 'name'); ?>
                </div>
            </div>

            <? if($model->isNewRecord == false): ?>
            <div class="control-group">
                <label class="control-label">Текущий MP3 файл:</label>
                <div class="controls">
                    <a href="<?=$model->getFileUrl();?>" class="sm2_button"></a>
                </div>
            </div>
            <? endif; ?>

            <div class="control-group">
                <?php echo $form->labelEx($model, 'file', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?php echo $form->fileField($model, 'file'); ?>
                    <?php echo $form->error($model, 'file'); ?>
                    <span class="help-block">Допустимые расширения: mp3</span>
                </div>
            </div>

            <div class="control-group">
                <?php echo $form->labelEx($model, 'sex', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model, 'sex', array('0' => 'Женский', '1' => 'Мужской')); ?>
                    <?php echo $form->error($model, 'sex'); ?>
                </div>
            </div>


            <div class="control-group">
                <?php echo $form->labelEx($model, 'description', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textarea($model, 'description'); ?>
                    <?php echo $form->error($model, 'description'); ?>
                </div>
            </div>


            <div class="form-actions">
                <button type="submit"
                        class="btn btn-primary"><?=$model->isNewRecord ? 'Добавить' : 'Сохранить'?></button>
                <? if($model->isNewRecord): ?>
                <input type="submit" class="btn btn-primary" name="save_and_add" value="Добавить и еще раз"/>
                <? endif; ?>
            </div>
            <? $this->endWidget(); ?>
        </div>
    </div>


</div>