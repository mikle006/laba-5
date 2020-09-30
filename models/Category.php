<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property int $discountPercent
 * @property string $defaultPictureURL
 * @property string $description
 * @property string $warehouseName
 *
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'discountPercent', 'defaultPictureURL', 'description', 'warehouseName'], 'required'],
            [['discountPercent'], 'integer'],
            [['name', 'defaultPictureURL', 'warehouseName'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'discountPercent' => 'Discount Percent',
            'defaultPictureURL' => 'Default Picture Url',
            'description' => 'Description',
            'warehouseName' => 'Warehouse Name',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['categoryID' => 'id']);
    }
}
