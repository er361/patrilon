<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mediaData".
 *
 * @property integer $id
 * @property string $presidentPhoto
 * @property string $countryGerb
 * @property string $countryFlag
 * @property integer $Page_id
 *
 * @property Page $page
 */
class MediaData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mediaData';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Page_id'], 'required'],
            [['Page_id'], 'integer'],
            [['presidentPhoto', 'countryGerb', 'countryFlag'], 'string', 'max' => 45],
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
            'presidentPhoto' => 'President Photo',
            'countryGerb' => 'Country Gerb',
            'countryFlag' => 'Country Flag',
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
