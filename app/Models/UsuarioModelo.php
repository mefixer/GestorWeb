<?php

namespace App\Models;
use CodeIgniter\Model;

class UsuarioModelo extends Model
{
    protected $table = 'usuario';
    protected $allowedFields = [
        'rut', 'primer_nombre', 'segundo_nombre', 'primer_apeliido', 'segundo_apellido', 'nombre_usuario', 'password', 'email', 
    ];

    protected $updatedField = 'updated_at';
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data): array{
        return $this->getUpdatedDataWithHashedPassword($data);
    }
    protected function beforeUpdate(array $data): array{
        return $this->getUpdatedDataWithHashedPassword($data);
    }

    private function getUpdatedDataWithHashedPassword(array $data): array{
        if(isset($data['data']['password'])){
            $plaintextPassword = $data['data']['password'];
            $data['data']['password'] = password_hash($plaintextPassword, algo: PASSWORD_BCRYPT);
        }

        return $data;
    }

    public function findUsuarioByEmailAddress(string $emailAddress){
        $usuario = $this->asArray()->where(['email' => $emailAddress])->first();

        if(!$usuario){
            throw new \Exception(message: 'El email ingresado no corresponde a ningun usuario en sistema.');
        }
        return $usuario;
    }
}