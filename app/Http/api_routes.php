<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['namespace' => 'API'], function() {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::resource('event_roles', 'EventRoleAPIController');

    Route::resource('event_infos', 'EventInfoAPIController');

    Route::resource('events', 'EventAPIController');

    Route::resource('contacts', 'ContactAPIController');

    Route::resource('locations', 'LocationAPIController');

    Route::resource('organizations', 'OrganizationAPIController');

    Route::get('organizations/{id}/locations', 'OrganizationAPIController@locations');

    Route::get('organizations/{id}/projects', 'OrganizationAPIController@projects');

    Route::get('organizations/{id}/events', 'OrganizationAPIController@events');

    Route::post('organizations/{id}/attach-projects', 'OrganizationAPIController@attachProjects');

    Route::post('organizations/{id}/create-projects', 'OrganizationAPIController@attachProjectOrgazanization');

    Route::post('organizations/{id}/attach-locations', 'OrganizationAPIController@attachLocations');

    Route::post('organizations/{id}/attach-events', 'OrganizationAPIController@attachEvents');

    Route::post('organizations/{id}/create-events', 'OrganizationAPIController@attachEventOrgazanization');

    Route::post('organizations/{id}/attach-sectors', 'OrganizationAPIController@attachSectors');

    Route::post('organizations/{id}/attach-roles', 'OrganizationAPIController@attachRoles');

    Route::post('organizations/{id}/attach-stages', 'OrganizationAPIController@attachStages');


    Route::post('organizations/{id}/detach-projects', 'OrganizationAPIController@detachProjects');

    Route::post('organizations/{id}/detach-events', 'OrganizationAPIController@detachEvents');

    Route::post('organizations/{id}/detach-sectors', 'OrganizationAPIController@detachSectors');

    Route::post('organizations/{id}/detach-roles', 'OrganizationAPIController@detachRoles');

    Route::post('organizations/{id}/detach-stages', 'OrganizationAPIController@detachStages');


    Route::get('organizations/{id}/contacts', 'OrganizationAPIController@contacts');

    Route::get('organization/{id}/roles', 'OrganizationAPIController@roles');

    Route::get('organization/{id}/sectors', 'OrganizationAPIController@sectors');

    Route::get('organization/{id}/stages', 'OrganizationAPIController@stages');

    Route::resource('projects', 'ProjectAPIController');

    Route::resource('project_infos', 'ProjectInfoAPIController');

    Route::resource('project_roles', 'ProjectRoleAPIController');

    Route::resource('roles', 'RoleAPIController');

    Route::get('roles/{id}/organizations', 'RoleAPIController@organizations');

    Route::resource('sectors', 'SectorAPIController');

    Route::get('sectors/{id}/organizations', 'SectorAPIController@organizations');

    Route::resource('stages', 'StageAPIController');

    Route::get('stages/{id}/organizations', 'StageAPIController@organizations');

    Route::resource('contacts', 'ContactAPIController');

    Route::resource('ecosystem_parents', 'EcosystemParentAPIController');

    Route::resource('ecosystems', 'EcosystemAPIController');

    Route::get('ecosystems/{id}/organizations', 'EcosystemAPIController@organizations');

    Route::post('ecosystems/{id}/attach-organizations', 'EcosystemAPIController@attachOrganization');

    Route::post('ecosystems/{id}/detach-organizations', 'EcosystemAPIController@detachOrganization');

    Route::get('ecosystems/{id}/locations', 'EcosystemAPIController@locations');
});
