<?php
use yii\grid\GridView;
use yii\helpers\Html;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'name',
        'type',
        'name_pop_point',
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a('View', ['view', 'id' => $model->id], [
                        'class' => 'btn btn-success',
                    ]);
                },
                'update' => function ($url, $model) {
                    return Html::a('Update', ['update', 'id' => $model->id], [
                        'class' => 'btn btn-primary',
                    ]);
                },
                'delete' => function ($url, $model) {
                    return Html::a('Delete', $url, [
                        'class' => 'btn btn-danger pjax-delete-link',
                        'data' => [
                            'method' => 'post',
                            'confirm' => 'آیا از حذف این مورد اطمینان دارید؟',
                            'pjax-container' => 'my_pjax',
                            'params' => [
                                'id' => $model->id // شناسه رکورد
                            ]
                        ]
                    ]);
                },
            ]
        ],
    ],
    'tableOptions' => [
        'class' => 'table table-bordered table-hover',
    ],
]);
?>
<?= Html::a('Create', ['create'], ['class' => 'btn btn-primary']) ?>