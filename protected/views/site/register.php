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
        <?= $form->labelEx($model,'email'); ?>
        <?= $form->textField($model,'email') ?>
    </div>
 
    <div class="row">
        <?= $form->labelEx($model,'password'); ?>
        <?= $form->passwordField($model,'password') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model,'repeat_password'); ?>
        <?= $form->passwordField($model,'repeat_password') ?>
    </div>
 
    <div class="row">
    	<?= $form->labelEx($model,'company'); ?>
        <?= $form->textField($model,'company'); ?>
    </div>
 
    <div class="row submit">
        <?= CHtml::submitButton('Register'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->
