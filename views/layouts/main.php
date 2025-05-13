<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;

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
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        body, html {
            height: 100%;
        }
        #sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }
        .nav-link {
            color: #ffffff;
        }
        .nav-link:hover {
            background-color: #495057;
        }
    </style>
</head>
<body class="d-flex">
<?php $this->beginBody() ?>

<!-- Sidebar -->
<div id="sidebar" class="p-3 col-md-2 d-flex flex-column">
    <h4 class="text-white"><?= Html::encode(Yii::$app->name) ?></h4>
    <?= Nav::widget([
        'options' => ['class' => 'nav flex-column'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'nav-link']],
            ['label' => 'About', 'url' => ['/site/about'], 'linkOptions' => ['class' => 'nav-link']],
            ['label' => 'Contact', 'url' => ['/site/contact'], 'linkOptions' => ['class' => 'nav-link']],
            ['label' => 'Menu Empleados', 'url' => ['/empleado/index'], 'linkOptions' => ['class' => 'nav-link'],
                'items' => [
                    ['label' => 'Empleado', 'url' => ['/empleado/index']],
                    ['label' => 'Empleado detalles', 'url' => ['/empleado-detalles/index']],
                  
                ],
                'visible' => !Yii::$app->user->isGuest,
            ],
            ['label' => 'Configuraciones', 'url' => ['/empleado/index'], 'linkOptions' => ['class' => 'nav-link'],
                'items' => [
                    ['label' => 'Tipo contrato', 'url' => ['/tipo-contrato/index']],
                    ['label' => 'Departamento', 'url' => ['/departamento/index']],
                    ['label' => 'Horario de trabajo', 'url' => ['/horario-trabajo/index']],
                    ['label' => 'Dias Trabajo', 'url' => ['/horario-dia/index']],
                ],
                'visible' => !Yii::$app->user->isGuest,
            ],
            /*[
                'label' => 'Gestión',
                'items' => [
                    ['label' => 'Usuarios', 'url' => ['/usuario/index']],
                    ['label' => 'Empleados', 'url' => ['/empleado/index']],
                    ['label' => 'Roles', 'url' => ['/rol/index']],
                ]
            ],*/
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login'], 'linkOptions' => ['class' => 'nav-link']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link text-white logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]) ?>
</div>

<!-- Contenido principal -->
<div class="flex-grow-1 d-flex flex-column">
    <main id="main" class="flex-shrink-0 p-4" role="main">
        <div class="container-fluid">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container-fluid">
            <div class="row text-muted">
                <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
                <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
            </div>
        </div>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
