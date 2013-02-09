<?php

class VoicesController extends AdminController
{
    public function actionIndex()
    {
        if (isset($_POST['save_order'])) {
            foreach (Voice::model()->findAll() as $item) {

                if (isset($_POST['pos'][$item->id])) {
                    $item->pos = $_POST['pos'][$item->id];
                }

                $item->visible = isset($_POST['visible'][$item->id]) ? 1 : 0;
                $item->save();
            }
        }

        if (isset($_POST['delete_all'])) {
            if (isset($_POST['check'])) {
                foreach ($_POST['check'] as $ind => $t) {
                    $item = Voice::model()->findByPk($ind);
                    $item->delete();
                }
            }
        }


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

        $this->redirect('/reelconfig/voices');
    }


    public function actionItem($item_id = 0)
    {
        $model = $item_id == 0 ? new Voice() : Voice::model()->findByPk($item_id);
        if (!$model) {
            throw new CHttpException(404);
        }

        if ($_POST) {

            $model->attributes = $_POST['Voice'];

            if ($model->isNewRecord) $model->visible = 1;

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
                        $this->redirect(isset($_POST['save_and_add']) ? '/reelconfig/voices/add' : '/reelconfig/voices');
                    }
                }
                else{
                    $model->file = $old_file;
                }
            } else if ($model->save()) {
                $this->redirect(isset($_POST['save_and_add']) ? '/reelconfig/voices/add' : '/reelconfig/voices');
            }
        }

        $this->breadcrumbs[] = array('url' => 'music', 'label' => 'Голоса');
        $this->breadcrumbs[] = array('url' => '', 'label' => $model->isNewRecord ? 'Новый голос' : 'Голос №' . $item_id);

        $this->render("item", array('model' => $model));
    }
}