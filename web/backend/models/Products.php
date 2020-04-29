<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $prod_code
 * @property double $price
 * @property double $tax
 * @property double $gross_price
 * @property string $eur
 * @property string $description
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['name', 'prod_code', 'eur', 'description'], 'string'],
            [['price', 'tax', 'gross_price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name *',
            'prod_code' => 'Product Code',
            'price' => 'Net Price *',
            'tax' => 'TAX',
            'gross_price' => 'Gross Price',
            'eur' => 'Currency',
            'description' => 'Description',
        ];
    }
}
