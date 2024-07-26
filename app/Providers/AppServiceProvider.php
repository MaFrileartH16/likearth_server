<?php
  
  namespace App\Providers;
  
  use App\Repositories\Contracts\AuthRepositoryInterface;
  use App\Repositories\Eloquent\AuthRepository;
  use Illuminate\Support\ServiceProvider;
  use Laravel\Passport\Passport;
  
  class AppServiceProvider extends ServiceProvider
  {
    /**
     * Register any application services.
     */
    public function register(): void
    {
      Passport::ignoreRoutes();
      $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
    }
    
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      Passport::tokensExpireIn(now()->addMinutes(60)); // 1 hour
      Passport::refreshTokensExpireIn(now()->addDays(7)); // 7 days
      Passport::personalAccessTokensExpireIn(now()->addMonths(3)); // 3 months
      
      // Muat kunci dari direktori yang aman
//      Passport::loadKeysFrom(__DIR__ . '/../secrets/oauth');
      
      // Aktifkan Password Grant
      Passport::enablePasswordGrant();
      
      Passport::hashClientSecrets();
    }
  }
