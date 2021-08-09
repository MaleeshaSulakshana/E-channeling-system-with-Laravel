<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', function () {
    return view('pages.home');
});
Route::get('about-us', function () {
    return view('pages.about');
});

Route::post('/register-user', 'AuthController@registerUser')->name('register-user');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('user/get/all', 'UserController@getAllUsers')->name('all-users');
    Route::resource('user', 'UserController');
    Route::get('doctor/get/all', 'DoctorController@getAllDoctors')->name('all-doctors');
    Route::get('doctor/add/extra_data/{id}', 'DoctorController@addExtraData')->name('doctor.add.extra_data');
    Route::resource('doctor', 'DoctorController');
    Route::get('department/get/all', 'DepartmentController@getAllDepartments')->name('all-departments');
    Route::post('department/save/extra_data/{id}', 'DoctorController@saveExtraData')->name('doctor.save.extra_data');
    Route::resource('department', 'DepartmentController');
});

Route::group(['as'=>'patient.','prefix' => 'patient','namespace'=>'Patient','middleware'=>['auth','patient']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('all-doctors','DashboardController@getAllDoctors')->name('all-doctors');
    Route::get('doctor-profile/{id}', 'DashboardController@getDoctorProfile')->name('doctor-profile');
    Route::get('departments', 'DashboardController@getAllDepartments')->name('all-departments');
    Route::get('department-profile/{id}', 'DashboardController@getDepartmentProfile')->name('department-profile');
    Route::get('my-profile', 'DashboardController@getProfile')->name('my-profile');
    Route::patch('update-profile/{user}', 'DashboardController@updateProfile')->name('update-profile');
    Route::get('book-appoinment/{user}', 'DashboardController@bookAppoinment')->name('book-appoinment');
    Route::get('my-appoinments', 'DashboardController@getAppoinments')->name('my-appoinments');
    Route::post('add-review', 'DashboardController@addReview')->name('add-review');
    Route::post('add-appoinment', 'DashboardController@createAppoinment')->name('add-appoinment');
    Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
    Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
    Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));
    Route::get('delete-appointment/{id}', 'DashboardController@deleteAppointment')->name('delete-appointment');
});

Route::group(['as'=>'doctor.','prefix' => 'doctor','namespace'=>'Doctor','middleware'=>['auth','doctor']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('my-profile', 'DashboardController@getMyProfile')->name('my-profile');
    Route::get('appoinment-settings', 'DashboardController@changeScheduleSettings')->name('appoinment-settings');
    Route::get('changeAvaliability', 'DashboardController@changeAvaliabilty');
    Route::get('changeOnlineStatus', 'DashboardController@setOnlineStatus');
    Route::get('my-appoinments', 'DashboardController@getAllAppoinments')->name('my-appoinments');
    Route::get('my-reviews', 'DashboardController@getMyReviews')->name('my-reviews');
    Route::get('delete-appointment/{id}', 'DashboardController@deleteAppointment')->name('delete-appointment');
    Route::get('send-email', 'DashboardController@sendEmail')->name('send-email');
    Route::get('mark-as-delayed/{id}', 'DashboardController@markAsDelayed')->name('mark-as-delayed');
    Route::get('send-delay-email', 'DashboardController@sendDelayEmail')->name('send-delay-email');
});

