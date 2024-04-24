<?php

namespace App\Controllers;

use App\Models\MainModel;
use App\Models\HomeModel;
use App\Models\AuthenticationModel;

class Authentication extends BaseController
{
    protected $objMainModel;
    protected $objHomeModel;
    protected $objAuthenticationModel;
    protected $objRequest;
    protected $objEmail;
    protected $lang;
    protected $objSession;

    public function __construct()
    {
        # Clear Sesion
        $this->objSession = session();
        $this->objSession->set('user', []);

        session();

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

        # Set Lang
        if (session('lang') === null) {
            $acceptLanguage = $this->objRequest->getHeaderLine('accept-language');
            $browserLang = explode(',', $acceptLanguage);
            session()->set('lang', $browserLang[0]);
        }

        if (strpos(session('lang'), 'es') === 0)
            session()->set('lang', 'es');
        elseif (strpos(session('lang'), 'en') === 0)
            session()->set('lang', 'en');

        $this->lang = session('lang');

        $this->objRequest->setLocale($this->lang);

        # Models
        $this->objMainModel = new MainModel;
        $this->objHomeModel = new HomeModel;
        $this->objAuthenticationModel = new AuthenticationModel;
    }

    public function login()
    {
        # params
        $session = $this->request->getGet('session');

        $data = array();
        $data['page'] = 'authentication/login';
        $data['uniqid'] = uniqid();
        $data['session'] = $session;

        return view('layout/header', $data);
    }

    public function loginProccess()
    {
        # params
        $email = strtolower(htmlspecialchars(trim($this->objRequest->getPost('email'))));
        $password = htmlspecialchars(trim($this->objRequest->getPost('pass')));

        $result = $this->objAuthenticationModel->login($email, $password);

        if ($result['error'] == 0) {
            $data = array();
            $data['lastSession'] = date('Y-m-d H:i:s');
            $data['status'] = 1;

            $this->objMainModel->objUpdate('users', $data, $result['data']->id);

            # Create Session
            $session = array();
            $session['userID'] = $result['data']->id;
            $session['name'] = $result['data']->username;
            $session['email'] = $result['data']->email;
            $session['status'] = $result['data']->status;
            $session['role'] = 'user';

            $this->objSession->set('user', $session);
        }

        $response = array();
        $response['error'] = $result['error'];
        $response['msg'] = @$result['msg'];

        return json_encode($response);
    }
}
