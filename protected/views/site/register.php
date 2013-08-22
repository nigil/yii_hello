<?php

$this->pageTitle=Yii::app()->name . ' - Регистрация';
$this->breadcrumbs=array(
	'Регистрация',
);
?>

<h1>Регистрация</h1>

<div class="form">
<? $form = $this->beginWidget('CActiveForm'); ?>
 
    <? echo $form->errorSummary($model); ?>
 
    <div class="row">
        <?= $form->labelEx($model,'Email'); ?>
        <?= $form->textField($model,'email') ?>
    </div>
 
    <div class="row">
        <?= $form->labelEx($model,'Пароль'); ?>
        <?= $form->passwordField($model,'password') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model,'Повторите пароль'); ?>
        <?= $form->passwordField($model,'repeat_password') ?>
    </div>
 
    <div class="row">
    	<?= $form->labelEx($model,'Название компании'); ?>
        <?= $form->textField($model,'company'); ?>
    </div>
 
    <div class="row submit">
        <?= CHtml::submitButton('Регистрация'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->
