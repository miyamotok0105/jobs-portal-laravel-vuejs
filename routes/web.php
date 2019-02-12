<?php

/**
 * Auth Not Required
 */
Route::group(['middleware' => 'cors'],function(){
    Auth::routes();
    Route::get('/', 'App\HomeController@index')->name('home');
    Route::get('/categories','App\HomeController@categories')->name('app.categories');
    Route::get('/locations','App\HomeController@locations')->name('app.locations');
    Route::get('/job/{jobID}','App\BrowseCOntroller@job')->name('browse.job');
    Route::get('/jobs-browse/{by}','App\BrowseCOntroller@jobsBrowse')->name('browse');
});


/**
 * Auth Required
 */
Route::group(['prefix' => 'dashboard' ,'middleware' => ['cors','auth']],function(){

    // Home Route
    Route::get('/','Dashboard\HomeController@index')->name('dashboard.home.index');
    // End Home Route ---------

    // Categories Routes
    Route::get('/categories',function(){return view('dashboard.categories.index');})->name('categories');
    Route::get('/categories/fetch','Dashboard\CategoriesController@fetch')->name('dashboard.categories.fetch');
    Route::post('/categories/store','Dashboard\CategoriesController@store')->name('dashboard.categories.store');
    Route::post('/categories/update/{id}','Dashboard\CategoriesController@update')->name('dashboard.categories.update');
    Route::get('/categories/destroy','Dashboard\CategoriesController@destroy')->name('dashboard.categories.destroy');
    // End Categories Route ---------

    // Companies Routes
    Route::get('/companies',function(){return view('dashboard.companies.index');})->name('companies');
    Route::get('/companies/fetch','Dashboard\CompaniesController@fetch')->name('dashboard.companies.fetch');
    Route::post('/companies/store','Dashboard\CompaniesController@store')->name('dashboard.companies.store');
    Route::post('/companies/update/{id}','Dashboard\CompaniesController@update')->name('dashboard.companies.update');
    Route::get('/companies/destroy/{id}','Dashboard\CompaniesController@destroy')->name('dashboard.companies.destroy');
    // End Companies Route ---------

    // Locations Routes
    Route::get('/locations',function(){return view('dashboard.locations.index');})->name('locations');
    Route::get('/locations/fetch','Dashboard\LocationsController@fetch')->name('dashboard.locations.fetch');
    Route::post('/locations/store','Dashboard\LocationsController@store')->name('dashboard.locations.store');
    Route::post('/locations/update/{id}','Dashboard\LocationsController@update')->name('dashboard.locations.update');
    Route::get('/locations/destroy/{id}','Dashboard\LocationsController@destroy')->name('dashboard.locations.destroy');
    // End Locations Route ---------

    // Types Routes
    Route::get('/types',function(){return view('dashboard.types.index');})->name('types');
    Route::get('/types/fetch','Dashboard\TypesController@fetch')->name('dashboard.types.fetch');
    Route::post('/types/store','Dashboard\TypesController@store')->name('dashboard.types.store');
    Route::post('/types/update/{id}','Dashboard\TypesController@update')->name('dashboard.types.update');
    Route::get('/types/destroy/{id}','Dashboard\TypesController@destroy')->name('dashboard.types.destroy');
    // End Types Route ---------

    // Jobs Routes
    Route::get('/jobs',function(){return view('dashboard.jobs.index');})->name('jobs');
    Route::get('/jobs/fetch','Dashboard\JobsController@fetch')->name('dashboard.jobs.fetch');
    Route::get('/jobs/destroy/{id}','Dashboard\JobsController@destroy')->name('dashboard.jobs.destroy');
    Route::post('/jobs/store','Dashboard\JobsController@store')->name('dashboard.jobs.store');
    Route::post('/jobs/update','Dashboard\JobsController@update')->name('dashboard.jobs.update');
    // End Jobs Route ---------

    // Users Routes
    Route::get('/users',function(){return view('dashboard.users.index');})->name('users');
    Route::get('/users/fetch','Dashboard\UsersController@fetch')->name('dashboard.users.fetch');
    Route::post('/users/store','Dashboard\UsersController@store')->name('dashboard.users.store');
    Route::get('/users/destroy/{id}','Dashboard\UsersController@destroy')->name('dashboard.users.destroy');
    // End Users Route ---------

    // Profile Routes
    Route::get('/profile',function(){return view('dashboard.users.profile');})->name('profile');
    Route::get('/profile/fetch','Dashboard\UsersController@profileFetch')->name('profile.fetch');
    Route::post('/profile/update','Dashboard\UsersController@profileUpdate')->name('profile.update');
    Route::post('/profile/update-password','Dashboard\UsersController@updatePassword')->name('profile.update.password');
});
