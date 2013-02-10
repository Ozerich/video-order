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
        foreach (Design::model()->findAllByAttributes(array('visible' => 1)) as $design) {
            $designs[] = array(
                'ID' => $design->id,
                'Name' => $design->name,
                'Image' => $design->getImageUrl(),
                'Video' => $design->video
            );
        }

        $voices = array();
        foreach (Voice::model()->findAllByAttributes(array('visible' => 1)) as $voice) {
            $voices[] = array(
                'ID' => $voice->id,
                'Name' => $voice->name,
                'File' => $voice->getFileUrl(),
                'Sex' => $voice->sex
            );
        }

        $music = array();
        foreach (Music::model()->findAllByAttributes(array('visible' => 1)) as $_music) {
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


    private function processFile($file, $prefix = "")
    {
        if (empty($file)) return '';

        $old_file = $_SERVER['DOCUMENT_ROOT'] . $file;

        if (!file_exists($old_file)) return "";

        if (strlen($prefix) == 2) $prefix = "0" . $prefix;
        if (strlen($prefix) == 1) $prefix = "00" . $prefix;

        $filename = ($prefix ? $prefix . "_____________" : "") . substr($old_file, strrpos($old_file, '/') + 1);
        $new_file = $_SERVER['DOCUMENT_ROOT'] . '/' . Yii::app()->params['directory_user_uploads'] . '/' . $filename;

        if (copy($old_file, $new_file)) {
            unlink($old_file);
        } else {
            return "";
        }

        return $filename;
    }


    public function actionSave()
    {
        $order = new Order;

        $order->design_id = Yii::app()->request->getPost('Design');
        $order->voice_id = Yii::app()->request->getPost('Voice');
        $order->music_id = Yii::app()->request->getPost('Music');
        $order->music_file = $this->processFile(Yii::app()->request->getPost('Music_File'));
        $order->email = Yii::app()->request->getPost('Email');
        $order->name = Yii::app()->request->getPost('Name');
        $order->information = Yii::app()->request->getPost('Information');

        $order->save();

        if (isset($_POST['Frames'])) {
            foreach ($_POST['Frames'] as $num => $_frame) {
                $frame = new OrderFrame();

                $frame->order_id = $order->id;

                $frame->text = $_frame['Text'];
                $frame->speaker_text = $_frame['Speaker_Text'];
                $frame->image = $this->processFile($_frame['Image'], $num + 1);
                $frame->preview_image = $this->processFile($_frame['Preview'], $num + 1);

                $frame->save();
            }
        }

        $emails = Yii::app()->params['notification_emails'];
        $emails = is_array($emails) ? $emails : array($emails);

        $message = new YiiMailMessage;

        $message->subject = 'Новый заказ';
        $message->view = 'new_order_to_admin';
        $message->from = Yii::app()->params['site_email'];

        foreach ($emails as $email) {
            $message->addTo($email);
        }

        $message->setBody(array('order' => $order), 'text/html');

        Yii::app()->mail->send($message);

        $message = new YiiMailMessage;

        $message->subject = 'Новый заказ';
        $message->view = 'new_order_to_customer';
        $message->from = Yii::app()->params['site_email'];

        $message->addTo($order->email);

        $message->setBody(array('order' => $order), 'text/html');
        Yii::app()->mail->send($message);

        Yii::app()->end();
    }


    public function actionOrder($hash = "")
    {

        $order = Order::model()->findByAttributes(array('hash' => $hash));
        if (!$order) {
            throw new CHttpException(404);
        }

        $this->render('order', array('order' => $order));
    }
}