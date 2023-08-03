<?php

namespace app\models\usuario;

use app\models\User;
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
 * @property int $status
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    const STATUS_INACTIVO = 0;
    const STATUS_ACTIVO = 1;

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
            [['status'], 'integer'],
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
            'status' => 'Estatus',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $modeloDeUsuario = Usuario::find()
            ->where(['id' => $id])
            ->one();

        return $modeloDeUsuario;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        /*foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }*/

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $modeloDeUsuario = Usuario::find()
            ->where(['username' => $username])
            ->one();

        return $modeloDeUsuario;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }


    /**
     * Validates status
     *
     * @return bool Si el usuario se encuentra activo actualmente
     */
    public function isActivo(){
        return $this->status === self::STATUS_ACTIVO;
    }

}
