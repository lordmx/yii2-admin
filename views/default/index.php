<?php

use dee\angular\NgView;
use mdm\admin\Module;
use yii\web\View;
use yii\helpers\Url;

/* @var $this View */
$this->title= Yii::t('rbac-admin', 'RBAC Manager');
/** @var Module $module */
$module = $this->context->module;
?>
<div ng-app="dAdmin">
    <ul class="nav nav-tabs">
        <li ng-repeat="menu in headerMenu" ng-class="{active:isRouteActive(menu.id)}">
            <a ng-href="{{menu.url}}" ng-bind="menu.label"></a>
        </li>
    </ul>
    <div style="padding-bottom: 10px;"></div>
    <?=
    NgView::widget([
        'name' => 'dAdmin',
        'requires' => ['ui.bootstrap', 'ngResource', 'dee.ui'],
        'routes' => [
            '/' => [
                'redirectTo' => '/assignment',
            ],
            '/assignment' => [
                'view' => 'assignment/index',
                'js' => 'assignment/index.js',
                'injection' => ['Assignment'],
                'visible' => $module->isRouteVisible('assignment'),
            ],
            '/assignment/:id' => [
                'view' => 'assignment/view',
                'js' => 'assignment/view.js',
                'injection' => ['Assignment'],
                'visible' => $module->isRouteVisible('assignment'),
            ],
            '/role' => [
                'view' => 'role/index',
                'js' => 'role/index.js',
                'injection' => ['Item'],
                'visible' => $module->isRouteVisible('role'),
            ],
            '/role/:id*' => [
                'view' => 'role/view',
                'js' => 'role/view.js',
                'injection' => ['Item'],
                'visible' => $module->isRouteVisible('role'),
            ],
            '/role/form' => [              // modal
                'visible' => false,
                'view' => 'role/form',
                'js' => 'role/form.js',
                'injection' => ['$modalInstance', 'type', 'Item', 'Rule']
            ],
            '/permission' => [
                'view' => 'permission/index',
                'js' => 'permission/index.js',
                'injection' => ['Item'],
                'visible' => $module->isRouteVisible('permission'),
            ],
            '/permission/:id*' => [
                'view' => 'permission/view',
                'js' => 'permission/view.js',
                'injection' => ['Item'],
                'visible' => $module->isRouteVisible('permission'),
            ],
            '/rule' => [
                'view' => 'rule/index',
                'js' => 'rule/index.js',
                'injection' => ['Rule'],
                'visible' => $module->isRouteVisible('rule'),
            ],
            '/rule/form' => [              // modal
                'visible' => false,
                'view' => 'rule/form',
                'js' => 'rule/form.js',
                'injection' => ['$modalInstance', 'item', 'Rule']
            ],
            '/rule/view' => [
                'visible' => false,
                'view' => 'rule/view',
                'js' => 'rule/view.js',
                'injection' => ['$modalInstance', 'name', 'Rule']
            ],
            '/route' => [
                'view' => 'route/index',
                'js' => 'route/index.js',
                'injection' => ['Route'],
                'visible' => $module->isRouteVisible('route'),
            ],
            '/route/form' => [              // modal
                'visible' => false,
                'view' => 'route/form',
                'js' => 'route/form.js',
                'injection' => ['$modalInstance', 'Route']
            ],
            '/menu' => [
                'view' => 'menu/index',
                'js' => 'menu/index.js',
                'injection' => ['Menu'],
                'visible' => $module->isRouteVisible('menu'),
            ],
            '/menu/form' => [               // modal
                'visible' => false,
                'view' => 'menu/form',
                'js' => 'menu/form.js',
                'injection' => ['$modalInstance', 'Menu', 'model']
            ],
            '/error/404' => [
                'view' => 'error/404',
            ],
            'otherwise' => [
                'link' => '/error/404',
            ],
        ],
        'js' => 'index.js',
        'useNgApp' => false,
        'clientOptions' => [
            'currentUrl' => rtrim(Url::to(['']), '/'),
            'headerMenus' => $module->getHeaderMenus(),
        ]
    ]);
    ?>
</div>
<?php
$css = <<<CSS
.box-solid .form-control-feedback{
    color: #444;
}
CSS;
$this->registerCss($css);
