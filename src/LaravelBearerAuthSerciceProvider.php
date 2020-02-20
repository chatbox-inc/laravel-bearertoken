<?php
namespace Chatbox\Laravel\BearerAuth;

use Illuminate\Support\ServiceProvider;

class LaravelBearerAuthSerciceProvider extends ServiceProvider
{
    public function boot()
    {
        Auth::viaRequest('custom-token', function ($request) {
            $token = request()->bearerToken();

            $auth = $this->app->has(Authenticatable::class);
            assert($auth instanceof Authenticatable);

            return $auth->authWithToken($token);
        });
    }

}
