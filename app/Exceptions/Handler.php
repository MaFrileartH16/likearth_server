<?php
  
  namespace App\Exceptions;
  
  use Exception;
  use Illuminate\Auth\AuthenticationException;
  use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
  use Illuminate\Http\JsonResponse;
  use Illuminate\Http\Request;
  use Illuminate\Routing\Exceptions\UrlGenerationException;
  use Symfony\Component\HttpFoundation\Response;
  use Throwable;
  
  class Handler extends ExceptionHandler
  {
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
      //
    ];
    
    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
      'password',
      'password_confirmation',
    ];
    
    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Exception|Throwable $exception
     * @return \Illuminate\Http\Response|JsonResponse
     */
    public function render($request, Exception|Throwable $exception)
    {
      // Handle AuthenticationException for API requests
      if ($exception instanceof AuthenticationException) {
        if ($request->wantsJson()) {
          return response()->json([
            'status' => 'error',
            'message' => 'Unauthorized, please provide a valid token.'
          ], Response::HTTP_UNAUTHORIZED);
        }
      }
      
      // Handle RouteNotFoundException for API requests
      if ($exception instanceof UrlGenerationException) {
        if ($request->wantsJson()) {
          return response()->json([
            'status' => 'error',
            'message' => 'Route not found.'
          ], Response::HTTP_NOT_FOUND);
        }
      }
      
      // Handle other exceptions for API requests
      if ($request->wantsJson()) {
        return response()->json([
          'status' => 'error',
          'message' => 'An error occurred',
          'error' => $exception->getMessage()
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
      }
      
      return parent::render($request, $exception);
    }
    
    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param Request $request
     * @param AuthenticationException $exception
     * @return \Illuminate\Http\Response|JsonResponse
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
      if ($request->wantsJson()) {
        return response()->json([
          'status' => 'error',
          'message' => 'Unauthenticated'
        ], Response::HTTP_UNAUTHORIZED);
      }
      
      return redirect()->guest($exception->redirectTo() ?? route('login'));
    }
  }
  
