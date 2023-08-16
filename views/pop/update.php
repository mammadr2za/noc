<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($pop, 'name')->textInput(['required' => true])->label('name') ?>
<?= $form->field($pop, 'type')->dropDownList(['pop' => 'pop', 'point' => 'point'], ['prompt' => 'Select Type', 'required' => true])->label('Type') ?>

<div class="form-group">
    <?= Html::submitButton('save', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>