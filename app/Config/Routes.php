<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// User routes
$routes->get('user', 'UserController::index');            // List all users
$routes->post('user/create', 'UserController::create');    // Create a new user
$routes->get('user/(:num)', 'UserController::show/$1');    // Show user by ID
$routes->put('user/update/(:num)', 'UserController::update/$1'); // Update user
$routes->delete('user/delete/(:num)', 'UserController::delete/$1'); // Delete user

// Admin routes
$routes->get('admin', 'AdminController::index');
$routes->post('admin/create', 'AdminController::create');
// Additional admin routes as needed

// Technician routes
$routes->get('technician', 'TechnicianController::index');
$routes->post('technician/create', 'TechnicianController::create');
// Additional technician routes as needed

// ServiceRequest routes
$routes->get('service-request', 'ServiceRequestController::index');
$routes->post('service-request/create', 'ServiceRequestController::create');
$routes->get('service-request/(:num)', 'ServiceRequestController::show/$1');
$routes->put('service-request/update/(:num)', 'ServiceRequestController::update/$1');
$routes->delete('service-request/delete/(:num)', 'ServiceRequestController::delete/$1');

// ServiceHistory routes
$routes->get('service-history', 'ServiceHistoryController::index');
$routes->post('service-history/create', 'ServiceHistoryController::create');

// Feedback routes
$routes->get('feedback', 'FeedbackController::index');
$routes->post('feedback/create', 'FeedbackController::create');

// Auth routes
$routes->get('login', 'AuthController::login'); // Show login form
$routes->post('login', 'AuthController::login'); // Handle login submission
$routes->get('register', 'AuthController::register'); // Show registration form
$routes->post('register', 'AuthController::register'); // Handle registration submission
$routes->get('logout', 'AuthController::logout'); // Handle logout
