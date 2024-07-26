<?php
  
  namespace App\Repositories\Eloquent;
  
  use App\Models\User;
  use App\Repositories\Contracts\AuthRepositoryInterface;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\Hash;
  
  class AuthRepository implements AuthRepositoryInterface
  {
    /**
     * Register a new user.
     *
     * @param array $data
     * @return User
     */
    public function register(array $data)
    {
      $data['password'] = Hash::make($data['password']);
      
      return User::create($data);
    }
    
    /**
     * Login a user and create a token.
     *
     * @param array $credentials
     * @return array|bool
     */
    public function login(array $credentials)
    {
      if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('Personal Access Token')->accessToken;
        
        return [
          'user' => $user,
          'token' => $token,
        ];
      }
      
      return false;
    }
    
    /**
     * Logout a user and revoke the token.
     *
     * @return void
     */
    public function logout()
    {
      $user = Auth::user()->token();
      $user->revoke();
    }
  }
