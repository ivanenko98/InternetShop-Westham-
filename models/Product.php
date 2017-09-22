<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property integer $code
 * @property double $price
 * @property integer $availability
 * @property string $brand
 * @property string $image
 * @property string $description
 * @property integer $is_new
 * @property integer $is_recommended
 * @property integer $status
 * @property integer $gender
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'description'], 'required'],
            [['category_id', 'code', 'availability', 'is_new', 'is_recommended', 'status', 'gender'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name', 'brand', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'code' => 'Code',
            'price' => 'Price',
            'availability' => 'Availability',
            'brand' => 'Brand',
            'image' => 'Image',
            'description' => 'Description',
            'is_new' => 'Is New',
            'is_recommended' => 'Is Recommended',
            'status' => 'Status',
            'gender' => 'Gender',
        ];
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        if($this->image)
        {
            return $this->getFileDirectory() . $this->image;
        }else{
            return '/images/config/no-image.jpg';
        }

    }

    public function getFileDirectory()
    {
        return '/images/product/';
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function isPost()
    {
        $this->availability = 1;
        return $this->save(false);
    }

    public function notPost()
    {
        $this->availability = 0;
        return $this->save(false);
    }
}
