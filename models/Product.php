<?php

declare(strict_types=1);


namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'sku', 'quantity'], 'required'],
            [['product_name', 'sku', 'product_type',], 'string', 'max' => 25],
            [['image_url'], 'string', 'max' => 255],
            [['quantity'], 'integer',],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{product}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Наименование',
            'sku' => 'SKU',
            'quantity' => 'Количество на складе',
            'product_type' => 'Тип продукта',
            'image_url' => 'Изображение',
            ];
    }
}