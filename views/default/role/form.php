<?php

use yii\web\View;
use dee\angular\NgView;

//use yii\helpers\Html;

/* @var $this View */
/* @var $widget NgView */

?>
<div class="box box-solid box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{model.type==1?'Role':'Permission'}}</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" ng-click="cancel()"><span class="fa fa-remove"></span></button>
        </div>
    </div>
    <div ng-if="!!statusText" style="padding: 30px;">
        <uib-alert type="error" close="closeAlert()" dismiss-on-timeout="3000">{{statusText}}</uib-alert>
    </div>
    <form class="form-horizontal">
        <div class="box-body">
            <div class="form-group" ng-class="{'has-error':modelError.name}">
                <label class="col-sm-3 control-label"><?= Yii::t('rbac-admin', 'Name')?></label>
                <div class="col-sm-9">
                    <input class="form-control" ng-model="model.name">
                    <div ng-if="modelError.name" class="help-block">{{modelError.name}}</div>
                </div>
            </div>
            <div class="form-group" ng-class="{'has-error':modelError.description}">
                <label class="col-sm-3 control-label"><?= Yii::t('rbac-admin', 'Description')?></label>
                <div class="col-sm-9">
                    <input class="form-control" ng-model="model.description">
                    <div ng-if="modelError.description" class="help-block">{{modelError.description}}</div>
                </div>
            </div>
            <div class="form-group" ng-class="{'has-error':modelError.ruleName}">
                <label class="col-sm-3 control-label"><?= Yii::t('rbac-admin', 'Rule')?></label>
                <div class="col-sm-9">
                    <select class="form-control" ng-model="model.ruleName"
                            ng-options="rule.name for rule in rules">
                        <option></option>
                    </select>
                    <div ng-if="modelError.ruleName" class="help-block">{{modelError.ruleName}}</div>
                </div>
            </div>
            <div class="form-group" ng-class="{'has-error':modelError.data}">
                <label class="col-sm-3 control-label"><?= Yii::t('rbac-admin', 'Data')?></label>
                <div class="col-sm-9">
                    <textarea class="form-control" ng-model="model.data"></textarea>
                    <div ng-if="modelError.data" class="help-block">{{modelError.data}}</div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-primary" ng-click="ok()" type="submit">
                        <span class="fa fa-save"></span></button>
                    <button class="btn btn-danger" ng-click="cancel()">
                        <span class="fa fa-remove"></span></button>
                </div>
            </div>
        </div>
    </form>
</div>