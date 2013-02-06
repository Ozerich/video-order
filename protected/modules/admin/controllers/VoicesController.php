<?php

class VoicesController extends AdminController
{
    public function actionIndex()
    {
        $this->breadcrumbs[] = array('label' => 'Голосы', 'url' => 'Голосы');

        $this->render('index', array('items' => Voice::model()->findAll()));
    }
}