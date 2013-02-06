<?php

class OrdersController extends AdminController
{
    public function actionIndex()
    {
        $this->breadcrumbs[] = array('label' => 'Заказы', 'url' => 'orders');

        $this->render('index', array('orders' => Design::model()->findAll()));
    }
}