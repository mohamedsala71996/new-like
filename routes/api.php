<?php

use App\Http\Controllers\API\Dashboard\LoginController;
use App\Http\Controllers\API\Dashboard\ProfileController;
use App\Http\Controllers\API\Dashboard\SettingController;
use App\Http\Controllers\API\Dashboard\SliderController;
use App\Http\Controllers\API\Dashboard\SubscriptionController;
use App\Http\Controllers\API\Dashboard\UserController;
use App\Http\Controllers\API\Dashboard\WithdrawalController;
use App\Http\Controllers\API\Dashboard\WorkController;
use App\Http\Controllers\API\Website\LoginSiteController;
use App\Http\Controllers\API\Website\ProfitSiteController;
use App\Http\Controllers\API\Website\ScreenshotSiteController;
use App\Http\Controllers\API\Website\SubscriptionSiteController;
use App\Http\Controllers\API\Website\WithdrawalSiteController;
use App\Http\Controllers\API\Website\WorkSiteController;
use App\Http\Controllers\Website\InviteController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*   

|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::any('subscriptions', [SubscriptionController::class, 'index'])->name('saveCopiedLinkData');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return Auth::guard('sanctum')->user();
});
Route::middleware('auth:sanctum')->get('/customer', function (Request $request) {
    return Auth::guard('sanctum')->user();
});
//********************************dashboard Route********************************************//
//user login api's
Route::post('/userSignin', [LoginController::class, 'signin']);
Route::post('/userSignup', [LoginController::class, 'signup']);
Route::post('/userLogout/{token?}', [LoginController::class, 'logout']);
//profile api's
Route::get('/profile', [ProfileController::class, 'get_Profile']);
// Route to update profile
Route::post('profile/update', [ProfileController::class, 'profileUpdate']);


//users api's
Route::apiResource('users', UserController::class);

//profile api's
// Route::get('users_profile', [ProfileController::class, 'get_Profile']);

//subscriptions api's
Route::get('subscriptions', [SubscriptionController::class, 'index']);
Route::get('subscriptions/accepted', [SubscriptionController::class, 'accepted_sub']);
Route::get('subscriptions/cancelled', [SubscriptionController::class, 'cancelled_sub']);
Route::put('subscriptions/{subscriptionId}/status/{status}', [SubscriptionController::class, 'updateStatus']);
Route::get('subscriptions/search', [SubscriptionController::class, 'search']);


//withdrawals api's
Route::get('withdrawals', [WithdrawalController::class, 'index']);
Route::get('withdrawals/accepted', [WithdrawalController::class, 'accepted_withdrawals']);
Route::get('withdrawals/rejected', [WithdrawalController::class, 'rejected_withdrawals']);
Route::put('withdrawals/{withdrawalId}/status/{status}', [WithdrawalController::class, 'updateStatus']);


//works api's
Route::get('works/facebook', [WorkController::class, 'getFacebookLinks']);
Route::get('works/youtube', [WorkController::class, 'getYoutubeLinks']);
Route::post('/works', [WorkController::class, 'store']);
Route::put('/works/{id}', [WorkController::class, 'update']);
Route::delete('/works/{id}', [WorkController::class, 'destroy']);
Route::get('works-rewiew', [WorkController::class, 'review']);
Route::any('/save-ddatas',[InviteController::class,'saveCopiedLinkData'])->name('saveCopiedLinkData');

//settings api's
Route::get('/settings', [SettingController::class, 'index']);
Route::put('/settings/update', [SettingController::class, 'update']);

//sliders api's
Route::get('/sliders', [SliderController::class, 'index']);
Route::post('/sliders', [SliderController::class, 'store']);
Route::put('/sliders/{id}', [SliderController::class, 'update']);
Route::delete('/sliders/{id}', [SliderController::class, 'destroy']);


////////////////////////// WebSite API////////////////////////////////////////////////
//customer login api's
Route::get('/getSignin', [LoginSiteController::class, 'getSignin']);
Route::post('/signin', [LoginSiteController::class, 'customerSignin']);
Route::post('/signup', [LoginSiteController::class, 'customerSignup']);
Route::post('/logout/{token?}', [LoginSiteController::class, 'customerLogout']);

Route::get('profit', [ProfitSiteController::class, 'index']);
//screenshot
Route::post('/screenshots', [ScreenshotSiteController::class, 'store']);
//subscription
Route::post('subscriptions', [SubscriptionSiteController::class, 'storeSubscription']);
//withdrawals
Route::get('withdrawals', [WithdrawalSiteController::class, 'index']);
Route::post('withdrawals', [WithdrawalSiteController::class, 'store']);
//works
Route::get('getWorks', [WorkSiteController::class, 'index']);
Route::get('facebook', [WorkSiteController::class, 'facebook']);
Route::get('youtube', [WorkSiteController::class, 'youtube']);
Route::post('execute-task/{workId}', [WorkSiteController::class, 'executeTask']);
//Route::get('save-data',[InviteController::class,'saveCopiedLinkData']);
