<?php

use App\Http\Controllers\AudioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Livewire\PostIndex;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Volt\Volt;

use function Livewire\store;

Route::get('/', function () {
    return view('landingpage');
});

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

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
 
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');


// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
 
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('/',function(){
//    return redirect('dashboard');
// });

Route::get('/invoice/{id}', [OrderController::class, 'invoice'])->name('invoice');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
// Route::post('/payment-callback', [OrderController::class, 'callback']);

Route::get('/dashboard', function(){
    $posts = Post::all();
    $doctors = Doctor::all();
    $audios = Audio::all();
    $order = Order::find(auth()->id());
    return view('dashboard', compact('posts', 'audios', 'doctors', 'order'));
})->middleware(['auth', 'verified'])
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

Volt::route('/posts/index', 'pages.posts.index')->name('posts-index');
Volt::route('/posts/create', 'pages.posts.create')->name('posts-create');
Volt::route('/posts/{post}/edit', 'pages.posts.edit')->name('posts-edit');

Volt::route('/articles', 'pages.list-article')->name('articles');
Volt::route('/articles/{article}', 'pages.detail-article')->name('articles.show');

Volt::route('/doctors/index', 'pages.doctor.index')->name('doctors-index');
Volt::route('/doctors/create', 'pages.doctor.create')->name('doctors-create');
Volt::route('/doctors/{doctor}/edit', 'pages.doctor.edit')->name('doctors-edit');

Volt::route('/doctor', 'pages.list-doctor')->name('doctors');

Volt::route('/audios/index', 'pages.audio.index')->name('audios-index');
Volt::route('/audios/create', 'pages.audio.create')->name('audios-create');
Volt::route('/audios/{audio}/edit', 'pages.audio.edit')->name('audios-edit');


Volt::route('/orders/index', 'pages.orders.index')->name('orders-index');
Volt::route('/orders/{order}/edit', 'pages.orders.edit')->name('orders-edit');


Route::get('transactions/index', function(){
    $transactions = Order::where('user_id', auth()->id())->get();
    return view('livewire.pages.transaction.index', compact('transactions')); 
})->middleware(['auth'])->name('transactions-index');
Route::get('transactions/show/{id}', function($id){
    $transaction = Order::findOrFail($id);
    return view('livewire.pages.transaction.show', compact('transaction'));
})->middleware(['auth'])->name('transaction-show');
require __DIR__.'/auth.php';

Route::get('/order/{order}/whatsapp', [OrderController::class, 'whatsapp'])
    ->name('order-whatsapp')
    ->middleware(['auth']);