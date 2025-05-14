<?php

namespace App\Controllers;
require_once ROOTPATH . 'public/JWT/src/JWT.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Database\Exceptions\DatabaseException;
class Home extends BaseController
{

     protected $key = 'siddhesh';
     protected $db;
    public function index(): string
    {
        return view('home');
    }
     public function optionsMethod()
    {
        return $this->response->setStatusCode(200)
                              ->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                              ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With, Accept')
                              ->setHeader('Access-Control-Max-Age', '86400'); // Cache for 1 day
    }
     public function __construct()
    {
        
        // parent::__construct();
         $this->db = \Config\Database::connect();
        require_once ROOTPATH . 'public/JWT/src/JWTExceptionWithPayloadInterface.php';
        require_once ROOTPATH . 'public/JWT/src/JWT.php';
        require_once ROOTPATH . 'public/JWT/src/Key.php'; // Corrected file name
        require_once ROOTPATH . 'public/JWT/src/BeforeValidException.php';
        require_once ROOTPATH . 'public/JWT/src/SignatureInvalidException.php';
        require_once ROOTPATH . 'public/JWT/src/ExpiredException.php';

    }
     public function authenticate()
    {
        $this->response->setHeader('Content-Type', 'application/json');
        
        $input = json_decode($this->request->getBody(), true);
        // print_r($input);die;
        if (!$input) {
            return $this->response->setJSON([
                'status' => 400,
                'message' => 'Invalid input format.'
            ])->setStatusCode(400);
        }
        $email = trim($input['email'] ?? '');
        $password = trim($input['password'] ?? '');
        if (empty($email) || empty($password)) {
            return $this->response->setJSON([
                'status' => 400,
                'message' => 'Email and Password are required.'
            ])->setStatusCode(400);
        }
        $user = $this->db->table('tbl_loginadmin')
                 ->where('email', $email)
                 ->where('is_active', 'Y')
                 ->get()
                 ->getRowArray();
        if (!$user) {
            return $this->response->setJSON([
            'status' => 401,
            'message' => 'Invalid email or password.'
            ])->setStatusCode(401);
        }
        if ($user['auto_logout'] === 'N') {
            $payload = [
            'iat' => time(),
            'exp' => time() + (24 * 60 * 60),
            'user_id' => $user['user_code_ref'],
            'email' => $user['email'],
            ];
            $refreshPayload = [
            'iat' => time(),
            'exp' => time() + (48 * 60 * 60),
            'user_id' => $user['user_code_ref'],
            'email' => $user['email'],
            ];
            $token = JWT::encode($payload, $this->key, 'HS256');
            $refreshToken = JWT::encode($refreshPayload, $this->key, 'HS256');
            $timezone = new \DateTimeZone('Asia/Kolkata');
            $current_time = new \DateTime('now', $timezone);
            $last_login = $current_time->format('Y-m-d H:i:s');

            $this->db->table('tbl_loginadmin')
                 ->where('email', $email)
                 ->update([
                 'token' => $token,
                 'refresh_token' => $refreshToken,
                 'last_login' => $last_login
                 ]);

            return $this->response->setJSON([
            'message' => 'Authentication successful',
            'token' => $token,
            'refresh_token' => $refreshToken,
            ])->setStatusCode(200);
        }
      else {
        $payload = [
            'iat' => time(),
            'exp' => time() + (24 * 60 * 60),
            'user_id' => $user['user_code_ref'],
            'email' => $user['email'],
            ];
            // print_r($payload);die;
            $token = JWT::encode($payload, $this->key, 'HS256');
            $timezone = new \DateTimeZone('Asia/Kolkata');
            $current_time = new \DateTime('now', $timezone);
            $last_login = $current_time->format('Y-m-d H:i:s');
            $this->db->table('tbl_loginadmin')
                 ->where('email', $email)
                 ->update([
                 'token' => $token,
                 'last_login' => $last_login
                 ]);
            return $this->response->setJSON([
            'userid' => $user['user_code_ref'],
            'email' => $user['email'],
            'username' => $user['username'],
            'message' => 'Authentication successful',
            'token' => $token,
            ])->setStatusCode(200);
        }
    }
    public function logout()
    {  
        return redirect()->to(base_url('/'));
    
    }
}
