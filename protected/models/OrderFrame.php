<?php

/**
 * This is the model class for table "order_frames".
 *
 * The followings are the available columns in table 'order_frames':
 * @property string $id
 * @property integer $order_id
 * @property string $text
 * @property string $speaker_text
 * @property string $image
 * @property string $preview_image
 */
class OrderFrame extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'order_frames';
	}


	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id' => 'Order',
			'text' => 'Text',
			'speaker_text' => 'Speaker Text',
			'image' => 'Image',
			'preview_image' => 'Preview Image',
		);
	}

}