<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Page".
 *
 * @property integer $id
 * @property string $countryName
 * @property double $lat
 * @property double $lng
 * @property integer $zoom
 * @property string $firstName
 * @property string $lastName
 * @property string $currency
 * @property string $nation
 * @property string $capital
 * @property integer $Category_id
 *
 * @property Category $category
 * @property Photo[] $photos
 * @property Slides[] $slides
 * @property MediaData[] $mediaDatas
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['countryName', 'lat', 'lng', 'zoom', 'firstName', 'lastName', 'currency', 'nation', 'capital'], 'required'],
            [['lat', 'lng'], 'number'],
            [['zoom', 'Category_id'], 'integer'],
            [['countryName', 'firstName', 'lastName', 'currency', 'nation', 'capital'], 'string', 'max' => 45],
            [['Category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['Category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'countryName' => 'Country Name',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'zoom' => 'Zoom',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'currency' => 'Currency',
            'nation' => 'Nation',
            'capital' => 'Capital',
            'Category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'Category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['Page_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlides()
    {
        return $this->hasMany(Slides::className(), ['Page_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMediaDatas()
    {
        return $this->hasMany(MediaData::className(), ['Page_id' => 'id']);
    }
}
