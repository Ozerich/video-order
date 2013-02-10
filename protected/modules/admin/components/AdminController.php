<?php

class AdminController extends CController
{
    public $layout = 'main';

    public $breadcrumbs = array(
        array(
            'url' => '',
            'label' => 'Home',
            'icon' => 'home',
        )
    );

    public function beforeAction($action)
    {
        if ($action->controller->id != 'auth') {
            if (Yii::app()->user->isGuest) {
                $this->redirect('/reelconfig/auth/');
            }
        }
        return true;
    }

    protected $page_title;

}