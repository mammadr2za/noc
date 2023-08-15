<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($usermanagement, 'name')->textInput(['required' => true])->label('name') ?>
<?= $form->field($usermanagement, 'family')->textInput(['required' => true])->label('family') ?>
<?= $form->field($usermanagement, 'address')->textInput(['required' => true])->label('address') ?>
<?= $form->field($usermanagement, 'email')->textInput(['required' => true])->label('email') ?>
<?= $form->field($usermanagement, 'number')->textInput(['required' => true])->label('number') ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>