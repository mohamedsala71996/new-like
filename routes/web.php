<?php

use App\Http\Controllers\Dashboard\AddlinkController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\ProfileController;
use App\Models\Customer;
use App\Notifications\SendCode;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\LoginController;
use App\Http\Controllers\Website\SiteController;
use App\Http\Controllers\Website\WithdrawalController;
use App\Http\Controllers\Website\WorkController;
use App\Http\Controllers\Website\SubscriptionController;
use App\Http\Controllers\Website\HelpController;
use App\Http\Controllers\Website\InviteController;
use App\Http\Controllers\Website\ProfitController;
use App\Http\Controllers\Website\ScreenshotController;

use App\Models\Withdrawal;

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
Route::get('/clear-cache', function () {
   Artisan::call('view:clear');
   Artisan::call('route:clear');

   return "Cache cleared successfully";
});//
Route::get('/', [SiteController::class, 'welcom'])->name('website.welcome');
Route::get('customer/login', [LoginController::class, 'getSignin'])->name('Signin.customer');
Route::get('customer/register', [LoginController::class, 'getSignup'])->name('Signup.customer');
Route::get('customer/register-from-link/{id}', [LoginController::class, 'getSignupFromLink'])->name('SignupFromLink.customer');
Route::post('sign-up', [LoginController::class, 'CustomerSignup'])->name('Signup');
Route::post('sign-up-from-link', [LoginController::class, 'CustomerSignupFromLink'])->name('SignupFromLink');
Route::post('sign-in', [LoginController::class, 'CustomerSignin'])->name('Signin');
Route::any('CustomerLogout', [LoginController::class, 'CustomerLogout'])->name('logout.customer');


 Route::get('/rou', function() {
     $exitCode = Artisan::call('db:seed');
     return 'Routes cache cleared';
 });

Route::middleware(['customer'])->prefix('customer')->group(function(){
    Route::get('index', [SiteController::class, 'index'])->name('webSite.index');
    Route::middleware(['check.subscription'])->group(function () {
        Route::get('works-user', [WorkController::class, 'index'])->name('webSite.work.index');
        Route::get('facebook', [WorkController::class, 'facebook'])->name('facebook');
        Route::post('faceStore', [WorkController::class, 'faceStore'])->name('faceStore');
        Route::get('youtube', [WorkController::class, 'youtube'])->name('youtube');
        Route::post('youtStore', [WorkController::class, 'youtStore'])->name('youtStore');
        Route::post('executeTask/{id}', [WorkController::class, 'executeTask'])->name('executeTask');
        //Route::post('executeTaskYoutube/{id}', [WorkController::class, 'executeTaskYoutube'])->name('execute.task.youtube');
        // end dashboard  executeTaskYoutube   executeTaskFacebook
        // Withdrawal
        Route::get('withdrawal', [WithdrawalController::class, 'index'])->name('withdrawal.index');
        Route::post('store', [WithdrawalController::class, 'store'])->name('store');
        // End Withdrawal
        // Profit
        Route::get('profit', [ProfitController::class, 'index'])->name('profit.index');
        // End Profit
        // Help
        Route::post('save-screen', [ScreenshotController::class, 'store'])->name('screenshot.store');
        Route::get('save-data', [InviteController::class, 'saveCopiedLinkData'])->name('saveCopiedLinkData');
        // End Help
    });
    // Payment
    Route::get('subscription', [SubscriptionController::class, 'subscription'])->name('subscription');
    Route::post('store-subscription', [SubscriptionController::class, 'storeSubscription'])->name('storeSubscription');
    // End Payment
    // Help
    Route::get('help', [HelpController::class, 'index'])->name('help.index');
    // End Help
    // Invite
    Route::get('Invite/{id}', [InviteController::class, 'index'])->name('invite.index');

    // End Invite
});

Route::get('Invite/create/{id}', [InviteController::class, 'create'])->name('invite.create');
Route::post('Invite/store/{id}', [InviteController::class, 'store'])->name('invite.store');
//Start Route Of Sliders
Route::get('admin/sliders', [SliderController::class, 'index'])->name('sliders.index');
Route::get('sliders/create', [SliderController::class, 'create'])->name('sliders.create');
Route::post('sliders/store', [SliderController::class, 'store'])->name('sliders.store');
Route::get('sliders/edit/{id}', [SliderController::class, 'edit'])->name('sliders.edit');
Route::put('sliders/update/{id}', [SliderController::class, 'update'])->name('sliders.update');
Route::delete('sliders/delete/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






Route::get('test/send', function (){
    $user = Customer::where('email', 'anas@anas.com')->first();
//    dd(Auth::guard('customer')->user()->verify_code);
    if ($user) {
        Notification::send($user, new SendCode('sdfasd'));
    }
});
Route::get('/forget/password/', [LoginController::class, 'getSendForgetPassword'])
    ->name('forgetPassword');

Route::post('/forget/password/', [LoginController::class, 'sendForgetPassword'])
    ->name('forgetPassword');

Route::get('/forget/password/check/{code}/{email}', [LoginController::class, 'forgetPassword'])
    ->name('forgetPasswordCheck');

Route::get('/update/password/{customer}', [LoginController::class, 'update_password'])
    ->name('update.password');


Route::post('/update/password/{customer}', [LoginController::class, 'changePassword'])
    ->name('change.password');



Route::get('customer/verify/{code}',[LoginController::class,'verifyEmail'])
    ->name('verifyEmail');;
require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
