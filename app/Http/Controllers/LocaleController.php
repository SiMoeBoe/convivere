<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cookie;

class LocaleController extends Controller {

  /**
   * Set language of the user
   * 
   * @param string $locale
   * @return Request
   * @todo Use not-encryptet cookies
   */
  public function setLocale( $locale = 'en' ) {
    if ( !in_array( $locale, [ 'en', 'de' ] ) ) {
      $locale = 'en';
    }
    $cookie = Cookie::forever( 'locale', $locale );
    return redirect( url( URL::previous() ) )->withCookie( $cookie );
  }

}
