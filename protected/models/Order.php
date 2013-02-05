<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property string $id
 * @property integer $design_id
 * @property integer $voice_id
 * @property integer $music_id
 * @property integer $music_file
 * @property string $email
 * @property string $name
 * @property string $information
 * @property string $created
 */
class Order extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'orders';
    }

    public function rules()
    {
        return array(
            array('created', 'default', 'value' => new CDbExpression('NOW()'), 'setOnEmpty' => false, 'on' => 'insert')
        );
    }

    public function relations()
    {
        return array();
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'design_id' => 'Design',
            'voice_id' => 'Voice',
            'music_id' => 'Music',
            'music_file' => 'Music File',
            'email' => 'Email',
            'name' => 'Name',
            'information' => 'Information',
            'created' => 'Created',
        );
    }
}