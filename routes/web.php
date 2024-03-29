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

Route::get('posts', function(){
    $artikels = Post::all();
    return view('livewire.pages.posts.index', compact(('artikels')));
})->middleware(['auth'])->name('posts-index');

Route::get('posts/create', function () {
    $user = Auth::user();
    return view('livewire.pages.posts.create', compact('user'));
})->middleware(['auth'])->name('posts-create');

Route::post('posts/store', [PostController::class, 'store'])->name('post-store');
Route::get('posts/{post}/edit', [PostController::class, 'edit'])->middleware(['auth'])->name('post-edit');
Route::put('posts/{post}', [PostController::class, 'update'])->middleware(['auth'])->name('post-update');

Route::get('audio', function(){
    $audios = Audio::all();
    return view('livewire.pages.audio.index', compact(('audios')));
})->middleware(['auth'])->name('adios-index');

Route::get('audio/create', function () {
    $user = Auth::user();
    return view('livewire.pages.audio.create', compact('user'));
})->middleware(['auth'])->name('audio-create');

Route::post('audio/store', [AudioController::class, 'store'])->name('audio-store');



Route::get('doctors/index', function(){
    $doctors = Doctor::all();
    return view('livewire.pages.doctor.index', compact(('doctors')));
})->middleware(['auth'])->name('doctors-index');

Route::get('doctors/create', function () {
    $user = Auth::user();
    return view('livewire.pages.doctor.create', compact('user'));
})->middleware(['auth'])->name('doctor-create');

Route::post('doctors/store', [DoctorController::class, 'store'])->name('doctor-store');
Route::get('doctors/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctor-edit');
Route::put('doctors/{doctor}', [DoctorController::class, 'update'])->name('doctor-update');


Route::get('orders/index', function(){
    $orders = Order::all();
    return view('livewire.pages.orders.index', compact(('orders')));
})->middleware(['auth'])->name('orders-index');
Route::get('orders/{order}/edit', [OrderController::class, 'edit'])->name('order-edit');
Route::put('orders/{order}', [OrderController::class, 'update'])->name('order-update');

Route::get('transactions/index', function(){
    $transactions = Order::where('user_id', auth()->id())->get();
    return view('livewire.pages.transaction.index', compact('transactions')); 
})->middleware(['auth'])->name('transactions-index');
Route::get('transactions/show/{id}', function($id){
    $transaction = Order::findOrFail($id);
    return view('livewire.pages.transaction.show', compact('transaction'));
})->middleware(['auth'])->name('transaction-show');
require __DIR__.'/auth.php';