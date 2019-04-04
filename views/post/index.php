<?php
use yii\helpers\Html;
?>
<!doctype html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
<div class="news" >
    <div class="col-md-8 news1">
        <div class="headline">
            <p class="text-xl-left"><h1>Выровненный слева текст для экрана размера XL (extra-large) или более широкого.</h1></p>
        </div>
        <div class="text-news">
            <p class="text-left">Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum.
                Donec sed odio operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc posthac,
                sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras mattis iudicium purus
                sit amet fermentum.</p>
        </div>
    </div>


</div>
<div class="row-3">
    <div class="col-md-4">
        <p class="text-xl-left"><h2>Выровненный слева текст для экрана размера XL </h2></p>
        <p class="text-left">Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum.
            Donec sed odio operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc posthac,
            sitientis piros Afros. </p>
    </div>
    <div class="col-md-4">
        <p class="text-xl-left"><h2>Выровненный слева текст для экрана размера XL </h2></p>
        <p class="text-left">Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum.
            Donec sed odio operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. felis rhoncus. Praeterea iter est quasdam res quas ex communi.  At nos hinc posthac,
            sitientis piros Afros. </p>
    </div>
    <div class="col-md-4">
        <p class="text-xl-left"><h2>Выровненный слева текст для экрана размера XL</h2></p>
        <p class="text-left">Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum.
            Donec sed odio operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc posthac,
            sitientis piros Afros. </p>

    </div>
</div>
<div class="row-news" >
    <div class="col-md-8">
        <?php if(!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading"><?= $post->title ?>
                            <p><?= Yii::$app->formatter->asDatetime( $post->created_at);?>
                                <span><?= Html::a('Delete', ['delete', 'id' => $post->id], [
                                        'class' => 'btn btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?></span>
                        </div>
                        <div class="panel-body"><?= $post->text?></div>
                    </div>
            <?php endforeach;?>

            <?= \yii\widgets\LinkPager::widget(['pagination'=>$pages])?>
        <?php endif;?>
    </div>
    <div class="col-md-3">
        <div class="card text-center" style="width: 38rem;">
            <div class="card-body">
                <h5 class="card-title">Специальный заголовок</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Переход куда-нибудь</a>
            </div>
        </div>

        <div class="card text-center" style="width: 38rem;">
            <div class="card-body">
                <h5 class="card-title">Специальный заголовок</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Переход куда-нибудь</a>
            </div>
        </div>

        <div class="card text-center" style="width: 38rem;">
            <div class="card-body">
                <h5 class="card-title">Специальный заголовок</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Переход куда-нибудь</a>
            </div>
        </div>

    </div>
</div>




</body>
</html>