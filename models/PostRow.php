<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;

/**
 * This is the model class for table "post_rows".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $text
 *
 * @property Post $parent
 */
class PostRow extends Model
{
    public $id;
    public $parent_id;
    public $text;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_rows';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['text'], 'string', 'max' => 10000],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::class, 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'text' => 'Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Post::class, ['id' => 'parent_id']);
    }
}
