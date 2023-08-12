<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-90">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-90">
<?php $this->beginBody() ?>

<header id="header" class="mb-auto">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-dark bg-dark',
            'style' => 'background-color: #333333;',
        ],
    ]);
   echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => [
        [
            'label' => 'Login/Sign up',
            'url' => ['/admin/user/login'],
            'visible' => Yii::$app->user->isGuest
        ],
        [
            'label' => 'Logout',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post'],
            'visible' => !Yii::$app->user->isGuest
        ],
        [
            'label' => 'ADD Permision',
            'url' => ['/admin/test1/view'],
            'visible' => !Yii::$app->user->isGuest
        ],
        [
            'label' => 'Create Pop_Point',
            'url' => ['/pop/create'],
            'visible' => !Yii::$app->user->isGuest
        ],
        [
            'label' => 'Create Service Type',
            'url' => ['/servicetype/create'],
            'visible' => !Yii::$app->user->isGuest
        ],
        [
            'label' => 'Create Service',
            'url' => ['/service/create'],
            'visible' => !Yii::$app->user->isGuest
        ],
    ],
]);
NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>