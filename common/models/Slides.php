<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Slides".
 *
 * @property integer $id
 * @property string $picUrl
 * @property integer $Page_id
 *
 * @property Page $page
 */
class Slides extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Slides';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Page_id'], 'required'],
            [['Page_id'], 'integer'],
            [['picUrl'], 'string', 'max' => 45],
            [['Page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['Page_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'picUrl' => 'Pic Url',
            'Page_id' => 'Page ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'Page_id']);
    }
}
