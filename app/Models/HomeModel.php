<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $db;

    function  __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getMessages($sentUserID, $receiveUserID)
    {
        $query = $this->db->table('messages')
            ->where('sent_user_id', $sentUserID)
            ->where('receive_user_id', $receiveUserID)
            ->orWhere('sent_user_id', $receiveUserID)
            ->where('receive_user_id', $sentUserID)
            ->orderBy('date', 'DESC');

        return $query->get()->getResult();
    }
}
