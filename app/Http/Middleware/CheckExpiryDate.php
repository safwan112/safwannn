<?php
// app/Http/Middleware/CheckExpiryDate.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckExpiryDate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Set the expiry date
        $expiryDate = Carbon::create(3025, 6, 5);

        // Check if the current date is after the expiry date
        if (Carbon::now()->greaterThan($expiryDate)) {
            // Redirect to a custom expired page or return an error response
            return response()->view('welcome'); // You can customize this view
        }

        return $next($request);
    }
}
