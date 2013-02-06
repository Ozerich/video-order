<?php

class MusicController extends AdminController
{
    public function actionIndex()
    {
        $this->breadcrumbs[] = array('label' => 'Музыка', 'url' => 'music');

        $this->render('index', array('items' => Music::model()->findAll()));
    }
}