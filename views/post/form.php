<?php
use yii\base\Model;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use unclead\multipleinput\examples\models\ExampleModel;

?>
<!doctype html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="customer-form">

        <?php $form = ActiveForm::begin([
//        'enableAjaxValidation'      => true,
//        'enableClientValidation'    => false,
//        'validateOnChange'          => false,
//        'validateOnSubmit'          => true,
//        'validateOnBlur'            => false,
        ]);
        ?>


        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model_post, 'title')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model_post, 'text')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <!--    <div class="row">-->
        <!--        <div class="col-md-12">-->
        <!--    --><? //= $form->field($model_row, 'text')->widget(MultipleInput::className(), [
        //        'max' => 4,
        //    ]); ?>
        <!--        </div>-->
        <!--    </div>-->
        <?= Html::submitButton('send', ['class' => 'btn btn-success']); ?>
        <?php ActiveForm::end(); ?>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Заголовок</th>
                        <th scope="col">Текст</th>
                        <th scope="col" width='40px'></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($posts)): ?>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <th scope="row"><?= $post->id ?></th>
                                <td><?= $post->title ?></td>
                                <td><?= $post->text ?></td>
                                <td><span><?= Html::a('Update', ['update', 'id' => $post->id], [
                                            'class' => 'btn btn-danger',
                                            'url' => '/post/update',
                                            'data' => [
                                                'method' => 'post',
                                            ],
                                        ]) ?></span></td>

                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

</body>
</html>
