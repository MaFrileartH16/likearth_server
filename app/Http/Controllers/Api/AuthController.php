<?php
  
  namespace App\Http\Controllers\Api;
  
  use App\Http\Controllers\Controller;
  use App\Http\Requests\RegisterRequest;
  use App\Services\AuthService;
  use Exception;
  use Illuminate\Http\JsonResponse;
  use Symfony\Component\HttpFoundation\Response as ResponseAlias;
  
  class AuthController extends Controller
  {
    protected AuthService $authService;
    
    public function __construct(AuthService $authService)
    {
      $this->authService = $authService;
    }
    
    public function register(RegisterRequest $request): JsonResponse
    {
      try {
        $result = $this->authService->register($request->all());
        return response()->json([
          'status' => 'success',
          'data' => $result
        ], ResponseAlias::HTTP_OK);
      } catch (Exception $e) {
        return response()->json([
          'status' => 'error',
          'message' => 'An error occurred during registration',
          'error' => $e->getMessage()
        ], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
      }
    }
    
    /**
     * Register a new user.
     */
//    public function register(Request $request)
//    {
//      try {
//        $validator = Validator::make($request->all(), [
//          'name' => 'required|string|max:255',
//          'email' => 'required|string|email|max:255|unique:users',
//          'password' => 'required|string|min:8|confirmed',
//        ]);
//
//        if ($validator->fails()) {
//          return response()->json([
//            'status' => 'error',
//            'errors' => $validator->errors()
//          ], Response::HTTP_UNPROCESSABLE_ENTITY);
//        }
//
//        $user = User::create([
//          'name' => $request->name,
//          'email' => $request->email,
//          'password' => Hash::make($request->password),
//        ]);
//
//        return response()->json([
//          'status' => 'success',
//          'message' => 'User registered successfully',
//          'user' => $user
//        ], Response::HTTP_CREATED);
//      } catch (Exception $e) {
//        return response()->json([
//          'status' => 'error',
//          'message' => 'An error occurred during registration',
//          'error' => $e->getMessage()
//        ], Response::HTTP_INTERNAL_SERVER_ERROR);
//      }
//    }
    
    /**
     * Login a user and create a token.
     */
//    public function login(Request $request)
//    {
//      try {
//        $validator = Validator::make($request->all(), [
//          'email' => 'required|string|email',
//          'password' => 'required|string',
//        ]);
//
//        if ($validator->fails()) {
//          return response()->json([
//            'status' => 'error',
//            'errors' => $validator->errors()
//          ], Response::HTTP_UNPROCESSABLE_ENTITY);
//        }
//
//        if (!Auth::attempt($request->only('email', 'password'))) {
//          return response()->json([
//            'status' => 'error',
//            'message' => 'Unauthorized'
//          ], Response::HTTP_UNAUTHORIZED);
//        }
//
//        $user = Auth::user();
//        $token = $user->createToken('Personal Access Token')->accessToken;
//
//        return response()->json([
//          'status' => 'success',
//          'token' => $token
//        ]);
//      } catch (Exception $e) {
//        return response()->json([
//          'status' => 'error',
//          'message' => 'An error occurred during login',
//          'error' => $e->getMessage()
//        ], Response::HTTP_INTERNAL_SERVER_ERROR);
//      }
//    }
    
    /**
     * Logout a user (revoke the token).
     */
//    public function logout(Request $request)
//    {
//      try {
//        $tokenId = $request->user()->token()->id;
//        $tokenRepository = app(TokenRepository::class);
//        $refreshTokenRepository = app(RefreshTokenRepository::class);
//
//        // Revoke access token
//        $tokenRepository->revokeAccessToken($tokenId);
//
//        // Revoke all refresh tokens associated with the access token
//        $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($tokenId);
//
//        return response()->json([
//          'status' => 'success',
//          'message' => 'Successfully logged out'
//        ]);
//      } catch (Exception $e) {
//        return response()->json([
//          'status' => 'error',
//          'message' => 'An error occurred during logout',
//          'error' => $e->getMessage()
//        ], Response::HTTP_INTERNAL_SERVER_ERROR);
//      }
//    }
    
    /**
     * Get the authenticated user.
     */
//    public function user(Request $request)
//    {
//      try {
//        return response()->json([
//          'status' => 'success',
//          'user' => $request->user()
//        ]);
//      } catch (Exception $e) {
//        return response()->json([
//          'status' => 'error',
//          'message' => 'An error occurred while fetching user details',
//          'error' => $e->getMessage()
//        ], Response::HTTP_INTERNAL_SERVER_ERROR);
//      }
//    }
  }
 
