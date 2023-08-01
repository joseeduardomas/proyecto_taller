<?php

namespace app\models\usuario;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $nombre
 * @property string $primer_apellido
 * @property string|null $segundo_apellido
 * @property string $username
 * @property string $password
 * @property string|null $auth_key
 * @property string|null $access_token
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'primer_apellido', 'username', 'password'], 'required'],
            [['nombre', 'primer_apellido', 'segundo_apellido', 'username', 'password', 'auth_key', 'access_token'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'primer_apellido' => 'Primer Apellido',
            'segundo_apellido' => 'Segundo Apellido',
            'username' => 'Usuario',
            'password' => 'Contraseña',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }
}
