<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "PhotoCategory".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Photo[] $photos
 */
class PhotoCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PhotoCategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 45],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['PhotoCategory_id' => 'id']);
    }
}
