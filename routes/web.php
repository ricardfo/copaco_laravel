<?php

Route::get('/', 'IndexController@index');

# resources
Route::resource('/equipamentos', 'EquipamentoController');
Route::resource('/redes', 'RedeController');
Route::resource('/roles', 'RoleController');

# rotas para a senha única
Route::get('/login', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('/logout', 'Auth\LoginController@logout');

# config
Route::get('/config', 'ConfigController@index');
Route::post('/dhcpd.conf', 'DhcpController@dhcpd');
Route::post('/freeradius/file', 'FreeradiusController@file');
Route::post('/freeradius/sincronize', 'FreeradiusController@sincronize');

