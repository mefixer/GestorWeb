<?php

namespace App\Models;
use CodeIgniter\Model;

class RolModelo extends Model
{
    protected $table = 'rol';
    protected $allowedFields = [
        'nombre'
    ];

    protected $updatedField = 'updated_at';
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
}