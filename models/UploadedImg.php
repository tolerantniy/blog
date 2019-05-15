<?php
/**
 * Created by PhpStorm.
 * User: bigar
 * Date: 11.03.2019
 * Time: 13:20
 */

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\base\Model;


class UploadedImg extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload(UploadedFile $file)
    {
        $this->image = $file;

        if ($this->validate()) {
            $filename = strtolower(uniqid($file->baseName) . '.' . $file->extension);
            $file->saveAs(Yii::getAlias('@web') . 'uploads/' . $filename);
//            $this->image->saveAs('uploads/' .$this->image->baseName . '.' . $this->image->extension);
            return $filename;
        }
    }

}