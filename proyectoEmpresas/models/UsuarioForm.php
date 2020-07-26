<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $Nombres
 * @property string $Apellidos
 * @property string $NroIdentificacion
 * @property int $empresaId
 */
class UsuarioForm extends Model
{
    public $id;
    public $Nombres;
    public $Apellidos;
    public $NroIdentificacion;
    public $empresaId;


    public function rules()
    {
        return [
            [['Nombres', 'Apellidos', 'NroIdentificacion', 'empresaId'], 'required'],
            [['empresaId'], 'integer'],
            [['Nombres', 'NroIdentificacion'], 'string', 'max' => 20],
            [['Apellidos'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Nombres' => 'Nombres',
            'Apellidos' => 'Apellidos',
            'NroIdentificacion' => 'Nro Identificación',
            'empresaId' => 'Empresa ID',
        ];
    }
}
