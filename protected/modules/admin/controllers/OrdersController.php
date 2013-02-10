<?php

class OrdersController extends AdminController
{
    public function actionIndex()
    {
        if (isset($_POST['delete_all'])) {
            if (isset($_POST['check'])) {
                foreach ($_POST['check'] as $ind => $t) {
                    $item = Order::model()->findByPk($ind);
                    $item->delete();
                }
            }
        }

        $this->breadcrumbs[] = array('label' => 'Заказы', 'url' => 'orders');

        $this->render('index', array('items' => Order::model()->findAll()));
    }

    public function actionDelete($id = 0)
    {
        $item = Order::model()->findByPk($id);

        if ($item) {
            $item->delete();
        }

        $this->redirect('/reelconfig/orders');
    }


    public function actionItem($item_id = 0)
    {
        $model = Order::model()->findByPk($item_id);
        if (!$model) {
            throw new CHttpException(404);
        }

        $this->page_title = "№".$model->id.", ".$model->email.", ";

        $this->breadcrumbs[] = array('url' => 'orders', 'label' => 'Все заказы');
        $this->breadcrumbs[] = array('url' => '', 'label' => 'Заказ №' . $item_id);

        $this->render("item", array('model' => $model));
    }


}