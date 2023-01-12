<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Frontend::index');
$routes->get('/details/(:any)', 'Frontend::details/$1');
$routes->get('/dynamic-page-content', 'Frontend::dynamicPageContent');
$routes->get('/not-found', 'Frontend::notFound');

$routes->get('/signup', 'Frontend::signup');
$routes->post('/signup', 'Frontend::signupPost');
$routes->get('/signin', 'Frontend::signin');
$routes->post('/signin', 'Frontend::signinPost');
$routes->get('/forgot-password', 'Frontend::forgotPassword');
$routes->post('/forgot-password-post', 'Frontend::forgotPasswordPost');
$routes->post('/sign-out', 'Frontend::signOut');

$routes->get('/dashboard', 'Frontend::dashboard');
$routes->get('/profile', 'Frontend::profile');
$routes->post('/profile', 'Frontend::profilePost');
$routes->get('/change-password', 'Frontend::changePassword');
$routes->post('/change-password', 'Frontend::changePasswordPost');
$routes->get('/booking', 'Frontend::bookingList');
$routes->get('/new-booking', 'Frontend::newBooking');
$routes->post('/new-booking', 'Frontend::newBooking');
$routes->get('/checkout/(:any)', 'Frontend::checkout/$1');
$routes->post('/checkout/(:any)', 'Frontend::checkout/$1');
$routes->get('/process-payment/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)', 'Frontend::callback_payment/$1/$2/$3/$4/$5/$6');
$routes->get('/payment-success/(:any)', 'Frontend::paymentSuccess/$1');
$routes->get('/payment-failure/(:any)', 'Frontend::paymentFailure/$1');
$routes->get('/wishlist', 'Frontend::wishlist');
$routes->post('/set-cookie', 'Frontend::setCookie');

$routes->get('/event/(:any)', 'Frontend::event/$1');
$routes->get('/contact-us', 'Frontend::contactUs');
$routes->post('/contact-us', 'Frontend::contactUs');
$routes->post('/submit-subscribe', 'Frontend::submitSubscribe');
$routes->get('/page/(:any)', 'Frontend::page/$1');
$routes->post('/submit-subscriber', 'Frontend::submitSubscriber');
$routes->get('/video-gallery', 'Frontend::videoGallery');
$routes->get('/speakers', 'Frontend::speakers');
$routes->get('/event-category', 'Frontend::event_category');



/* Admin Panel */
$routes->get('/Administrator', 'Admin/User::login');
$routes->get('/reset-password', 'Admin/User::forgot_password');
$routes->get('/Dashboard', 'Admin/User::index');
$routes->get('/static_content', 'Admin/Manage_static_content::index');
$routes->get('/Comittee', 'Admin/Manage_comittee::index');

/* Admin Panel */

$routes->get('/quiz', 'Frontend::quiz');
$routes->post('/quiz', 'Frontend::quizData');
$routes->get('/thank-you', 'Frontend::thankYou');
$routes->get('/applied', 'Frontend::Applied');
$routes->get('/poll-history', 'Frontend::pollHistory');

/* API */
    $routes->group("api", ["namespace" => "App\Controllers"], function($routes){
        $routes->post("signup/", "Api::signup");
        $routes->post("check-email/", "Api::checkEmail");
        $routes->post("otp-email-validate/", "Api::otpEmailValidate");
        $routes->post("check-phone/", "Api::checkPhone");
        $routes->post("otp-validate/", "Api::otpValidate");
        $routes->post("otp-resend/", "Api::otpResend");
        $routes->post("signin/", "Api::signin");
        $routes->post("signout/", "Api::signout");
        $routes->post("edit-profile/", "Api::editProfile");
        $routes->post("update-profile/", "Api::updateProfile");
        $routes->post("change-password/", "Api::changePassword");
        $routes->post("booking-list/", "Api::bookingList");
        $routes->post("wishlist/", "Api::wishlist");
        $routes->post("add-to-wishlist/", "Api::addToWishlist");
        $routes->post("add-to-wishlist/", "Api::addToWishlist");
        $routes->post("event-details/", "Api::eventDetails");
        $routes->post("page-content/", "Api::pageContent");
        $routes->post("account-delete/", "Api::accountDelete");
    });
/* API */

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
