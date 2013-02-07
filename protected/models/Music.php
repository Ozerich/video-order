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


    public function defaultScope()
    {
        return array(
            'order' => 'pos ASC',
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Название музыки',
            'file' => 'MP3 файл',
        );
    }

    public function rules()
    {
        return array(
            array('name', 'required'),

            array('file', 'file', 'types' => 'mp3', 'allowEmpty' => false, 'on' => 'insert'),
            array('file', 'file', 'types' => 'mp3', 'allowEmpty' => true, 'on' => 'update'),
        );
    }
}