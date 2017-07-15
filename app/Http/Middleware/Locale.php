<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use App;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class Locale {

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle( Request $request, Closure $next ) {
    $localeRequest = $request->cookie( 'locale', Config::get( 'app.locale' ) );
    LOG::info($localeRequest);
    $locale = ( $localeRequest === Config::get( 'app.locale' ) ) ? $localeRequest : Crypt::decrypt( $localeRequest );
    App::setLocale( $locale );
    Carbon::setLocale( $locale );
    return $next( $request );
  }

}
