<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($service, 'user_name')->dropDownList($usermanagement,[
   'prompt' => 'Select Type',
   'required' => true,
])->label('user_name') ?>

<?= $form->field($service, 'service_type')->dropDownList($list, [
    'prompt' => 'Select Type',
    'required' => true,
])->label('service_type') ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>