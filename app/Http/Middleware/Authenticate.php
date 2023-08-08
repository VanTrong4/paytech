<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Auth\AuthenticationException;

class Authenticate extends Middleware
{
  protected function unauthenticated($request, array $guards)
  {
    if (in_array('admin', $guards))
      throw new AuthenticationException(
        'Unauthenticated.',
        $guards,
        $this->adminRedirectTo($request)
      );
    throw new AuthenticationException(
      'Unauthenticated.',
      $guards,
      $this->redirectTo($request)
    );
  }

  /**
   * Get the path the user should be redirected to when they are not authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return string|null
   */
  protected function redirectTo($request)
  {
    if (!$request->expectsJson()) {
      return route(lp() . 'login');
    }
  }

  protected function adminRedirectTo($request)
  {
    if (!$request->expectsJson()) {
      return route('admin.login');
    }
  }
}
