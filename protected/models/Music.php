<?php

class Music extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'music';
    }

    public function getFileUrl()
    {
        return Yii::app()->params['directory_music'] . '/' . $this->file;
    }

}