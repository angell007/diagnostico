<?php

// Route::redirect('/', 'login');
Route::get('/', function(){
    return view('welcome');
})->name('/');

Route::name('print')->get('/imprimir/{id?}', 'User\InformacionController@imprimir');
Route::name('save')->get('/save/{id?}', 'User\InformacionController@save');

Route::get('/import', 'Admin\ExcelController@importView');
Route::post('/import', 'Admin\ExcelController@import');

Route::get('/user/informacion/{id?}','User\InformacionController@show')->name('informacion');

// admin categories
Route::get('admin/categories', 'Admin\CategoryController@index')->name('admin.categories');
Route::get('admin/categories/datatables', 'Admin\CategoryController@datatables')->name('admin.categories.datatables');
Route::get('admin/categories/create', 'Admin\CategoryController@createModal')->name('admin.categories.create');
Route::post('admin/categories/create', 'Admin\CategoryController@create');
Route::get('admin/categories/update/{category}', 'Admin\CategoryController@updateModal')->name('admin.categories.update');
Route::patch('admin/categories/update/{category}', 'Admin\CategoryController@update');
Route::delete('admin/categories/delete/{category}', 'Admin\CategoryController@delete')->name('admin.categories.delete');

// admin enfermedads
Route::get('admin/enfermedads', 'Admin\EnfermedadController@index')->name('admin.enfermedads');
Route::get('admin/enfermedads/datatables', 'Admin\EnfermedadController@datatables')->name('admin.enfermedads.datatables');
Route::get('admin/enfermedads/create', 'Admin\EnfermedadController@createModal')->name('admin.enfermedads.create');
Route::post('admin/enfermedads/create', 'Admin\EnfermedadController@create');
Route::get('admin/enfermedads/update/{enfermedad}', 'Admin\EnfermedadController@updateModal')->name('admin.enfermedads.update');
Route::patch('admin/enfermedads/update/{enfermedad}', 'Admin\EnfermedadController@update');
Route::delete('admin/enfermedads/delete/{enfermedad}', 'Admin\EnfermedadController@delete')->name('admin.enfermedads.delete');
Route::get('admin/enfermedads/show/{enfermedad}', 'Admin\EnfermedadController@show')->name('admin.enfermedads.show');

// admin sintomas
Route::get('admin/sintomas', 'Admin\SintomaController@index')->name('admin.sintomas');
Route::get('admin/sintomas/datatables', 'Admin\SintomaController@datatables')->name('admin.sintomas.datatables');
Route::get('admin/sintomas/create', 'Admin\SintomaController@createModal')->name('admin.sintomas.create');
Route::post('admin/sintomas/create', 'Admin\SintomaController@create');
Route::get('admin/sintomas/update/{sintoma}', 'Admin\SintomaController@updateModal')->name('admin.sintomas.update');
Route::patch('admin/sintomas/update/{sintoma}', 'Admin\SintomaController@update');
Route::delete('admin/sintomas/delete/{sintoma}', 'Admin\SintomaController@delete')->name('admin.sintomas.delete');

// admin tratamientos
Route::get('admin/tratamientos', 'Admin\TratamientoController@index')->name('admin.tratamientos');
Route::get('admin/tratamientos/datatables', 'Admin\TratamientoController@datatables')->name('admin.tratamientos.datatables');
Route::get('admin/tratamientos/create', 'Admin\TratamientoController@createModal')->name('admin.tratamientos.create');
Route::post('admin/tratamientos/create', 'Admin\TratamientoController@create');
Route::get('admin/tratamientos/update/{tratamiento}', 'Admin\TratamientoController@updateModal')->name('admin.tratamientos.update');
Route::patch('admin/tratamientos/update/{tratamiento}', 'Admin\TratamientoController@update');
Route::delete('admin/tratamientos/delete/{tratamiento}', 'Admin\TratamientoController@delete')->name('admin.tratamientos.delete');

// user consultas
Route::get('user/consultas', 'User\ConsultaController@index')->name('user.consultas');
Route::get('user/consultas/datatables', 'User\ConsultaController@datatables')->name('user.consultas.datatables');
// Route::post('user/consultas/create', 'User\ConsultaController@createModal')->name('user.consultas.create');
Route::post('user/consultas/create', 'User\ConsultaController@create')->name('user.consultas.create');
Route::get('user/consultas/update/{consulta}', 'User\ConsultaController@updateModal')->name('user.consultas.update');
Route::patch('user/consultas/update/{consulta}', 'User\ConsultaController@update');
Route::delete('user/consultas/delete/{consulta}', 'User\ConsultaController@delete')->name('user.consultas.delete');
Route::get('user/historial', 'User\ConsultaController@historial')->name('user.historial');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('admin/enfermedades/addsintoma/{enfermedad?}', 'Admin\AddController@addSintoma')->name('admin.enfermedades.addsintoma');
Route::get('admin/enfermedades/addsintoma/{enfermedad?}', 'Admin\AddController@addSintomaModal')->name('admin.enfermedades.addsintoma');
Route::post('admin/enfermedades/addtratamiento/{enfermedad?}', 'Admin\AddController@addtratamiento')->name('admin.enfermedades.addtratamiento');
Route::get('admin/enfermedades/addtratamiento/{enfermedad?}', 'Admin\AddController@addtratamientoModal')->name('admin.enfermedades.addtratamiento');


Route::get('admin/sintomas/deleteSintoma/', 'Admin\AddController@deleteSintoma')->name('admin.deleteSintoma');
Route::get('admin/sintomas/deleteTratamiento/', 'Admin\AddController@deleteTratamiento')->name('admin.deleteTratamiento');

// admin.tratamientos.delete
