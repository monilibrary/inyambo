<?php

namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;

class AuthService {
    private $users = [];
    private $secretKey = 'your_secret_key';

    public function register($username, $password) {
        // Logic to store user in database or array
        $this->users[$username] = password_hash($password, PASSWORD_BCRYPT);
        return true;
    }

    public function login($username, $password) {
        // Logic to authenticate user
        if (isset($this->users[$username]) && password_verify($password, $this->users[$username])) {
            return $this->generateToken($username);
        }
        return false;
    }

    public function logout() {
        // Logic to handle user logout
        return true; // Invalidate token in a real application
    }

    private function generateToken($username) {
        $payload = [
            'iss' => 'your_issuer',  // Issuer of the token
            'aud' => 'your_audience', // Audience of the token
            'iat' => time(),           // Issued at: time when the token is generated
            'exp' => time() + 3600,    // Expiration time (1 hour)
            'username' => $username    // Username
        ];

        return JWT::encode($payload, $this->secretKey);
    }
}