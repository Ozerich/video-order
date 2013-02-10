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
 * @property string $hash
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
        return array(
            'frames' => array(self::HAS_MANY, 'OrderFrame', 'order_id'),
            'voice' => array(self::BELONGS_TO, 'Voice', 'voice_id'),
            'design' => array(self::BELONGS_TO, 'Design', 'design_id'),
            'music' => array(self::BELONGS_TO, 'Music', 'music_id')
        );
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

    public function defaultScope()
    {
        return array(
            'order' => 'created DESC',
        );
    }

    public function afterFind()
    {
        $this->created = date('d.m.Y H:i', strtotime($this->created));
        $this->music_file = $this->music_file ? Yii::app()->params['directory_user_uploads'] . '/' . $this->music_file : '';
    }

    public function beforeSave()
    {
        if ($this->isNewRecord) {
            $this->created = new CDbExpression('NOW()');
            $this->hash = md5(uniqid() . uniqid());
        }

        return parent::beforeSave();
    }


    public function getPublicLink()
    {
        return $this->hash ? 'http://'.$_SERVER['HTTP_HOST'] . '/order/' . $this->hash : '';
    }

}