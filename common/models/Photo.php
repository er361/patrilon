<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Photo".
 *
 * @property integer $id
 * @property string $title
 * @property string $desc
 * @property string $photoUrl
 * @property integer $Page_id
 * @property integer $PhotoCategory_id
 *
 * @property Page $page
 * @property PhotoCategory $photoCategory
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'desc', 'photoUrl', 'Page_id'], 'required'],
            [['desc'], 'string'],
            [['Page_id', 'PhotoCategory_id'], 'integer'],
            [['title', 'photoUrl'], 'string', 'max' => 45],
            [['Page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['Page_id' => 'id']],
            [['PhotoCategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => PhotoCategory::className(), 'targetAttribute' => ['PhotoCategory_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'desc' => 'Desc',
            'photoUrl' => 'Photo Url',
            'Page_id' => 'Page ID',
            'PhotoCategory_id' => 'Photo Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'Page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotoCategory()
    {
        return $this->hasOne(PhotoCategory::className(), ['id' => 'PhotoCategory_id']);
    }
}
