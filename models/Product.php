<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $expDate
 * @property string $createDate
 * @property string $photoURL
 * @property int $categoryID
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'expDate', 'createDate', 'photoURL', 'categoryID'], 'required'],
            [['expDate', 'createDate'], 'safe'],
            [['categoryID'], 'integer'],
            [['name', 'photoURL'], 'string', 'max' => 255],
            [['categoryID'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['categoryID' => 'id']],
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
            'expDate' => 'Exp Date',
            'createDate' => 'Create Date',
            'photoURL' => 'Photo Url',
            'categoryID' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'categoryID']);
    }
}
