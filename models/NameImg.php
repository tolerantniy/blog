<?php
/**
 * Created by PhpStorm.
 * User: bigar
 * Date: 19.03.2019
 * Time: 14:02
 */

namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class NameImg extends ActiveRecord
{

    public static function tableName()
    {
        return 'uploadedimg';
    }

    public function rules()
    {
        return [
            [['image_name', 'text_img'], 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'image_name' => 'image_name',
            'text_img' => 'text_img',

        ];
    }


}