<?php

namespace App\Models;

use CodeIgniter\Model;

class MainModel extends Model
{
    protected $db;

    function  __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function objData($table, $field = null, $value = null)
    {
        $query = $this->db->table($table);

        if (!empty($field))
            $query->where($field, $value);

        return $query->get()->getResult();
    }

    public function objCreate($table, $data)
    {
        $this->db->table($table)
            ->insert($data);

        $result = array();
        if ($this->db->resultID) {
            $result['error'] = 0;
            $result['id'] = $this->db->connID->insert_id;
        } else
            $result['error'] = 1;

        return $result;
    }

    public function objUpdate($table, $data, $id)
    {
        $query = $this->db->table($table)
            ->where('id', $id)
            ->update($data);

        $result = array();

        if ($query == true) {
            $result['error'] = 0;
            $result['id'] = $id;
        } else
            $result['error'] = 1;

        return $result;
    }

    public function objDelete($table, $id)
    {
        $return = array();

        $query = $this->db->table($table)
            ->where('id', $id)
            ->delete();

        if ($query == true) {
            $return['error'] = 0;
            $return['msg'] = 'success';
        } else {
            $return['error'] = 0;
            $return['msg'] = 'error on delete record';
        }

        return $return;
    }

    public function getAllCustomer($searchCompany = null)
    {
        $query = $this->db->table('customer')
            ->select('env_url, company_logo, company_name, company_phone, company_email, company_address1, company_address2, company_city, company_state, company_zip, company_country')
            ->where('status >=', 3)
            ->where('status <=', 4)
            ->orderBy('company_name');

        if (!empty($searchCompany)) {
            $query->like('customer.company_name', $searchCompany);
        }

        $data = $query->get()->getResult();

        return $data;
    }

    public function updateEmpPassByToken($data, $token)
    {
        $query = $this->db->table('employee')
            ->where('token', $token)
            ->update($data);

        $result = array();

        if ($query == true) {
            $result['error'] = 0;
        } else
            $result['error'] = 1;

        return $result;
    }

    public function uploadFile($table, $id, $field, $file)
    {
        $fileContent = file_get_contents($file['tmp_name']);

        $data = array(
            $field => $fileContent
        );

        $query = $this->db->table($table)
            ->where('id', $id)
            ->update($data);

        $result = array();

        if ($query == true) {
            $result['error'] = 0;
        } else {
            $result['error'] = 1;
            $result['msg'] = 'fail upload file';
        }

        return $result;
    }
}
