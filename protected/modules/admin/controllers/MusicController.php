<?php

class MusicController extends AdminController
{
    public function actionIndex()
    {
        $this->breadcrumbs[] = array('label' => 'Музыка', 'url' => 'music');

        $this->render('/_list', array(
                'items' => Music::model()->findAll(),
                'header' => 'Музыка',
                'new_label' => 'Добавить музыку',
                'alias' => 'music',
            )
        );
    }

    public function actionDelete($id = 0)
    {
        $item = Music::model()->findByPk($id);

        if ($item) {
            $item->delete();
        }

        $this->redirect('/admin/musics');
    }

    public function actionSave_order()
    {
        if ($_POST) {
            foreach (Music::model()->findAll() as $item) {

                if (isset($_POST['pos'][$item->id])) {
                    $item->pos = $_POST['pos'][$item->id];
                }

                $item->visible = isset($_POST['visible'][$item->id]) ? 1 : 0;
                $item->save();
            }
        }

        $this->redirect('/admin/music');
    }


    public function actionItem($item_id = 0)
    {
        $model = $item_id == 0 ? new Music() : Music::model()->findByPk($item_id);
        if (!$model) {
            throw new CHttpException(404);
        }

        if ($_POST) {

            $model->attributes = $_POST['Music'];

            $uploaded_file = CUploadedFile::getInstance($model, 'file');
            if ($uploaded_file) {
                $old_file = $model->file;
                $model->file = $uploaded_file;
                if ($model->validate()) {

                    $filename = uniqid() . '.' . $model->file->getExtensionName();
                    $new_filename = $_SERVER['DOCUMENT_ROOT'] . Yii::app()->params['directory_music'] . DIRECTORY_SEPARATOR . $filename;

                    if ($model->file->saveAs($new_filename)) {
                        $model->file = $filename;
                    }

                    if ($model->save()) {
                        $this->redirect('/admin/music');
                    }
                }
                else{
                    $model->file = $old_file;
                }
            } else if ($model->save()) {
                $this->redirect('/admin/music');
            }
        }

        $this->breadcrumbs[] = array('url' => 'music', 'label' => 'Список музыки');
        $this->breadcrumbs[] = array('url' => '', 'label' => $model->isNewRecord ? 'Новая музыка' : 'Музыка №' . $item_id);

        $this->render("item", array('model' => $model));
    }
}