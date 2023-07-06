<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user'; 
    protected $primaryKey = 'user_id';//id
    protected $allowedFields = [
        'nama','email', 'telp', 'password', 'user_role'
    ];  
}