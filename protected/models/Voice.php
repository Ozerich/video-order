<?php

class Voice extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'voices';
    }

    public function getFileUrl()
    {
        return Yii::app()->params['directory_voices'] . '/' . $this->file;
    }

}