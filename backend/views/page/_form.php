<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $category common\models\Category */
/* @var $mediaData common\models\MediaData */
/* @var $form kartik\form\ActiveForm*/
?>

<div class="page-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'countryName')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'lat')->textInput() ?>

        <?= $form->field($model, 'lng')->textInput() ?>

        <?= $form->field($model, 'zoom')->textInput() ?>

        <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nation')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'capital')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'Category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Category::find()->all(),'id','title'), ['prompt' => 'Выберите категорию']) ?>
    </div>
    <div class="col-md-6">
        <? $options = [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => ['showUpload' => false]
        ] ?>
        <?= $form->field($mediaData, 'file_countryGerb')->widget(\kartik\file\FileInput::className(),$options)?>
        <?= $form->field($mediaData, 'file_countryFlag')->widget(\kartik\file\FileInput::className(),$options)?>
        <?= $form->field($mediaData, 'file_presidentPhoto')->widget(\kartik\file\FileInput::className(),$options)?>

    </div>
</div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
