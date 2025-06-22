<?php

namespace App\Providers;

use App\Http\Composer\HeaderComposer;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use URL;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        URL::macro('alternateHasCorrectSignature',function (Request $request, $absolute = true, array $ignoreQuery = []) {
            $ignoreQuery[] = 'signature';
            $absoluteUrl = url($request->path());
            $url = $absolute ? $absoluteUrl : '/' . $request->path();

            $queryString = collect(explode('&', (string) $request
                ->server->get('QUERY_STRING')))
                ->reject(fn($parameter) => in_array(Str::before($parameter, '='), $ignoreQuery))
                ->join('&');

            $original = rtrim($url . '?' . $queryString, '?');

            // Use the application key as the HMAC key
            $key = config('app.key'); // Ensure app.key is properly set in .env

            if (empty($key)) {
                throw new \RuntimeException('Application key is not set.');
            }

            $signature = hash_hmac('sha256', $original, $key);
            return hash_equals($signature, (string) $request->query('signature', ''));
        });

        URL::macro('alternateHasValidSignature', function (Request $request, $absolute = true, array $ignoreQuery = []) {
            return URL::alternateHasCorrectSignature($request, $absolute, $ignoreQuery)
                && URL::signatureHasNotExpired($request);
        });

        Request::macro('hasValidSignature', function ($absolute = true, array $ignoreQuery = []) {
            return URL::alternateHasValidSignature($this, $absolute, $ignoreQuery);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(!$this->app->environment('local')) {
            URL::forceScheme('https');
        }
    }
}
