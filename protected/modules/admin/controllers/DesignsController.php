<?php

class DesignsController extends AdminController
{
    public function actionIndex()
    {
        $this->breadcrumbs[] = array('label' => 'Дизайны', 'url' => 'designs');

        $this->render('index', array('items' => Design::model()->findAll()));
    }
}