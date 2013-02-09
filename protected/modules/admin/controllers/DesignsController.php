<?php

class DesignsController extends AdminController
{
    public function actionIndex()
    {

        if ($_POST) {

            if (isset($_POST['save_order'])) {
                foreach (Design::model()->findAll() as $design) {

                    if (isset($_POST['pos'][$design->id])) {
                        $design->pos = $_POST['pos'][$design->id];
                    }

                    $design->visible = isset($_POST['visible'][$design->id]) ? 1 : 0;
                    $design->save();
                }
            }

            if (isset($_POST['delete_all'])) {
                if (isset($_POST['check'])) {
                    foreach ($_POST['check'] as $ind => $t) {
                        $design = Design::model()->findByPk($ind);
                        $design->delete();
                    }
                }
            }

            $this->redirect('/reelconfig/designs');
        }

        $this->breadcrumbs[] = array('label' => 'Дизайны', 'url' => 'designs');

        $this->render('/_list', array(
                'items' => Design::model()->findAll(),
                'header' => 'Дизайны',
                'new_label' => 'Добавить дизайн',
                'alias' => 'designs',
            )
        );
    }

    public function actionDelete($id = 0)
    {
        $item = Design::model()->findByPk($id);

        if ($item) {
            $item->delete();
        }

        $this->redirect('/reelconfig/designs');
    }


    public function actionItem($item_id = 0)
    {
        $model = $item_id == 0 ? new Design() : Design::model()->findByPk($item_id);
        if (!$model) {
            throw new CHttpException(404);
        }

        if ($_POST) {
            $model->attributes = $_POST['Design'];

            $uploadedFile = CUploadedFile::getInstance($model, 'image');

            if ($uploadedFile) {

                $filename = uniqid() . '.' . $uploadedFile->getExtensionName();

                $new_filename = $_SERVER['DOCUMENT_ROOT'] . Yii::app()->params['directory_designs'] . DIRECTORY_SEPARATOR . $filename;

                if ($uploadedFile->saveAs($new_filename)) {

                    $image = Yii::app()->image->load($new_filename);
                    $image->resize(182, 102);
                    $image->save();

                    $model->image = $filename;
                }
            }

            if ($model->isNewRecord) $model->visible = 1;

            if ($model->save()) {
                $this->redirect(isset($_POST['save_and_add']) ? '/reelconfig/designs/add' : '/reelconfig/designs');
            }
        }

        $this->breadcrumbs[] = array('url' => 'designs', 'label' => 'Дизайны');
        $this->breadcrumbs[] = array('url' => '', 'label' => $model->isNewRecord ? 'Новый дизайн' : 'Дизайн №' . $item_id);

        $this->render("item", array('model' => $model));
    }


}