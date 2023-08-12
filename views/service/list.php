<?php
use yii\grid\GridView;
use yii\helpers\Html;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'user_name',
        'service_type',
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'template' => ' {update} {delete}',
            'buttons' => [
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