<?php

// Route::middleware('auth')->group(function () {
    Route::get('/r', function () {
        function philsroutes(): void
        {
            $routeCollection = Route::getRoutes();
            echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">';
            echo "<div class='container'><div class='col-md-12'><table class='table table-striped' style='width:100%'>";
            echo '<tr>';
            echo "<td width='10%'><h4>HTTP Method</h4></td>";
            echo "<td width='30%'><h4>URL</h4></td>";
            echo "<td width='30%'><h4>Route</h4></td>";
            echo "<td width='30%'><h4>Corresponding Action</h4></td>";
            echo '</tr>';

            foreach ($routeCollection as $value) {
                echo '<tr>';
                echo '<td>'.$value->methods()[0].'</td>';
                echo "<td><a href='".$value->uri()."' target='_blank'>".$value->uri().'</a> </td>';
                echo '<td>'.$value->getName().'</td>';
                echo '<td>'.$value->getActionName().'</td>';
                echo '</tr>';
            }

            echo '</table></div></div>';
            echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';
        }

        return philsroutes();
    });
// });


Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    // Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
   Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    
});


Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('clips', 'Admin\ClipsController');
    Route::post('clips_mass_destroy', ['uses' => 'Admin\ClipsController@massDestroy', 'as' => 'clips.mass_destroy']);
    Route::post('clips_restore/{id}', ['uses' => 'Admin\ClipsController@restore', 'as' => 'clips.restore']);
    Route::delete('clips_perma_del/{id}', ['uses' => 'Admin\ClipsController@perma_del', 'as' => 'clips.perma_del']);
    Route::resource('galleries', 'Admin\GalleriesController');
    Route::resource('single_channels', 'Admin\SingleChannelsController');
    Route::resource('multi_channels', 'Admin\MultiChannelsController');
    Route::resource('all_channels', 'Admin\AllChannelsController');
    Route::resource('clip_filters', 'Admin\ClipFiltersController');
    Route::post('clip_filters_mass_destroy', ['uses' => 'Admin\ClipFiltersController@massDestroy', 'as' => 'clip_filters.mass_destroy']);
    Route::post('clip_filters_restore/{id}', ['uses' => 'Admin\ClipFiltersController@restore', 'as' => 'clip_filters.restore']);
    Route::delete('clip_filters_perma_del/{id}', ['uses' => 'Admin\ClipFiltersController@perma_del', 'as' => 'clip_filters.perma_del']);
    Route::resource('states', 'Admin\StatesController');
    Route::post('states_mass_destroy', ['uses' => 'Admin\StatesController@massDestroy', 'as' => 'states.mass_destroy']);
    Route::post('states_restore/{id}', ['uses' => 'Admin\StatesController@restore', 'as' => 'states.restore']);
    Route::delete('states_perma_del/{id}', ['uses' => 'Admin\StatesController@perma_del', 'as' => 'states.perma_del']);
    Route::resource('brands', 'Admin\BrandsController');
    Route::post('brands_mass_destroy', ['uses' => 'Admin\BrandsController@massDestroy', 'as' => 'brands.mass_destroy']);
    Route::post('brands_restore/{id}', ['uses' => 'Admin\BrandsController@restore', 'as' => 'brands.restore']);
    Route::delete('brands_perma_del/{id}', ['uses' => 'Admin\BrandsController@perma_del', 'as' => 'brands.perma_del']);
    Route::resource('products', 'Admin\ProductsController');
    Route::post('products_mass_destroy', ['uses' => 'Admin\ProductsController@massDestroy', 'as' => 'products.mass_destroy']);
    Route::post('products_restore/{id}', ['uses' => 'Admin\ProductsController@restore', 'as' => 'products.restore']);
    Route::delete('products_perma_del/{id}', ['uses' => 'Admin\ProductsController@perma_del', 'as' => 'products.perma_del']);
    Route::resource('industries', 'Admin\IndustriesController');
    Route::post('industries_mass_destroy', ['uses' => 'Admin\IndustriesController@massDestroy', 'as' => 'industries.mass_destroy']);
    Route::post('industries_restore/{id}', ['uses' => 'Admin\IndustriesController@restore', 'as' => 'industries.restore']);
    Route::delete('industries_perma_del/{id}', ['uses' => 'Admin\IndustriesController@perma_del', 'as' => 'industries.perma_del']);
    Route::resource('dyna_video_cuts', 'Admin\DynaVideoCutsController');
    Route::resource('google_cloud_visions', 'Admin\GoogleCloudVisionsController');
    Route::resource('image_magics', 'Admin\ImageMagicsController');
    Route::resource('tocai_servers', 'Admin\TocaiServersController');
    Route::resource('interactivities', 'Admin\InteractivitiesController');
    Route::resource('register_new_clips', 'Admin\RegisterNewClipsController');
    Route::resource('dedups', 'Admin\DedupsController');
    Route::resource('redistributions', 'Admin\RedistributionsController');
    Route::resource('auto_group_detections', 'Admin\AutoGroupDetectionsController');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('ftps', 'Admin\FtpsController');
    Route::post('ftps_mass_destroy', ['uses' => 'Admin\FtpsController@massDestroy', 'as' => 'ftps.mass_destroy']);
    Route::post('ftps_restore/{id}', ['uses' => 'Admin\FtpsController@restore', 'as' => 'ftps.restore']);
    Route::delete('ftps_perma_del/{id}', ['uses' => 'Admin\FtpsController@perma_del', 'as' => 'ftps.perma_del']);
    Route::resource('images', 'Admin\ImagesController');
    Route::post('images_mass_destroy', ['uses' => 'Admin\ImagesController@massDestroy', 'as' => 'images.mass_destroy']);
    Route::post('images_restore/{id}', ['uses' => 'Admin\ImagesController@restore', 'as' => 'images.restore']);
    Route::delete('images_perma_del/{id}', ['uses' => 'Admin\ImagesController@perma_del', 'as' => 'images.perma_del']);
    Route::resource('videos', 'Admin\VideosController');
    Route::post('videos_mass_destroy', ['uses' => 'Admin\VideosController@massDestroy', 'as' => 'videos.mass_destroy']);
    Route::post('videos_restore/{id}', ['uses' => 'Admin\VideosController@restore', 'as' => 'videos.restore']);
    Route::delete('videos_perma_del/{id}', ['uses' => 'Admin\VideosController@perma_del', 'as' => 'videos.perma_del']);



 
});
