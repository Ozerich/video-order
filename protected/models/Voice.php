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

    public function defaultScope()
    {
        return array(
            'order' => 'pos ASC',
        );
    }


    public function attributeLabels()
    {
        return array(
            'name' => 'Название голоса',
            'file' => 'MP3 файл',
            'sex' => 'Тип'
        );
    }

    public function rules()
    {
        return array(
            array('name, sex', 'required'),

            array('file', 'file', 'types' => 'mp3', 'allowEmpty' => false, 'on' => 'insert'),
            array('file', 'file', 'types' => 'mp3', 'allowEmpty' => true, 'on' => 'update'),
        );
    }

}