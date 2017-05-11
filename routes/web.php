<?php
Route::get('/','SessionController@homecheck');

Route::get('/users', function () {
    return view('user');
});
Route::get('/doctors', function () {
    return view('doctor');
});
Route::get('/medicalshops', function () {
    return view('medicalshop');
});

//log out
Route::get('/log_out','SessionController@log_out');




//user section
Route::get('/user/signup','SessionController@userSignup');

Route::get('/user/login','SessionController@userLogin');

Route::get('user/dashboard','SessionController@userDashboard');

Route::get('/user/doctor_search/results','UserController@doctor_search_results');

Route::get('/user/doctor_search','SessionController@doctor_search');

Route::get('/user/medical_shop_search/','SessionController@medical_shop_search');

Route::get('/user/medical_shop_search_result','UserController@medical_shop_search_result');

Route::get('/user/order_medical/{id}','UserController@order_medical');

Route::post('/user/medicine_order','UserController@medicine_order');


Route::post('/user/signup','UserController@registerUser');

Route::post('/user/login','UserController@loginUser');

Route::get('/user/doctor_search/{id}','SessionController@doctor_chat');

Route::get('/user/response/{id}','SessionController@doctor_chat_response');

Route::get('/user/doctor_messages','SessionController@doctor_messages');

Route::get('user/chat_message','UserController@chat_message');



//Doctor Section
Route::get('/doctor/signup', function () {
    return view('doctor.signup');
});
Route::get('/doctor/login', function () {
    return view('doctor.login');
});

Route::get('/doctor/messages/{id}','SessionController@user_chat');
Route::get('/doctor/response/{id}','SessionController@user_chat_response');
Route::get('/doctor/message_add','SessionController@messages_add');

Route::get('/doctor/dashboard','SessionController@doctorDashboard');

Route::post('/doctor/signup','UserController@registerDoctor');

Route::post('/doctor/login','UserController@loginDoctor');


//Medical Shop Section
Route::get('/medicalshop/signup', function () {
    return view('medicalshop.signup');
});
Route::get('/medicalshop/login', function () {
    return view('medicalshop.login');
});


Route::post('/medical/signup','UserController@registerMedical');

Route::post('/medical/login','UserController@loginMedical');

Route::get('/medicalshop/dashboard','SessionController@medicalDashboard');

Route::get('/medical/vieworder/{id}','SessionController@orderview');

Route::get('/medical/deliverorder/{id}','UserController@deliverorder');

Route::get('/medical/cancelorder/{id}','UserController@cancelorder');


