<?php

namespace app\models;

use yii\db\ActiveRecord;

class ContactType extends ActiveRecord
{
    public static function tableName()
    {
        return "contact_types";
    }
}
