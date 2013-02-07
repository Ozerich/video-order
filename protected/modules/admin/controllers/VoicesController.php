<?php

class VoicesController extends AdminController
{
    public function actionIndex()
    {
        $this->breadcrumbs[] = array('label' => 'Голосы', 'url' => 'Голосы');

        $this->render('/_list', array(
                'items' => Voice::model()->findAll(),
                'header' => 'Голоса',
                'new_label' => 'Добавить голос',
                'alias' => 'voices',
            )
        );
    }

    public function actionDelete($id = 0)
    {
        $item = Voice::model()->findByPk($id);

        if ($item) {
            $item->delete();
        }

        $this->redirect('/admin/voices');
    }

    public function actionSave_order()
    {
        if ($_POST) {
            foreach (Voice::model()->findAll() as $item) {

                if (isset($_POST['pos'][$item->id])) {
                    $item->pos = $_POST['pos'][$item->id];
                }

                $item->visible = isset($_POST['visible'][$item->id]) ? 1 : 0;
                $item->save();
            }
        }

        $this->redirect('/admin/voices');
    }


    public function actionItem($item_id = 0)
    {
        $model = $item_id == 0 ? new Voice() : Voice::model()->findByPk($item_id);
        if (!$model) {
            throw new CHttpException(404);
        }

        if ($_POST) {

            $model->attributes = $_POST['Voice'];

            $uploaded_file = CUploadedFile::getInstance($model, 'file');
            if ($uploaded_file) {
                $old_file = $model->file;
                $model->file = $uploaded_file;
                if ($model->validate()) {

                    $filename = uniqid() . '.' . $model->file->getExtensionName();
                    $new_filename = $_SERVER['DOCUMENT_ROOT'] . Yii::app()->params['directory_voices'] . DIRECTORY_SEPARATOR . $filename;

                    if ($model->file->saveAs($new_filename)) {
                        $model->file = $filename;
                    }

                    if ($model->save()) {
                        $this->redirect('/admin/voices');
                    }
                }
                else{
                    $model->file = $old_file;
                }
            } else if ($model->save()) {
                $this->redirect('/admin/voices');
            }
        }

        $this->breadcrumbs[] = array('url' => 'music', 'label' => 'Голоса');
        $this->breadcrumbs[] = array('url' => '', 'label' => $model->isNewRecord ? 'Новый голос' : 'Голос №' . $item_id);

        $this->render("item", array('model' => $model));
    }
}