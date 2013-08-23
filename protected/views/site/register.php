<?php

$this->pageTitle=Yii::app()->name . ' - Registration';
$this->breadcrumbs=array('Registration');
?>

<h1>Registration</h1>

<div class="form">
<? 	$form = $this->beginWidget('CActiveForm', 
		array(
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true
			)
		)
	);
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
 
    <div class="row">
        <?= $form->labelEx($model,'email'); ?>
        <?= $form->textField($model,'email') ?>
        <?= $form->error($model,'email'); ?>
    </div>
 
    <div class="row">
        <?= $form->labelEx($model,'password'); ?>
        <?= $form->passwordField($model,'password') ?>
        <?= $form->error($model,'password'); ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model,'repeat_password'); ?>
        <?= $form->passwordField($model,'repeat_password') ?>
        <?= $form->error($model,'repeat_password'); ?>
    </div>
 
    <div class="row">
    	<?= $form->labelEx($model,'company'); ?>
        <?= $form->textField($model,'company', array('class' => 'company_input')); ?>
        <?= $form->error($model,'company'); ?>
    </div>
 
    <div class="row submit">
        <?= CHtml::submitButton('Register'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->

<? // подключение автокомплита только на странице формы регистрации ?>
<link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl; ?>/css/jquery.custom.min.css" />
<script src="/js/jquery.custom.min.js" type="text/javascript"></script>
<script type='text/javascript'>
$(document).ready(function(){

	$('.company_input').autocomplete({
		source: function(request, response) {
	        $.post(
	         	"/get_companies",
				{
					term: request.term,
					limit: 5
				},
				function(data) {
					if (data.companies)
					{
						response($.map(data.companies, function(item) {
						  	return item;
						}));
	            	}
	            },
	            'json'
	        );
		},
		minLength: 2
	});
});
</script>
