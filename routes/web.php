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
    return view('welcome');
});
//Equipments
Route::get('/EquipementCreate','EquipmentController@create')->name('createEquipement');
Route::get('/EquipementRead','EquipmentController@read')->name('readEquipement');
Route::get('/EquipementUpdate','EquipmentController@update')->name('updateEquipement');
Route::get('/EquipementDelete','EquipmentController@delete')->name('deleteEquipement');
Route::get('/EquipementReadAll','EquipmentController@readAll')->name('readAllEquipement');

//Event
Route::get('/EventCreate','EventController@create')->name('createEvent');
Route::get('/EventRead','EventController@read')->name('readEvent');
Route::get('/EventUpdate','EventController@update')->name('updateEvent');
Route::get('/EventDelete','EventController@delete')->name('deleteEvent');
Route::get('/EventReadAll','EventController@readAll')->name('readAllEvent');

//Member
Route::get('/MemberCreate','MemberController@create')->name('createMember');
Route::get('/MemberRead','MemberController@read')->name('readMember');
Route::get('/MemberUpdate','MemberController@update')->name('updateMember');
Route::get('/MemberDelete','MemberController@delete')->name('deleteMember');
Route::get('/MemberReadAll','MemberController@readAll')->name('readAllMember');


//Project
Route::get('/ProjectCreate','ProjectController@create')->name('createProject');
Route::get('/ProjectRead','ProjectController@read')->name('readProject');
Route::get('/ProjectUpdate','ProjectController@update')->name('updateProject');
Route::get('/ProjectDelete','ProjectController@delete')->name('deleteProject');
Route::get('/ProjectReadAll','ProjectController@readAll')->name('readAllProject');


//Reservation
Route::get('/ReservationCreate','ReservationController@create')->name('createReservation');
Route::get('/ReservationRead','ReservationController@read')->name('readReservation');
Route::get('/ReservationUpdate','ReservationController@update')->name('updateReservation');
Route::get('/ReservationDelete','ReservationController@delete')->name('deleteReservation');
Route::get('/ReservationReadAll','ReservationController@readAll')->name('readAllReservation');


//Team
Route::get('/TeamCreate','TeamController@create')->name('createTeam');
Route::get('/TeamRead','TeamController@read')->name('readTeam');
Route::get('/TeamUpdate','TeamController@update')->name('updateTeam');
Route::get('/TeamDelete','TeamController@delete')->name('deleteTeam');
Route::get('/TeamReadAll','TeamController@readAll')->name('readAllTeam');


//ToDoList
Route::get('/ToDoListCreate','ToDoListController@create')->name('createToDoList');
Route::get('/ToDoListRead','ToDoListController@read')->name('readToDoList');
Route::get('/ToDoListUpdate','ToDoListController@update')->name('updateToDoList');
Route::get('/ToDoListDelete','ToDoListController@delete')->name('deleteToDoList');
Route::get('/ToDoListReadAll','ToDoListController@readAll')->name('readAllToDoList');
