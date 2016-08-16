<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $category common\models\Category */
/* @var $mediaData common\models\MediaData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>
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

        <?= $form->field($model, 'Category_id')->dropDownList(\common\models\Category::find()->select('title','id')->indexBy('id')->column(), ['prompt' => 'Выберите категорию']) ?>
    </div>
    <div class="col-md-6">
        <? $options = [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => ['showUpload' => false]
        ] ?>
        <?= $form->field($mediaData, 'presidentPhoto')->widget(\kartik\file\FileInput::className(),$options)?>

        <?= $form->field($mediaData, 'countryGerb')->widget(\kartik\file\FileInput::className(),$options)?>

        <?= $form->field($mediaData, 'countryFlag')->widget(\kartik\file\FileInput::className(),$options)?>
    </div>
</div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
