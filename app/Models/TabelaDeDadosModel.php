<?php

namespace App\Models;

use CodeIgniter\Model;

class TabelaDeDadosModel extends Model
{
    //configuracao base do banco
    protected $DBGroup          = 'default';
    protected $table            = 'table1';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nome',
        'endereco',
        'img'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
