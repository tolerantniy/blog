<?php
\app\assets\AppAsset::register($this);
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <!-- Required meta tags -->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<?php $form = ActiveForm::begin(['action' => ['index']])?>
    <?= $form->field($model, 'title')?>
    <?= $form->field($model, 'text')?>

<?= Html::submitButton('send')?>

<?php ActiveForm::end()?>


</html>
