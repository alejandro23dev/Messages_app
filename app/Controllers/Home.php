<?php

namespace App\Controllers;

use App\Models\MainModel;
use App\Models\HomeModel;

class Home extends BaseController
{
    protected $objMainModel;
    protected $objHomeModel;
    protected $objRequest;
    protected $objEmail;
    protected $lang;
    protected $objSession;

    public function __construct()
    {
        # Session
        $this->objSession = session();

        # Email Settings
        $emailConfig = array();
        $emailConfig['protocol'] = EMAIL_PROTOCOL;
        $emailConfig['SMTPHost'] = EMAIL_SMTP_HOST;
        $emailConfig['SMTPUser'] = EMAIL_SMTP_USER;
        $emailConfig['SMTPPass'] = EMAIL_SMTP_PASS;
        $emailConfig['SMTPPort'] = EMAIL_SMTP_PORT;
        $emailConfig['SMTPCrypto'] = EMAIL_SMTP_CRYPTO;
        $emailConfig['mailType'] = EMAIL_TYPE;

        # Services
        $this->objRequest = \Config\Services::request();
        $this->objEmail = \Config\Services::email($emailConfig);

        # Models
        $this->objMainModel = new MainModel;
        $this->objHomeModel = new HomeModel;
    }
    public function main()
    {
        # Verify Session 
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['role'] != "user")
            return view('logout/userLogout');

        $data = array();
        $data['page'] = 'main/index';
        $data['uniqid'] = uniqid();
        # User Login
        $data['user'] = $this->objMainModel->objData('users', 'id', $this->objSession->get('user')['userID']);

        return view('layout/header', $data);
    }

    public function getContacts()
    {
        # Verify Session 
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['role'] != "user")
            return view('logout/userLogout');

        $data = array();
        $data['uniqid'] = $this->objRequest->getPost('uniqid');
        $data['contacts'] = $this->objMainModel->objData('users', 'id!=', $this->objSession->get('user')['userID']);

        return view('main/contacts', $data);
    }

    public function getUserChat()
    {
        # Verify Session 
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['role'] != "user")
            return view('logout/userLogout');

        # Params
        $userID = $this->objRequest->getPost('userID');

        $data = array();
        $data['uniqid'] = uniqid();
        $data['contact'] = $this->objMainModel->objData('users', 'id', $userID);
        # User Login
        $data['user'] = $this->objMainModel->objData('users', 'id', $this->objSession->get('user')['userID']);

        return view('main/chat', $data);
    }

    public function getMessagesChat()
    {
        # Verify Session 
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['role'] != "user")
            return view('logout/userLogout');

        # Params
        $contactID = $this->objRequest->getPost('contactID');
        $data['contact'] = $this->objMainModel->objData('users', 'id', $contactID);
        $data['messages'] = $this->objHomeModel->getMessages($this->objSession->get('user')['userID'], $contactID);
        # User Login
        $data['user'] = $this->objMainModel->objData('users', 'id', $this->objSession->get('user')['userID']);

        return view('main/messages', $data);
    }

    public function sentMessage()
    {
        # Verify Session 
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['role'] != "user") {
            $result = array();
            $result['error'] = 2;
            $result['msg'] = "SESSION_EXPIRED";

            return json_encode($result);
        }

        # Params
        $message = htmlspecialchars(trim($this->objRequest->getPost('message')));
        $receiveUserID = $this->objRequest->getPost('receiveUserID');
        $sentUserID = $this->objRequest->getPost('sentUserID');

        $data = array();
        $data['sent_user_id'] = $sentUserID;
        $data['receive_user_id'] = $receiveUserID;
        $data['message'] = $message;
        $data['date'] = date('Y-m-d H:i:s');

        $response = $this->objMainModel->objCreate('messages', $data);

        return json_encode($response);
    }

    public function changeStatus()
    {
        # Verify Session 
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['role'] != "user") {
            $result = array();
            $result['error'] = 2;
            $result['msg'] = "SESSION_EXPIRED";

            return json_encode($result);
        }

        # Params
        $status = htmlspecialchars(trim($this->objRequest->getPost('status')));
        $userID = htmlspecialchars(trim($this->objRequest->getPost('userID')));

        $data = array();
        $data['status'] = $status;
        $data['lastSession'] = date('Y-m-d H:i:s');

        $response = $this->objMainModel->objUpdate('users', $data, $userID);

        return json_encode($response);
    }
}
