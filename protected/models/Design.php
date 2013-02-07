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

    public function rules()
    {
        return array(
            array('name', 'required'),
            array('video, description', 'safe'),

            array('image', 'file', 'types' => 'jpg, gif, png, bmp', 'allowEmpty' => false, 'on' => 'insert'),
            array('image', 'file', 'types' => 'jpg, gif, png, bmp', 'allowEmpty' => true, 'on' => 'update'),
        );
    }


    public function getImageUrl()
    {
        return Yii::app()->params['directory_designs'] . '/' . $this->image;
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Название дизайна',
            'video' => 'Ссылка на видео',
            'image' => 'Превью картинка',
            'description' => 'Описание'
        );
    }

    public function defaultScope()
    {
        return array(
            'order' => 'pos ASC',
        );
    }

}