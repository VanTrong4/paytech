<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\View\FileViewFinder;

class Template
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next, string $template = null)
  {
    if ($request->getMethod() === "POST" && route(lp() . 'register') == $request->headers->get('referer'))
      return $next($request);

    if ($template) {
      $finders  = new FileViewFinder(app()['files'], array(resource_path('views/' . $template)));
      View::setFinder($finders);
    }
    return $next($request);
  }
}
