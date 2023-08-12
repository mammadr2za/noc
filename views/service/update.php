<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use richardfan\widget\JSRegister;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($service, 'user_name')->dropDownList([
   'required' => true,
   'multiple' => true
])->label('user_name') ?>

<?= $form->field($service, 'service_type')->dropDownList( [
    'required' => true,
    'multiple' => true
])->label('service_type') ?>


<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>