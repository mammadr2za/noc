<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $servicetype,
    'attributes' => [
        [
            'attribute' => 'name',
            'label' => 'Service Name',
        ],
        [
            'attribute' => 'type',
            'label' => 'Service Type',
        ],
        [
            'attribute' => 'name_pop_point',
            'label' => 'Service Pop/Point',
        ],
    ],
]);
?>
<div class="form-group">
    <button onclick="history.back()" class="btn btn-primary">Back to list</button>
</div>