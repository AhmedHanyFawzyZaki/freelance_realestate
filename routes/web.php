<?php

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

Auth::routes();
Route::group(['middleware' => ['setLocale']], function () {
    Route::get('/', 'HomeController@index')->name('landing');
    Route::post('/contactUs', 'HomeController@contact')->name('contactUs');
    Route::get('/home', 'HomeController@index')->name('home');
});
// Check role in route middleware
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'Admin'], function () {
    Route::get('/', 'AdminController@index');
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('users', 'UsersController');
    Route::get('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
    Route::post('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
});


/* * ************************************************************************************** */
/* * ************************************************************************************** */
/* * ************************************************************************************** */
/*
 * localization
 */

Route::get('language/{locale}', function ($locale) {
    Session::put('locale', $locale);

    return redirect()->route('home');
});

/*
 * partner image
 */
Route::get('/partnerImage/{filename}', function ($filename) {
    $path = storage_path() . '/app/public/images/partners/' . $filename;

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('partnerImage');

Route::get('/propertyImage/{filename}', function ($filename) {
    $path = storage_path() . '/app/public/images/properties/' . $filename;

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('propertyImage');

Route::resource('admin/pages', 'Admin\\PagesController');

Route::resource('admin/partners', 'Admin\\PartnersController');

Route::resource('admin/properties', 'Admin\\PropertiesController');

Route::resource('admin/messages', 'Admin\\MessagesController');
