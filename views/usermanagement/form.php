<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="text-center d-flex justify-content-center my-2">
    <a href="<?= Yii::$app->urlManager->createUrl(['controller/login']) ?>" class="btn btn-primary">Sign In</a>
</div>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($usermanagement, 'name')->textInput(['required' => true])->label('name') ?>
<?= $form->field($usermanagement, 'family')->textInput(['required' => true])->label('family') ?>
<?= $form->field($usermanagement, 'address')->textInput(['required' => true])->label('address') ?>
<?= $form->field($usermanagement, 'email')->textInput(['required' => true])->label('email') ?>
<?= $form->field($usermanagement, 'number')->textInput(['required' => true])->label('number') ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>