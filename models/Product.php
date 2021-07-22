<?php

declare(strict_types=1);


namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public $imageUrl;
    public $sku;
    public $productName;
    public $quantity;
    public $productType;

    public function rules()
    {
        return [

        ];
    }

    public static function tableName()
    {
        return '{{product}}';
    }
}