<?php

class SiteController extends CController
{
    public $layout = 'site';

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionLoad()
    {

        $designs = array();
        foreach (Design::model()->findAll() as $design) {
            $designs[] = array(
                'ID' => $design->id,
                'Name' => $design->name,
                'Image' => $design->getImageUrl(),
                'Video' => $design->video
            );
        }

        $voices = array();
        foreach (Voice::model()->findAll() as $voice) {
            $voices[] = array(
                'ID' => $voice->id,
                'Name' => $voice->name,
                'File' => $voice->getFileUrl(),
                'Sex' => $voice->sex
            );
        }

        $music = array();
        foreach (Music::model()->findAll() as $_music) {
            $music[] = array(
                'ID' => $_music->id,
                'Name' => $_music->name,
                'File' => $_music->getFileUrl(),
            );
        }

        $data = array(
            'Designs' => $designs,
            'Voices' => $voices,
            'Music' => $music,
            'Session' => uniqid(),
        );

        echo json_encode($data);
        die;
    }


    public function actionUpload_mp3()
    {
        $result = array(
            'file' => '',
            'error' => ''
        );

        $model = new UploadForm('music');

        $model->image = CUploadedFile::getInstance($model, 'image');

        if (!$model->image) {
            $result['error'] = 'Ошибка загрузки звукового файла';
        } else {

            $result['file'] = Yii::app()->params['directory_tmp'] . "/" . uniqid() . "." . $model->image->getExtensionName();
            $model->image->saveAs($_SERVER['DOCUMENT_ROOT'] . $result['file']);

        }
        echo json_encode($result);
        die;
    }

    public function actionUpload()
    {
        $result = array(
            'error' => '',
            'preview_image' => '1',
            'image' => '2',
        );


        $model = new UploadForm('image');
        $model->image = CUploadedFile::getInstance($model, 'image');
        if (!$model->image) {
            $result['error'] = 'Ошибка загрузки фотографии';
        } else {

            $result['image'] = Yii::app()->params['directory_tmp'] . "/" . uniqid() . "." . $model->image->getExtensionName();
            $result['preview_image'] = Yii::app()->params['directory_tmp'] . "/" . uniqid() . "." . $model->image->getExtensionName();

            $model->image->saveAs($_SERVER['DOCUMENT_ROOT'] . $result['image']);

            $image = Yii::app()->image->load($_SERVER['DOCUMENT_ROOT'] . $result['image']);
            $image->resize(236, 132, 1);
            $image->save($_SERVER['DOCUMENT_ROOT'] . $result['preview_image']);
        }
        echo json_encode($result);
        die;
    }
}