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
Route::post('/EquipementCreate','EquipmentController@create')->name('createEquipement');/*done*/
Route::post('/EquipementRead','EquipmentController@read')->name('readEquipement');  /*done*/
Route::post('/EquipementUpdate','EquipmentController@update')->name('updateEquipement');/*done*/
Route::post('/EquipementDelete','EquipmentController@delete')->name('deleteEquipement');/*done*/
Route::post('/EquipementReadAll','EquipmentController@readAll')->name('readAllEquipement');/*done*/
Route::post('/EquipementReadByTeam','EquipmentController@readByTeam')->name('readAllEquipement');

//Event
Route::post('/EventCreate','EventController@create')->name('createEvent');/*done*/
Route::post('/EventRead','EventController@read')->name('readEvent');/*done*/
Route::post('/EventUpdate','EventController@update')->name('updateEvent');/*done*/
Route::post('/EventDelete','EventController@delete')->name('deleteEvent');/*done*/
Route::post('/EventReadAll','EventController@readAll')->name('readAllEvent');/*done*/

//Member
Route::post('/MemberCreate','MemberController@create')->name('createMember');/*done*/
Route::post('/MemberRead','MemberController@read')->name('readMember');/*done*/
Route::post('/MemberUpdate','MemberController@update')->name('updateMember');/*done*/
Route::post('/MemberDelete','MemberController@delete')->name('deleteMember');/*done*/
Route::post('/MemberReadAll','MemberController@readAll')->name('readAllMember');/*done*/


//Project
Route::post('/ProjectCreate','ProjectController@create')->name('createProject');/*done*/
Route::post('/ProjectRead','ProjectController@read')->name('readProject');/*done*/
Route::post('/ProjectUpdate','ProjectController@update')->name('updateProject');/*done*/
Route::post('/ProjectDelete','ProjectController@delete')->name('deleteProject');/*done*/
Route::post('/ProjectReadAll','ProjectController@readAll')->name('readAllProject');/*done*/


//Reservation
Route::post('/ReservationCreate','ReservationController@create')->name('createReservation');/*done*/
Route::post('/ReservationRead','ReservationController@read')->name('readReservation');/*done*/
Route::post('/ReservationUpdate','ReservationController@update')->name('updateReservation');/*done*/
Route::post('/ReservationDelete','ReservationController@delete')->name('deleteReservation');/*done*/
Route::post('/ReservationReadAll','ReservationController@readAll')->name('readAllReservation');/*done*/


//Team
Route::post('/TeamCreate','TeamController@create')->name('createTeam');/*done*/
Route::post('/TeamRead','TeamController@read')->name('readTeam'); /*done*/
Route::post('/TeamUpdate','TeamController@update')->name('updateTeam');/*done*/
Route::post('/TeamDelete','TeamController@delete')->name('deleteTeam');/*done*/
Route::post('/TeamReadAll','TeamController@readAll')->name('readAllTeam');/*done*/


//ToDoList
Route::post('/ToDoListCreate','ToDoListController@create')->name('createToDoList');/**/
Route::post('/ToDoListRead','ToDoListController@read')->name('readToDoList');/*done*/
Route::post('/ToDoListUpdate','ToDoListController@update')->name('updateToDoList');/**/
Route::post('/ToDoListDelete','ToDoListController@delete')->name('deleteToDoList');/**/
Route::post('/ToDoListReadAll','ToDoListController@readAll')->name('readAllToDoList');/*done*/
Route::post('/ToDoListReadByProject','ToDoListController@readByProject')->name('readByProject');
