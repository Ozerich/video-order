<?php

class OrdersController extends AdminController
{
    public function actionIndex()
    {
        $this->breadcrumbs[] = array('label' => 'Заказы', 'url' => 'orders');

        $this->render('index', array('items' => Order::model()->findAll()));
    }

    public function actionDelete($id = 0)
    {
        $item = Order::model()->findByPk($id);

        if ($item) {
            $item->delete();
        }

        $this->redirect('/admin/orders');
    }


    public function actionItem($item_id = 0)
    {
        $model = Order::model()->findByPk($item_id);
        if (!$model) {
            throw new CHttpException(404);
        }

        $this->breadcrumbs[] = array('url' => 'orders', 'label' => 'Все заказы');
        $this->breadcrumbs[] = array('url' => '', 'label' => 'Заказ №' . $item_id);

        $this->render("item", array('model' => $model));
    }


}