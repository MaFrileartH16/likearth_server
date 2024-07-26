<?php
  
  namespace App\Services;
  
  use App\Repositories\Contracts\AuthRepositoryInterface;
  
  class AuthService
  {
    protected AuthRepositoryInterface $authRepository;
    
    public function __construct(AuthRepositoryInterface $authRepository)
    {
      $this->authRepository = $authRepository;
    }
    
    /**
     * Register a new user.
     */
    public function register(array $data)
    {
      return $this->authRepository->register($data);
    }
  }
