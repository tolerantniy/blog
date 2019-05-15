<?php
use yii\widgets\ActiveForm;

?>


<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
]) ?>
<?= $form->field($model, 'image')->fileInput() ?>
<?= $form->field($dbImage, 'text_img')->textInput() ?>
<button>Send</button>
<?php ActiveForm::end() ?>
