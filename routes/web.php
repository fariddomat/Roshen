<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::group([], function () {
    Route::get('/clear', function () {

        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');

        return "Cleared!";
    });
    Route::get('/', 'Home\HomeController@index')->name('home');
    Route::get('/profileDownload', 'Home\HomeController@profileDownload')->name('profileDownload');
    Route::post('/newsletter', 'Home\HomeController@newsletter')->name('newsletter');
    Route::post('/contact', 'Home\HomeController@contact')->name('contact');
    Route::get('/contact-us', 'Home\HomeController@contactPage')->name('contactPage');
    Route::post('/promoters', 'Home\HomeController@promoters')->name('promoters');
    Route::get('/categories', 'Home\CategoryControlelr@index')->name('categories');
    Route::get('/category/{id}', 'Home\CategoryControlelr@show')->name('category');


    Route::get('/about', 'Home\AboutController@index')->name('about');
    Route::get('/blogs', 'Home\BlogController@index')->name('blogs');
    Route::get('/blog/{slug}', 'Home\BlogController@show')->name('blog');

    Route::get('/services', 'Home\ServiceController@index')->name('services');
    Route::get('/services/{id}', 'Home\ServiceController@show')->name('service');

    Route::get('/projects', 'Home\ProjectControlelr@index')->name('projects');
    Route::get('/projects/{id}', 'Home\ProjectControlelr@show')->name('project');
    Route::get('/privacy', 'Home\HomeController@privacy')->name('privacy');


    Route::get('/updates', 'Home\HomeController@updates')->name('updates');


    Route::get('/sitemap.xml', 'Home\SitemapXmlController@index')->name('sitemap');
});



Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware(['auth', 'role:superadministrator|blogger'])
    ->group(
        function () {

            Route::get('/home', 'Dashboard\DashboardController@index')->name('home');

            Route::resource('users', 'Dashboard\UserController');
            Route::resource('privacies', 'Dashboard\PrivacyController');

            Route::resource('blogcategories', 'Dashboard\BlogCategoryController');
            Route::resource('blogs', 'Dashboard\BlogController');
            Route::delete('/blogs/{blog}/index-image', 'Dashboard\BlogController@destroyIndexImage')->name('blogs.indexImage.destroy');

            Route::resource('categories', 'Dashboard\CategoryController');
            Route::resource('services', 'Dashboard\ServiceController');
            Route::resource('counters', 'Dashboard\CounterController');
            Route::resource('partners', 'Dashboard\PartnerController');
            Route::resource('whies', 'Dashboard\WhyController');
            Route::resource('certs', 'Dashboard\CertificateController');
            Route::resource('reviews', 'Dashboard\ReviewController');
            Route::resource('facils', 'Dashboard\FacilController');

            Route::resource('projects', 'Dashboard\ProjectController');
            Route::get('/projects/{id}/clone', 'Dashboard\ProjectController@clone')->name('projects.clone');
            Route::post('projects/sortable', 'Dashboard\ProjectController@sort');
            Route::get('/projects/{id}/deletePdf', 'Dashboard\ProjectController@deletePdf')->name('projects.deletePdf');


            Route::resource('properties', 'Dashboard\PropertieController');
            Route::resource('promoters', 'Dashboard\PromoterController');
            Route::get('/notify', 'Dashboard\PromoterController@notify')->name('promoters.notify');
            Route::post('/send_mail', 'Dashboard\PromoterController@send_mail')->name('send_mail');

            Route::resource('apartments', 'Dashboard\ApartmentController');
            Route::post('/check/{id}', 'Dashboard\ApartmentController@check')->name('apartments.check');
            Route::get('/floors/index/{id}', 'Dashboard\FloorController@index')->name('floors.index');
            Route::post('/floors/store', 'Dashboard\FloorController@store')->name('floors.store');
            Route::get('/floors/show/{id}', 'Dashboard\FloorController@show')->name('floors.show');
            Route::post('/floors/update', 'Dashboard\FloorController@update')->name('floors.update');
            Route::get('/floors/destroy/{id}', 'Dashboard\FloorController@destroy')->name('floors.destroy');


            Route::resource('facilities', 'Dashboard\FacilityController');

            Route::get('/settings/cover', 'Dashboard\SettingController@cover')->name('setting.cover');
            Route::post('/settings/change_cover', 'Dashboard\SettingController@change_cover')->name('setting.change_cover');
            Route::get('/settings/logs', 'Dashboard\SettingController@logs')->name('setting.logs');
            Route::get('/settings/settings', 'Dashboard\SettingController@settingsText')->name('setting.settingsText');
            Route::post('/settings/setting', 'Dashboard\SettingController@settings')->name('setting.settings');
            Route::get('/settings/social', 'Dashboard\SettingController@social')->name('setting.social');
            Route::get('/settings/chart', 'Dashboard\SettingController@chart')->name('setting.chart');

            Route::get('/settings/contact', 'Dashboard\SettingController@contact')->name('setting.contact');
            Route::get('/settings/newsletter', 'Dashboard\SettingController@newsletter')->name('setting.newsletter');
            Route::get('/settings/export-csv', 'Dashboard\SettingController@exportCSV')->name('setting.export-csv');
            Route::post('/settings/markAsRead/{id}', 'Dashboard\SettingController@markAsRead')->name('setting.markAsRead');
            Route::post('/settings/contactdestroy/{id}', 'Dashboard\SettingController@contactdestroy')->name('setting.contactdestroy');


            Route::get('/settings/changePassword', 'Dashboard\SettingController@changePassword')->name('setting.changePassword');
            Route::post('/settings/changePass', 'Dashboard\SettingController@changePass')->name('setting.changePass');


            Route::get('/imageGallery/browser', 'Dashboard\ImageGalleryController@browser')->name('imageGallery.browser');
            Route::post('/imageGallery/uploader', 'Dashboard\ImageGalleryController@uploader')->name('imageGallery.uploader');

            Route::delete('/project-image/{id}', 'Dashboard\ProjectController@removeImage')->name('removeImage');
            Route::delete('/apartment-image/{id}', 'Dashboard\ApartmentController@removeImage')->name('removeImage.apartment');

            Route::get('/about', 'Dashboard\AboutController@create')->name('about.create');
            Route::post('/about', 'Dashboard\AboutController@store')->name('about.store');
        }
    );



Auth::routes(['register' => false]);
