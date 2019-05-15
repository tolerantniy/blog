<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редагувати';
?>
<div class="col-md-6">
    <?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'id'); ?>
    <?= $form->field($model, 'title')->textarea(); ?>
    <?= $form->field($model, 'text')->textarea(); ?>
    <?= Html::submitButton('Оновити', ['class' => 'btn btn-success']); ?>
    <?php ActiveForm::end() ?>

</div>


<div class="col-md-6">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>