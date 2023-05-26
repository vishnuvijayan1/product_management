<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User\UserAuthController;
use App\Http\Controllers\Api\User\UserCategoryController;
use App\Http\Controllers\Api\User\UserProductController;
use App\Http\Controllers\Api\User\UserHomeController;
use App\Http\Controllers\Api\User\UserCartController;
use App\Http\Controllers\Api\User\UserPackageController;
use App\Http\Controllers\Api\User\UserBoutiqueController;
use App\Http\Controllers\Api\User\UserAddressController;
use App\Http\Controllers\Api\User\UserStockController;
use App\Http\Controllers\Api\User\UserCheckoutController;
use App\Http\Controllers\Api\User\UserVendorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api', 'prefix' => 'v1/user'], function () {
    Route::any('login', [UserAuthController::class, 'userLogin'])->name('user.login');
    Route::any('register', [UserAuthController::class, 'userRegister'])->name('user.register');

    Route::get('get-home-data', [UserHomeController::class, 'getUserHomeData'])->name('user.get-home-data');

    Route::get('get-categories', [UserCategoryController::class, 'getUserCategories'])->name('user.get-categories');

    Route::any('get-products', [UserProductController::class, 'getUserProducts'])->name('user.get-products');
    Route::get('get-product-details', [UserProductController::class, 'getUserProductDetails'])->name('user.get-product-details');
    Route::get('get-product-combination/{sale_or_auction_id}', [UserProductController::class, 'getUserProductCombination'])->name('user.get-product-combination');

    Route::get('get-cart-items', [UserCartController::class, 'getUserCartItems'])->name('user.get-cart-items');
    Route::any('add-to-cart', [UserCartController::class, 'addUserCartItem'])->name('user.add-to-cart');
    Route::any('update-cart', [UserCartController::class, 'updateUserCartItem'])->name('user.update-cart');
    Route::any('delete-cart', [UserCartController::class, 'deleteUserCartItem'])->name('user.delete-cart');

    Route::get('get-packages', [UserPackageController::class, 'getUserPackages'])->name('user.get-packages');

    Route::get('get-boutiques', [UserBoutiqueController::class, 'getUserBoutiques'])->name('user.get-boutiques');
    Route::get('get-boutique-details', [UserBoutiqueController::class, 'getUserBoutiqueDetails'])->name('user.get-boutique-details');

    Route::get('get-vendors', [UserVendorController::class, 'getUserVendors'])->name('user.get-vendors');

    Route::get('get-countries', [UserAddressController::class, 'getCountries'])->name('user.get-countries');
    Route::get('get-governorates', [UserAddressController::class, 'getGovernorates'])->name('user.get-governorates');
    Route::get('get-areas', [UserAddressController::class, 'getAreas'])->name('user.get-areas');

    Route::group(['middleware' => 'auth:api', 'api_auth'], function () {
        Route::get('user-info', [UserAuthController::class, 'userInfo'])->name('user.info');
        Route::any('logout', [UserAuthController::class, 'userLogout'])->name('user.logout');
        Route::any('add-address', [UserAddressController::class, 'userAddAddress'])->name('user.add-address');
        Route::get('get-addresses', [UserAddressController::class, 'userGetAddresses'])->name('user.get-addresses');
        Route::any('update-address', [UserAddressController::class, 'userUpdateAddress'])->name('user.update-address');
        Route::any('delete-address', [UserAddressController::class, 'userDeleteAddress'])->name('user.delete-address');
        Route::any('make-address-default', [UserAddressController::class, 'userMakeAddressDefault'])->name('user.make-address-default');

        Route::any('check-stock-items', [UserStockController::class, 'userCheckStockItems'])->name('user.check-stock-items');
        Route::any('proceed-to-checkout', [UserCheckoutController::class, 'userProceedToCheckout'])->name('user.proceed-to-checkout');
    });

});


