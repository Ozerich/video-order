<?php

class AuthController extends AdminController
{
    public function actionIndex()
    {
        if ($_POST) {

            $password = $_POST['password'];

            $identity = new UserIdentity($password);
            $identity->authenticate();
            Yii::app()->user->login($identity);

            if ($identity->errorCode === UserIdentity::ERROR_NONE) {
                echo json_encode(array(
                    'error' => 0,
                    'url' => '/admin/'
                ));
            } else {
                echo json_encode(array(
                    'error' => 1,
                    'url' => ''
                ));
            }

            Yii::app()->end();
        }

        $this->layout = "none";
        $this->render('index');
    }
}