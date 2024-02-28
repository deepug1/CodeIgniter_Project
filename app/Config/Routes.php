<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MyController::index');
$routes->post('/MyController/insert', 'MyController::insert');
$routes->get('/address', 'AddressController::index');
$routes->post('/state', "AddressController::state");
$routes->post('/city', "AddressController::city");
$routes->post('/insertAddress', 'AddressController::insertaddress');
$routes->get('/search_data', 'SearchController::index');
$routes->post('/search', 'SearchController::search');
$routes->get('/profileview', 'SearchController::ProfileView');
$routes->get('/update-profile', 'SearchController::updateProfile');
$routes->post('/update-profile', 'SearchController::updateProfile');
$routes->post('save-updated-profile/(:segment)', 'SearchController::saveUpdatedProfile/$1');
$routes->post('/delete-profile', 'SearchController::deleteProfile');

