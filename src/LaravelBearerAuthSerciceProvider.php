<?php
namespace Chatbox\Laravel\BearerAuth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class LaravelBearerAuthSerciceProvider extends ServiceProvider
{
    public function boot()
    {
        Auth::viaRequest('bearer', function () {
            $token = request()->bearerToken();

            if($this->app->has(Authenticatable::class)){
                $auth = $this->app->make(Authenticatable::class);
                assert($auth instanceof Authenticatable);
                return $auth->authWithToken($token);
            }
            throw new \Exception("LaravelBearerAuthSerciceProvider failed to load Authenticatable");
        });
    }

}
