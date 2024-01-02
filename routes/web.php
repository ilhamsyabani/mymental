<?php

use App\Http\Controllers\OrderController;
use App\Models\Audio;
use App\Models\Doctor;
use App\Models\Order;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;



Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google-redirect');

Route::get('/google/callback', function () {
    $userSocial = Socialite::driver('google')->stateless()->user();
    $user = User::where('email', $userSocial->email)->firstOrNew();

    if (!$user->exists) {
        $user->fill([
            'name' => $userSocial->name,
            'email' => $userSocial->email,
            'password' => Hash::make(Str::random(8)),
            'email_verified_at' => now(),
        ])->save();
    }

    $user->authenticate();
    Session::regenerate();

    return redirect(session('url.intended', RouteServiceProvider::HOME));
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/',function(){
   return redirect('dashboard');
});

Route::get('/invoice/{id}', [OrderController::class, 'invoice'])->name('invoice');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/payment-callback', [OrderController::class, 'callback']);

Route::get('/dashboard', function(){
    $posts = Post::all();
    $doctors = Doctor::all();
    $audios = Audio::all();
    return view('dashboard', compact('posts', 'audios', 'doctors') );
})
->middleware(['auth', 'verified'])
->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/doctor', function () {
    $doctors = Doctor::all();
    return view('list-doctor', compact('doctors'));
})->middleware(['auth', 'verified'])
->name('doctors');

Route::get('/doctor/{id}', function ($id) {
    $doctor = Doctor::find($id);
    return view('detail-doctor', compact('doctor'));
})->middleware(['auth', 'verified'])
->name('doctor.show');

Route::get('/article', function(){
    $articles = Post::all();
    return view('list-article', compact(('articles')));
})->middleware(['auth', 'verified'])
->name('articles');

Route::get('/article/{id}', function($id){
    $article = Post::find($id);
    return view('detail-article', compact(('article')));
})->middleware(['auth', 'verified'])
->name('article.show');


require __DIR__.'/auth.php';
