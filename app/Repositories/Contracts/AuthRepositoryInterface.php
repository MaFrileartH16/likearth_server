<?php
  
  namespace App\Repositories\Contracts;
  
  interface AuthRepositoryInterface
  {
    /**
     * Register a new user.
     */
    public function register(array $data);
    
    /**
     * Login a user and create a token.
     */
    public function login(array $data);
    
    /**
     * Logout a user and revoke the token.
     */
    public function logout();
    
    /**
     * Get the authenticated user.
     */
    
  }
