<?php

class Design extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'designs';
    }


    public function getImageUrl()
    {
        return Yii::app()->params['directory_designs'] . '/' . $this->image;
    }

}