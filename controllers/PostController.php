<?php
/**
 * Created by PhpStorm.
 * User: bigar
 * Date: 04.02.2019
 * Time: 15:16
 */

namespace app\controllers;

use app\models\nameImg;
use app\models\UploadedImg;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use app\models\Login;
use app\models\Post;
use app\models\PostRow;
use yii\web\Controller;
use Yii;
use yii\base\Model;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;


class PostController extends Controller
{
    public function actionIndex()
    {

        $query = Post::find()->select('id, text, title, created_at')->orderBy('id DESC');
        $pages = new Pagination(['totalCount'=> $query->count(), 'pageSize'=> 3]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('posts', 'pages'));
    }
    public function actionBiography()
    {
        return $this->render('biography');
    }
    public function actionForm()
    {
        $model_post = new Post();

        if($model_post->load(Yii::$app->request->post())){
            if($model_post->save()){
                Yii::$app->session->setFlash('success', 'yes');
                return $this->refresh();
            } else{
                Yii::$app->session->setFlash('error', 'no');
            }
        }

//        $query = Post::find()->orderBy('id DESC');
//        $pages = new Pagination(['totalCount'=> $query->count(), 'pageSize'=> 5]);
//        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
//        $model_row = new PostRow();
//        if($model_row->load(Yii::$app->request->post())){
//            if($model_row->save(false)){
//                Yii::$app->session->setFlash('success', 'yes');
//                return $this->refresh();
//            } else{
//                Yii::$app->session->setFlash('error', 'no');
//            }
//        }

        $posts = Post::find()->all();

        return $this->render('form',
            [
            'model_post' => $model_post,
//            'model_row' => $model_row,
//            'pages' => $pages,
            'posts' => $posts,

        ]);


    }


    public function actionDelete($id = false)
    {
        if (isset($id)) {
            if (Post::deleteAll(['in', 'id', $id])) {
                $this->redirect(['index']);
            }
        } else {
            $this->redirect(['index']);
        }
    }



    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Login();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionUpload(){
        $model = new UploadedImg();

//        if (Yii::$app->request->isPost) {
//
//            $file = UploadedFile::getInstance($model, 'image');
//            $fileName = $model->upload($file);
//
//            $dbImage = new NameImg();
//            $dbImage->image_name = $fileName;
//            if ($dbImage ->load(Yii::$app->request->post())) {
//            }
//            $dbImage->save(false);
//        }
        $dbImage = new NameImg();
        if ((Yii::$app->request->isPost) && $dbImage ->load(Yii::$app->request->post())) {

            $file = UploadedFile::getInstance($model, 'image');
            $fileName = $model->upload($file);
            $dbImage->image_name = $fileName;
            $dbImage->save(false);
            return $this->refresh();
        }

        return $this->render('upload', [
            'model' => $model,
            'dbImage'=> $dbImage,

        ]);

    }
    public function actionUpdate()
    {
        $this->layout = 'uplayouts';
        $model = Post::find()->one();
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->isNewRecord;
                if ($model->save()) {
                    return $this->redirect(array('/post/form'));
                }
            }


        return $this->render('update', [
            'model' => $model,
        ]);
    }
}