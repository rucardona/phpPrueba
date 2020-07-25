<?php

namespace app\models;

use Yii;
use yii\base\Model;


class EmpresaForm extends Model
{
    public $Nit;
    public $title;

    

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['Nit'], 'required']            
        ];
    }


   
}
