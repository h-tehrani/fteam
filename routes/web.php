<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\postController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\tagController;
use App\Http\Controllers\productController;
use App\Http\Controllers\orderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*user routes*/
Route::get('',[userController::class,'getIndex'])->name('getIndex');
Route::get('home',[userController::class,'getIndex'])->name('getIndex');
Route::get('about',[userController::class,'getAbout'])->name('getAbout');
Route::get('connection',[userController::class,'getConnection'])->name('getConnection');
Route::get('price',[userController::class,'getPrice'])->name('getPrice');
Route::get('jobs',[userController::class,'getJob'])->name('getJob');
Route::post('survey',[userController::class,'postSurvey'])->name('postSurvey');
Route::post('ticket',[userController::class,'postTicket'])->name('postTicket');
Route::post('order',[userController::class,'postOrder'])->name('postOrder');
Route::post('jobsrequest',[userController::class,'postJobsRequest'])->name('postJobsRequest');
Route::post('indexbuy',[userController::class,'postIndexBuy'])->name('postIndexBuy');
/*panel routes*/
Route::group(['prefix' => 'panel'], function() {
    Route::get('', [userController::class,'getPanelIndex'])->name('getPanelIndex');
    Route::any('callback',[userController::class,'panelCallBack'])->name('panelCallBack');
    Route::get('orderdelete/{id}', [userController::class,'getOrderDelete'])->name('getOrderDelete');

});
/*services routes*/
Route::group(['prefix' => 'service'], function() {
    Route::get('siteService',[userController::class,'getSiteService'])->name('getSiteService');
    Route::get('appService',[userController::class,'getAppService'])->name('getAppService');
    Route::get('templateService',[userController::class,'getTemplateService'])->name('getTemplateService');
    Route::get('pluginService',[userController::class,'getPluginService'])->name('getPluginService');
    Route::get('readySiteService',[userController::class,'getReadySiteService'])->name('getReadySiteService');
    Route::get('customerservice',[userController::class,'getCustomerService'])->name('getCustomerService');
});
/*posts routes*/
Route::group(['prefix' => 'posts'], function() {
    Route::get('posts',[postController::class,'getPosts'])->name('getPosts');
    Route::get('post/{id}',[postController::class,'getPost'])->name('getPost');
    Route::get('post/{id}/like',[postController::class,'getLikePost'])->name('getLikePost');
    Route::post('post/{id}/comment',[postController::class,'postCommentPost'])->name('postCommentPost');
});
/*products routes*/
Route::group(['prefix' => 'Products'], function() {
    Route::get('',[productController::class,'getProducts'])->name('getProducts');
    Route::get('{id}',[productController::class,'getProduct'])->name('getProduct');
    Route::get('search',[productController::class,'getSearchProduct'])->name('getSearchProduct');
});
/*admin routes*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('login', [adminController::class,'getAdminLogin'])->name('getAdminLogin');
    Route::post('signingin', [adminController::class,'postAdminLogin'])->name('postAdminLogin');
    Route::get('logout', [adminController::class,'getAdminLogOut'])->name('getAdminLogOut');
    Route::get('', [adminController::class,'getAdminIndex'])->name('getAdminIndex');
    Route::get('rateUs', [adminController::Class,'getSurvey'])->name('getSurvey');
    /*admin/job routes*/
    Route::group(['prefix' => 'job'], function() {
        Route::get('teamWorks',[adminController::class,'getAdminTeamWorks'])->name('getAdminTeamWorks');
        Route::get('deletejobs',[adminController::Class,'getJobsDelete'])->name('getJobsDelete');
        Route::get('deletejob/{id}',[adminController::class,'getJobDelete'])->name('getJobDelete');
        Route::get('jobsNumber',[adminController::class,'getJobsNumber'])->name('getJobsNumber');
        Route::get('search',[adminController::Class,'searchJob'])->name('searchJob');
    });
    /*admin/indexCOntent routes*/
    Route::group(['prefix' => 'indexcontent'], function() {
        Route::get('indexContentCreate',[adminController::class,'getIndexContentCreate'])->name('getIndexContentCreate');
        Route::post('indexContentCreate',[adminController::Class,'postIndexContentCreate'])->name('postIndexContentCreate');
    });
    /*admin/post routes*/
    Route::group(['prefix' => 'post'], function() {
        Route::get('create',[postController::class,'getPostCreate'])->name('getPostCreate');
        Route::post('create',[postController::class,'postCreatePost'])->name('postCreatePost');
        Route::get('edit/{id}',[postController::class,'getPostEdit'])->name('getPostEdit');
        Route::post('update', [postController::class,'postUpdatePost'])->name('postUpdatePost');
        Route::get('delete/{id}',[postController::class,'getPostDelete'])->name('getPostDelete');
    });
    /*admin/products routes*/
    Route::group(['prefix' => 'products'], function() {
        Route::get('manager', [productController::class,'getProductsManager'])->name('getProductsManager');
        Route::get('create', [productController::class,'getProductCreate'])->name('getProductCreate');
        Route::post('create1', [productController::class,'postProductCreate'])->name('postProductCreate');
        Route::get('edit/{id}', [productController::class,'getProductEdit'])->name('getProductEdit');
        Route::post('update', [productController::class,'postProductUpdate'])->name('postProductUpdate');
        Route::get('delete/{id}', [productController::class,'getProductDelete'])->name('getProductDelete');
    });
});
/*authentication routes*/
Auth::routes();
