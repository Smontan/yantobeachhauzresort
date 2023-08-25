<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Reservation\ReservationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['verify' => true]);

// Route::get('/sms', 'App\Http\Controllers\SmsController@sms');

// Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// The Email Verification Notice
Route::get('/email/verify', function () {
   return view('auth.verify');
   // return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// The Email Verification Handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
   $request->fulfill();

   flash()
      ->option('timeout', 3000)
      ->addSuccess('Your email is now verified');
   return redirect('/');
   // return redirect('/')->with('status', 'Your email is now verified');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resending The Verification Email
Route::post('/email/verification-notification', function (Request $request) {
   $request->user()->sendEmailVerificationNotification();
   flash()
      ->option('timeout', 3000)
      ->addInfo('Verification link sent!');
   return back();
   // return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route Group Frontend
Route::controller(FrontendController::class)->group(function () {
   Route::get('/', 'index');
   Route::get('/about', 'about');
   Route::get('/contact', 'contact');
   Route::get('/rooms', 'roomFilters');
   // Route::get('/rooms/categories/{category_id}', 'showRooms');
});

Route::post('/contact_us',[ContactUsController::class, 'sendMessage']);

Route::middleware(['auth'])->group(function () {
   Route::get('/rooms/reserved_room/{room_id}', [ReservationController::class, 'index']);
   Route::get('/user/reservations', [ReservationController::class, 'userReservations']);

   Route::post('/add-rating', [RatingController::class, 'add']);

   Route::controller(CommentController::class)->group(function () {
      Route::post('/comment', 'store');
      Route::get('/comment/{comment_id}/destroy', 'destroy');
   });
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

   // Route Dashboard
   Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

   // Route Reservation
   Route::controller(App\Http\Controllers\Reservation\ReservationController::class)->group(function () {
      Route::get('/reservation/view', 'view');
      Route::get('/reservation/create', 'create');
      Route::get('/reservation/history', 'history');
   });

   // Route Group Categories
   Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
      Route::get('/category', 'index');
      Route::get('/category/create', 'create');
      Route::post('/category', 'store');
      Route::get('/category/{category}/edit', 'edit');
      Route::put('/category/{category}', 'update');
   });

   // Route Amenity
   Route::get('/amenity', App\Http\Livewire\Admin\Amenity\Index::class);

   // Route Room
   Route::controller(App\Http\Controllers\Admin\RoomController::class)->group(function () {
      Route::get('/room', 'index');
      Route::get('/room/create', 'create');
      Route::post('/room/', 'store');
      Route::get('/room/{room}/edit', 'edit');
      Route::put('/room/{room}', 'update');
      Route::get('/room/{room_id}/delete', 'destroy');
      Route::get('/room-image/{room_image_id}/delete', 'destroyImage');
   });

   // Route Web Pages
   Route::controller(App\Http\Controllers\Admin\WebPageController::class)->group(function () {
      Route::get('/web_page', 'index');
      Route::get('/web_page/create', 'create');
      Route::post('/web_page', 'store');
      Route::get('/web_page/{web_page}/edit', 'edit');
      Route::put('/web_page/{web_page}', 'update');
      Route::get('/web_page/{web}/delete', 'destroy');
   });

   // Route Users
   Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
      Route::get('/users', 'index');
      Route::get('/users/create', 'create');
      Route::post('/users', 'store');
      Route::get('/users/{user_id}/edit', 'edit');
      Route::put('/users/{user_id}', 'update');
      Route::get('/users/{user_id}', 'delete');
   });

   // Route promotion
   Route::controller(App\Http\Controllers\Admin\PromotionController::class)->group(function () {
      Route::get('/promotion', 'index');
      Route::get('/promotion/create', 'create');
      Route::post('/promotion', 'store');
      Route::get('/promotion/{promotion}/edit', 'edit');
      Route::put('/promotion/{promotion}', 'update');
   });

});