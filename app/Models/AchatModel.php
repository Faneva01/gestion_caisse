<?php
namespace App\Models;

use CodeIgniter\Model;

class AchatModel extends Model
{
    protected $table = 'achat';
    protected $allowedFields = ['id', 'client_id'];
}