<?php

namespace App\Models;
use CodeIgniter\Model;

class GeneroModelo extends Model
{
    protected $table = 'genero';
    protected $allowedFields = [
        'descripcion'
    ];

    protected $updatedField = 'updated_at';
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];


}