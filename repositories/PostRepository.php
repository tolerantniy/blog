<?php

/**
 * Created by PhpStorm.
 * User: bigar
 * Date: 06.05.2019
 * Time: 12:58
 */
namespace app\repositories;

use app\interfaces\PostRepositoryInterface;
use app\models\Post;
use Yii;

class PostRepository implements PostRepositoryInterface
{
    public function save($data)
    {
        $model_post = new Post();
        $model_post->setAttributes($data);

        return $model_post->save();

    }

    public function PostAll()
    {
        return Post::find()->all();
    }

    public function deleted()
    {

    }
    public function PostSelect()
    {
        return Post::find()->select('id, text, title, created_at')->orderBy('id DESC');
    }
    public function PostCount()
    {
        $qwery = Post::find()->select('id, text, title, created_at');
        return $qwery->count();
    }
}
