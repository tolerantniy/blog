<?php
/**
 * Created by PhpStorm.
 * User: bigar
 * Date: 04.02.2019
 * Time: 15:16
 */

namespace app\controllers;


use app\models\Post;
use app\models\PostRow;
use yii\web\Controller;
use Yii;
use yii\base\Model;

class PostController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionBiography()
    {
        return $this->render('biography');
    }
    public function actionForm()
    {
        $model = new Post();

        if($model->load(Yii::$app->request->post())){
            if($model->save()){
                Yii::$app->session->setFlash('success', 'yes');
                return $this->refresh();
            } else{
                Yii::$app->session->setFlash('error', 'no');
            }
        }
        return $this->render('form', compact('model'));
    }


}