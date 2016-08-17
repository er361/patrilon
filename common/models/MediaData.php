<?php

namespace common\models;

use Yii;
use yii\base\Exception;
use yii\web\ServerErrorHttpException;
use yii\web\UploadedFile;

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
    public $file_presidentPhoto;
    public $file_countryFlag;
    public $file_countryGerb;
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
            [['file_presidentPhoto', 'file_countryGerb', 'file_countryFlag'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg'],
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
    public function setInstances(){
        $this->file_presidentPhoto = UploadedFile::getInstance($this,'file_presidentPhoto');
        $this->file_countryGerb = UploadedFile::getInstance($this,'file_countryGerb');
        $this->file_countryFlag = UploadedFile::getInstance($this,'file_countryFlag');
    }
    public function loadFiles(){
        $this->presidentPhoto = $this->file_presidentPhoto->baseName . '.' . $this->file_presidentPhoto->extension;
        $this->countryFlag = $this->file_countryFlag->baseName . '.' . $this->file_countryFlag->extension;
        $this->countryGerb = $this->file_countryGerb->baseName . '.' . $this->file_countryGerb->extension;
    }
    public function UploadFiles(){
        try{
            $this->file_countryFlag->saveAs('uploads/'. $this->file_countryFlag->baseName . '.' . $this->file_countryFlag->extension);
            $this->file_countryGerb->saveAs('uploads/'. $this->file_countryGerb->baseName . '.' . $this->file_countryGerb->extension);
            $this->file_presidentPhoto->saveAs('uploads/'. $this->file_presidentPhoto->baseName . '.' . $this->file_presidentPhoto->extension);
        }catch (Exception $e){
            throw new ServerErrorHttpException('не удалось сохранить файлы на диск',500,$e);
        }

    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'Page_id']);
    }
}
