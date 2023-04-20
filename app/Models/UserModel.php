<?php

namespace App\Models;

use CodeIgniter\Model;
use Myth\Auth\Models\UserModel as MythModel;

class UserModel extends MythModel
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType     = 'Myth\Auth\Entities\User';
    protected $useSoftDeletes = true;
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $allowedFields = [
        'email', 'username', 'fullname', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash', 'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at'
    ];
}
