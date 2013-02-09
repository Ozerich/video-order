<?php

class DefaultController extends AdminController
{
    public function actionIndex()
    {
        $this->redirect('/reelconfig/orders');
    }
}