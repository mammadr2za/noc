<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use richardfan\widget\JSRegister;

?>

<?php JSRegister::begin(); ?>
<script>
    $('#servicetype-type').change(function () {
        if ($('#servicetype-type').val() == 'pop') {
            $.ajax({
                type: "GET",
                url: '<?php echo yii\helpers\Url::to(['/servicetype/pop']); ?>',
                dataType: "json",
                success: function (data) {
                    var options = '';
                    $.each(data, function (key, value) {
                        options += "<option value='" + key + "'>" + value + "</option>";
                    });
                    $('#servicetype-name_pop_point').html(options);
                    $('.field-servicetype-name_pop_point').show();
                }
            });
        } else if ($('#servicetype-type').val() == 'point') {
            $.ajax({
                type: "GET",
                url: '<?php echo yii\helpers\Url::to(['/servicetype/point']); ?>',
                dataType: "json",
                success: function (data) {
                    var options = '';
                    $.each(data, function (key, value) {
                        options += "<option value='" + key + "'>" + value + "</option>";
                    });
                    $('#servicetype-name_pop_point').html(options);
                    $('.field-servicetype-name_pop_point').show();
                }
            });
        }
    });
    if ($('#servicetype-type').val() == '') {
        $('.field-servicetype-name_pop_point').hide();
        $('#servicetype-name_pop_point').val('').trigger('change');
    } else {
        $('.field-servicetype-name_pop_point').show();
    } 
</script>
<?php JSRegister::end(); ?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($servicetype, 'name')->textInput(['required' => true])->label('Name') ?>

<?= $form->field($servicetype, 'type')->dropDownList([
    'pop' => 'Pop',
    'point' => 'Point'
], [
    'prompt' => 'Select Type',
    'required' => true
])->label('type') ?>

<?= $form->field($servicetype, 'name_pop_point')->dropDownList($popPointDropDown, [
    'required' => true,
    'multiple' => true
])->label('name_pop_point') ?>


<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>