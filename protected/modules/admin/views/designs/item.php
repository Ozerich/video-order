<div class="widget-box">
        <div class="widget-title">
                <span class="icon">
                    <i class="icon-align-justify"></i>
                </span>
            <h5><?=$model->isNewRecord ? 'Новый дизайн' : 'Дизайн №'.$model->id?></h5>
        </div>
        <div class="widget-content nopadding">
            <div class="form">
                <?php $form = $this->beginWidget('CActiveForm', array(
                'id' => 'project_form',
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
                    <label class="control-label">Текущая фотография:</label>
                    <div class="controls">
                        <img src="<?=$model->getImageUrl();?>"/>
                    </div>
                </div>
                <? endif; ?>

                <div class="control-group">
                    <?php echo $form->labelEx($model, 'image', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->fileField($model, 'image'); ?>
                        <?php echo $form->error($model, 'image'); ?>
                        <span class="help-block">Размеры 182x102</span>
                    </div>
                </div>
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'video', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model, 'video'); ?>
                        <?php echo $form->error($model, 'video'); ?>
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
                    <button type="submit" class="btn btn-primary"><?=$model->isNewRecord ? 'Добавить' : 'Сохранить'?></button>
                </div>
                <? $this->endWidget(); ?>
        </div>
    </div>


</div>