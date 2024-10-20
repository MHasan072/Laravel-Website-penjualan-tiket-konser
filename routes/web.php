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

Route::get('/', function () {
    return view('User/page/landingPage');
});
Route::get('/home', function () {
    return view('User/page/landingPage');
})->name('home');

Route::get('/loginUser', function () {
    return view('User/Auth/LoginUser');
})->name('loginuser');

Route::get('/loginAdmin', function () {
    return view('Admin/Auth/LoginAdmin');
})->name('loginadmin');

Route::get('/ticket', function () {
    return view('User/Ticket/ticketPage');
})->name('ticketpage');

Route::get('/dashboard', function () {
    return view('Admin/page/dashboard');
})->name('dashboard-page');

Route::get('/event', function () {
    return view('Admin/page/eventPage');
})->name('eventpage');

Route::get('/detailPembelian', function () {
    return view('Admin/page/detailPembelian');
})->name('detailPembelian');

Route::get('/user', function () {
    return view('Admin/page/userPage');
})->name('userpage');

Route::get('/email', function () {
    return view('Admin/page/emailPage');
})->name('emailpage');

Route::get('/report', function () {
    return view('Admin/page/reportPage');
})->name('reportpage');

//Route FrontEnd
Route::get('/ticket', function () {
    return view('User/page/ticketPage');
})->name('ticketpage');

Route::prefix('event')->group(function() {
    Route::get('/tampil-event', 'EventController@index')->name('show.event');
    Route::get('/data-event', 'EventController@dataEvent')->name('data_event');
    Route::get('/data-event-json', 'EventController@dataEventJson')->name('data_event_json');
    Route::post('postevent', 'EventController@storeEvent')->name('store.event');
    Route::post('updateevent', 'EventController@updateEvent')->name('update.event');
    Route::get('editevent', 'EventController@editEvent')->name('edit.event');
    Route::get('/destroy-event/{id}', 'EventController@destroyEvent');
});

Route::prefix('tiket')->group(function() {
    Route::get('/data-tiket', 'TicketController@dataTiket')->name('data_tiket');
    Route::get('/Resi-Tiket/{id}', 'TicketController@showReceipt')->name('showReceipt');
    Route::get('/data-event-tiket', 'TicketController@dataEvent')->name('data_event_tiket');
    Route::post('posttiket', 'TicketController@storeTiket')->name('store.tiket');
    Route::post('/change-payment-status/{id}', 'TicketController@changePaymentStatus')->name('admin.change_payment_status');
    Route::get('/tiket/view-payment-proof/{id}', 'TicketController@viewPaymentProof')->name('viewPaymentProof');
});

Route::prefix('user')->group(function() {
    Route::get('/tampil-user', 'UserController@index')->name('show.user'); // Menampilkan halaman pengguna
    Route::get('/data-user', 'UserController@dataUser')->name('data_user'); // Mendapatkan data pengguna untuk DataTables
    Route::post('/postuser', 'UserController@storeUser')->name('store.user'); // Menyimpan pengguna baru
    Route::post('updateuser/{id_user}', 'UserController@updateUser')->name('update.user');
    Route::get('/edituser/{id}', 'UserController@editUser')->name('edit.user'); // Mengambil data pengguna untuk diedit
    Route::get('/destroy-user/{id}', 'UserController@destroyUser')->name('destroy.user'); // Menghapus pengguna
});



Route::get('/halamanlogin', 'LoginController@showLoginForm')->name('showlogin');
Route::post('/login', 'LoginController@login')->name('loginuserpost');
Route::post('/logout', 'LoginController@logout')->name('logoutuser');

Route::get('/halamanregister', 'RegisterController@showRegistrationForm')->name('showregister');
Route::post('/register', 'RegisterController@register')->name('registeruser');