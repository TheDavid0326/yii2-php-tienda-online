<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movies".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property float $price
 * @property string $image
 * @property string|null $release_date
 * @property int|null $duration
 */
class Movie extends \yii\db\ActiveRecord
{
    /* 
    mejor usar una variable temporal como $fileImage para manejar la subida del archivo 
    y luego guardar solo la ruta en $model->image

    Ya que vamos a guardar un objeto de tipo UploadedFile en la variable temporal $fileImage.

    */
    public $fileImage;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'release_date', 'duration'], 'default', 'value' => null],
            [['title', 'price'], 'required'],
            [['fileImage'], 'required', 'on' => 'create'], // Solo requerido en create
            [['description'], 'string'],
            [['price'], 'number'],
            [['release_date'], 'safe'],
            [['duration'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['fileImage'], 'file', 'extensions' => 'jpg, jpeg, png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            'image' => 'Image',
            'release_date' => 'Release Date',
            'duration' => 'Duration',
        ];
    }

}
