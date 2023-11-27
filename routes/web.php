<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);

//Home
Route::get('/', [App\Http\Controllers\Frontend\HomeFrontendController::class, 'homePageLoad'])->name('frontend.home');

//Home
Route::get('/search', [App\Http\Controllers\Frontend\SearchController::class, 'getSearchData'])->name('frontend.search');

Route::get('/contact/{id}/{title}', [App\Http\Controllers\Frontend\ContactController::class, 'getContactData'])->name('frontend.contact');
Route::post('/frontend/sentMessage', [App\Http\Controllers\Frontend\ContactController::class, 'sentMessage'])->name('frontend.sentMessage');

Route::get('/page/{id}/{title}', [App\Http\Controllers\Frontend\PageController::class, 'getPage'])->name('frontend.page');

//Category
Route::get('/category/{id}/{title}', [App\Http\Controllers\Frontend\RoomsController::class, 'getCategoryPage'])->name('frontend.category');

// Room
Route::get('/room/{id}/{title}', [App\Http\Controllers\Frontend\RoomsController::class, 'getRoomPage'])->name('frontend.room');

//Blog
Route::get('/blog', [App\Http\Controllers\Frontend\BlogController::class, 'getBlogPage'])->name('frontend.blog');
Route::get('/blog-category/{id}/{title}', [App\Http\Controllers\Frontend\BlogController::class, 'getBlogCategoryPage'])->name('frontend.blog-category');
Route::get('/article/{id}/{title}', [App\Http\Controllers\Frontend\BlogController::class, 'getArticlePage'])->name('frontend.article');

//Customer Authentication
Route::get('/user/login', [App\Http\Controllers\Backend\CustomerAuthController::class, 'LoadLogin'])->name('frontend.login');
Route::post('/user/customer-login', [App\Http\Controllers\Backend\CustomerAuthController::class, 'CustomerLogin'])->name('frontend.customer-login');
Route::get('/user/register', [App\Http\Controllers\Backend\CustomerAuthController::class, 'LoadRegister'])->name('frontend.register');
Route::post('/user/customer-register', [App\Http\Controllers\Backend\CustomerAuthController::class, 'CustomerRegister'])->name('frontend.customer-register');
Route::get('/user/reset', [App\Http\Controllers\Backend\CustomerAuthController::class, 'LoadReset'])->name('frontend.reset');
Route::post('/user/resetPassword', [App\Http\Controllers\Backend\CustomerAuthController::class, 'resetPassword'])->name('frontend.resetPassword');
Route::post('/user/resetPasswordUpdate', [App\Http\Controllers\Backend\CustomerAuthController::class, 'resetPasswordUpdate'])->name('frontend.resetPasswordUpdate');

//My Dashboard
Route::get('/user/my-dashboard', [App\Http\Controllers\Frontend\MyDashboardController::class, 'LoadMyDashboard'])->name('frontend.my-dashboard')->middleware('auth');
Route::get('/user/my-booking', [App\Http\Controllers\Frontend\MyDashboardController::class, 'LoadMyBooking'])->name('frontend.my-booking')->middleware('auth');
Route::get('/user/my-profile', [App\Http\Controllers\Frontend\MyDashboardController::class, 'LoadMyProfile'])->name('frontend.my-profile')->middleware('auth');
Route::post('/user/UpdateProfile', [App\Http\Controllers\Frontend\MyDashboardController::class, 'UpdateProfile'])->name('frontend.UpdateProfile')->middleware('auth');
Route::get('/user/change-password', [App\Http\Controllers\Frontend\MyDashboardController::class, 'LoadChangePassword'])->name('frontend.change-password')->middleware('auth');
Route::post('/user/ChangePassword', [App\Http\Controllers\Frontend\MyDashboardController::class, 'ChangePassword'])->name('frontend.ChangePassword')->middleware('auth');
Route::get('/invoice-details/{id}/{booking_no}', [App\Http\Controllers\Frontend\MyDashboardController::class, 'MyOrderDetails'])->name('frontend.invoice-details');

//Checkout
Route::get('/checkout/{id}/{title}', [App\Http\Controllers\Frontend\CheckoutFrontController::class, 'LoadCheckout'])->name('frontend.checkout');
Route::post('/frontend/send_booking_request', [App\Http\Controllers\Frontend\CheckoutFrontController::class, 'SendBookingRequest'])->name('frontend.send_booking_request');
Route::get('/thank', [App\Http\Controllers\Frontend\CheckoutFrontController::class, 'LoadThank'])->name('frontend.thank');
Route::get('/paypal-payment-status', [App\Http\Controllers\Frontend\CheckoutFrontController::class, 'getPaypalPaymentStatus'])->name('frontend.paypal-payment-status');
Route::post('/frontend/getCheckOutTotalPrice', [App\Http\Controllers\Frontend\CheckoutFrontController::class, 'getCheckOutTotalPrice'])->name('frontend.getCheckOutTotalPrice');

//Invoice
Route::get('/invoice/{id}/{booking_no}', [App\Http\Controllers\Frontend\InvoiceController::class, 'getInvoice'])->name('frontend.invoice');

//Subscribe
Route::post('/frontend/saveSubscriber', [App\Http\Controllers\Backend\NewslettersController::class, 'saveSubscriberData'])->name('frontend.saveSubscriber');
Route::post('/frontend/subscribePopupOff', [App\Http\Controllers\Backend\NewslettersController::class, 'subscribePopupOff'])->name('frontend.subscribePopupOff');

Route::prefix('backend')->group(function(){

	//Not Found Page
	Route::get('/notfound', [App\Http\Controllers\HomeController::class, 'notFoundPage'])->name('backend.notfound')->middleware('auth');

	//Dashboard
	Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'getDashboardData'])->name('backend.dashboard')->middleware(['auth','is_admin']);
	Route::post('/getMonthlyChartReport', [App\Http\Controllers\Backend\DashboardController::class, 'getMonthlyChartReport'])->name('backend.getMonthlyChartReport')->middleware(['auth','is_admin']);

	//Room List
	Route::get('/room-list', [App\Http\Controllers\Backend\RoomListController::class, 'getRoomListPageLoad'])->name('backend.room-list')->middleware(['auth','is_admin']);
	Route::get('/getRoomsListTableData', [App\Http\Controllers\Backend\RoomListController::class, 'getRoomsListTableData'])->name('backend.getRoomsListTableData')->middleware(['auth','is_admin']);

	//Booking Request
	Route::get('/booking-request', [App\Http\Controllers\Backend\BookingController::class, 'getBookingRequestPageLoad'])->name('backend.booking-request')->middleware(['auth','is_admin']);
	Route::get('/getBookingRequestTableData', [App\Http\Controllers\Backend\BookingController::class, 'getBookingRequestTableData'])->name('backend.getBookingRequestTableData')->middleware(['auth','is_admin']);
	Route::get('/booking/{id}/{type}', [App\Http\Controllers\Backend\BookingController::class, 'getBookingData'])->name('backend.booking')->middleware(['auth','is_admin']);
	Route::post('/updateBookingStatus', [App\Http\Controllers\Backend\BookingController::class, 'updateBookingStatus'])->name('backend.updateBookingStatus')->middleware(['auth','is_admin']);
	Route::post('/updateRoomDate', [App\Http\Controllers\Backend\BookingController::class, 'updateRoomDate'])->name('backend.updateRoomDate')->middleware(['auth','is_admin']);
	Route::get('/getPaymentBookingStatusData', [App\Http\Controllers\Backend\BookingController::class, 'getPaymentBookingStatusData'])->name('backend.getPaymentBookingStatusData')->middleware(['auth','is_admin']);
	Route::post('/deleteBookingRequest', [App\Http\Controllers\Backend\BookingController::class, 'deleteBookingRequest'])->name('backend.deleteBookingRequest')->middleware(['auth','is_admin']);
	Route::post('/bulkActionBookingRequest', [App\Http\Controllers\Backend\BookingController::class, 'bulkActionBookingRequest'])->name('backend.bulkActionBookingRequest')->middleware(['auth','is_admin']);

	//All Booking
	Route::get('/all-booking', [App\Http\Controllers\Backend\BookingController::class, 'getAllBookingPageLoad'])->name('backend.all-booking')->middleware(['auth','is_admin']);
	Route::get('/getAllBookingTableData', [App\Http\Controllers\Backend\BookingController::class, 'getAllBookingTableData'])->name('backend.getAllBookingTableData')->middleware(['auth','is_admin']);

	//Book Room
	Route::get('/book-room', [App\Http\Controllers\Backend\BookingController::class, 'getBookRoomPageLoad'])->name('backend.book-room')->middleware(['auth','is_admin']);
	Route::post('/BookRoomRequest', [App\Http\Controllers\Backend\BookingController::class, 'BookRoomRequest'])->name('backend.BookRoomRequest')->middleware(['auth','is_admin']);
	Route::post('/CheckRoomCount', [App\Http\Controllers\Backend\BookingController::class, 'CheckRoomCount'])->name('backend.CheckRoomCount')->middleware(['auth','is_admin']);

	//Assign Room
	Route::post('/getAssignRoomData', [App\Http\Controllers\Backend\BookingController::class, 'getAssignRoomData'])->name('backend.getAssignRoomData')->middleware(['auth','is_admin']);
	Route::get('/getRoomListTableData', [App\Http\Controllers\Backend\BookingController::class, 'getRoomListTableData'])->name('backend.getRoomListTableData')->middleware(['auth','is_admin']);
	Route::post('/saveAssignRoomData', [App\Http\Controllers\Backend\BookingController::class, 'saveAssignRoomData'])->name('backend.saveAssignRoomData')->middleware(['auth','is_admin']);
	Route::post('/deleteAssignRoom', [App\Http\Controllers\Backend\BookingController::class, 'deleteAssignRoom'])->name('backend.deleteAssignRoom')->middleware(['auth','is_admin']);

	//Excel/CSV Export
	Route::get('/excel-export', [App\Http\Controllers\Backend\ExportController::class, 'ExcelExport'])->name('backend.excel-export')->middleware(['auth','is_admin']);
	Route::get('/csv-export', [App\Http\Controllers\Backend\ExportController::class, 'OrdersCSVExport'])->name('backend.csv-export')->middleware(['auth','is_admin']);

	//Room Type
	Route::get('/room-type', [App\Http\Controllers\Backend\RoomsController::class, 'getRoomTypePageLoad'])->name('backend.room-type')->middleware(['auth','is_admin']);
	Route::get('/getRoomTypeTableData', [App\Http\Controllers\Backend\RoomsController::class, 'getRoomTypeTableData'])->name('backend.getRoomTypeTableData')->middleware(['auth','is_admin']);
	Route::post('/saveRoomTypeData', [App\Http\Controllers\Backend\RoomsController::class, 'saveRoomTypeData'])->name('backend.saveRoomTypeData')->middleware(['auth','is_admin']);
	Route::post('/deleteRoomType', [App\Http\Controllers\Backend\RoomsController::class, 'deleteRoomType'])->name('backend.deleteRoomType')->middleware(['auth','is_admin']);
	Route::post('/bulkActionRoomType', [App\Http\Controllers\Backend\RoomsController::class, 'bulkActionRoomType'])->name('backend.bulkActionRoomType')->middleware(['auth','is_admin']);
	Route::post('/hasRoomSlug', [App\Http\Controllers\Backend\RoomsController::class, 'hasRoomSlug'])->name('backend.hasRoomSlug')->middleware(['auth','is_admin']);
	//Update
	Route::get('/room/{id}', [App\Http\Controllers\Backend\RoomsController::class, 'getRoomPageData'])->name('backend.room')->middleware(['auth','is_admin']);
	Route::post('/updateRoomsData', [App\Http\Controllers\Backend\RoomsController::class, 'updateRoomsData'])->name('backend.updateRoomsData')->middleware(['auth','is_admin']);

	//Rooms
	Route::get('/rooms/{id}', [App\Http\Controllers\Backend\RoomsController::class, 'getRoomsPageLoad'])->name('backend.rooms')->middleware(['auth','is_admin']);
	Route::get('/getRoomsTableData', [App\Http\Controllers\Backend\RoomsController::class, 'getRoomsTableData'])->name('backend.getRoomsTableData')->middleware(['auth','is_admin']);
	Route::post('/saveRoomsData', [App\Http\Controllers\Backend\RoomsController::class, 'saveRoomsData'])->name('backend.saveRoomsData')->middleware(['auth','is_admin']);
	Route::post('/getRoomById', [App\Http\Controllers\Backend\RoomsController::class, 'getRoomById'])->name('backend.getRoomById')->middleware(['auth','is_admin']);
	Route::post('/deleteRoom', [App\Http\Controllers\Backend\RoomsController::class, 'deleteRoom'])->name('backend.deleteRoom')->middleware(['auth','is_admin']);
	Route::post('/bulkActionRoom', [App\Http\Controllers\Backend\RoomsController::class, 'bulkActionRoom'])->name('backend.bulkActionRoom')->middleware(['auth','is_admin']);

	//Price
	Route::get('/price/{id}', [App\Http\Controllers\Backend\RoomsController::class, 'getPricePageData'])->name('backend.price')->middleware(['auth','is_admin']);
	Route::post('/savePriceData', [App\Http\Controllers\Backend\RoomsController::class, 'savePriceData'])->name('backend.savePriceData')->middleware(['auth','is_admin']);

	//Room Images
	Route::get('/room-images/{id}', [App\Http\Controllers\Backend\RoomsController::class, 'getRoomImagesPageData'])->name('backend.room-images')->middleware(['auth','is_admin']);
	Route::get('/getRoomImagesTableData', [App\Http\Controllers\Backend\RoomsController::class, 'getRoomImagesTableData'])->name('backend.getRoomImagesTableData')->middleware(['auth','is_admin']);
	Route::post('/saveRoomImagesData', [App\Http\Controllers\Backend\RoomsController::class, 'saveRoomImagesData'])->name('backend.saveRoomImagesData')->middleware(['auth','is_admin']);
	Route::post('/deleteRoomImages', [App\Http\Controllers\Backend\RoomsController::class, 'deleteRoomImages'])->name('backend.deleteRoomImages')->middleware(['auth','is_admin']);

	//Room SEO
	Route::get('/room-seo/{id}', [App\Http\Controllers\Backend\RoomsController::class, 'getRoomSEOPageData'])->name('backend.room-seo')->middleware(['auth','is_admin']);
	Route::post('/saveRoomSEOData', [App\Http\Controllers\Backend\RoomsController::class, 'saveRoomSEOData'])->name('backend.saveRoomSEOData')->middleware(['auth','is_admin']);

	//Categories
	Route::get('/categories', [App\Http\Controllers\Backend\CategoriesController::class, 'getCategoriesPageLoad'])->name('backend.categories')->middleware(['auth','is_admin']);
	Route::get('/getCategoriesTableData', [App\Http\Controllers\Backend\CategoriesController::class, 'getCategoriesTableData'])->name('backend.getCategoriesTableData')->middleware(['auth','is_admin']);
	Route::post('/saveCategoriesData', [App\Http\Controllers\Backend\CategoriesController::class, 'saveCategoriesData'])->name('backend.saveCategoriesData')->middleware(['auth','is_admin']);
	Route::post('/getCategoriesById', [App\Http\Controllers\Backend\CategoriesController::class, 'getCategoriesById'])->name('backend.getCategoriesById')->middleware(['auth','is_admin']);
	Route::post('/deleteCategories', [App\Http\Controllers\Backend\CategoriesController::class, 'deleteCategories'])->name('backend.deleteCategories')->middleware(['auth','is_admin']);
	Route::post('/bulkActionCategories', [App\Http\Controllers\Backend\CategoriesController::class, 'bulkActionCategories'])->name('backend.bulkActionCategories')->middleware(['auth','is_admin']);
	Route::post('/hasCategorySlug', [App\Http\Controllers\Backend\CategoriesController::class, 'hasCategorySlug'])->name('backend.hasCategorySlug')->middleware(['auth','is_admin']);

	//Amenities
	Route::get('/amenities', [App\Http\Controllers\Backend\AmenitiesController::class, 'getAmenitiesPageLoad'])->name('backend.amenities')->middleware(['auth','is_admin']);
	Route::get('/getAmenitiesTableData', [App\Http\Controllers\Backend\AmenitiesController::class, 'getAmenitiesTableData'])->name('backend.getAmenitiesTableData')->middleware(['auth','is_admin']);
	Route::post('/saveAmenitiesData', [App\Http\Controllers\Backend\AmenitiesController::class, 'saveAmenitiesData'])->name('backend.saveAmenitiesData')->middleware(['auth','is_admin']);
	Route::post('/getAmenityById', [App\Http\Controllers\Backend\AmenitiesController::class, 'getAmenityById'])->name('backend.getAmenityById')->middleware(['auth','is_admin']);
	Route::post('/deleteAmenity', [App\Http\Controllers\Backend\AmenitiesController::class, 'deleteAmenity'])->name('backend.deleteAmenity')->middleware(['auth','is_admin']);
	Route::post('/bulkActionAmenity', [App\Http\Controllers\Backend\AmenitiesController::class, 'bulkActionAmenity'])->name('backend.bulkActionAmenity')->middleware(['auth','is_admin']);

	//Complements
	Route::get('/complements', [App\Http\Controllers\Backend\ComplementsController::class, 'getComplementsPageLoad'])->name('backend.complements')->middleware(['auth','is_admin']);
	Route::get('/getComplementsTableData', [App\Http\Controllers\Backend\ComplementsController::class, 'getComplementsTableData'])->name('backend.getComplementsTableData')->middleware(['auth','is_admin']);
	Route::post('/saveComplementsData', [App\Http\Controllers\Backend\ComplementsController::class, 'saveComplementsData'])->name('backend.saveComplementsData')->middleware(['auth','is_admin']);
	Route::post('/getComplementById', [App\Http\Controllers\Backend\ComplementsController::class, 'getComplementById'])->name('backend.getComplementById')->middleware(['auth','is_admin']);
	Route::post('/deleteComplement', [App\Http\Controllers\Backend\ComplementsController::class, 'deleteComplement'])->name('backend.deleteComplement')->middleware(['auth','is_admin']);
	Route::post('/bulkActionComplement', [App\Http\Controllers\Backend\ComplementsController::class, 'bulkActionComplement'])->name('backend.bulkActionComplement')->middleware(['auth','is_admin']);

	//Bed Types
	Route::get('/bed-types', [App\Http\Controllers\Backend\BedTypesController::class, 'getBedTypesPageLoad'])->name('backend.bed-types')->middleware(['auth','is_admin']);
	Route::get('/getBedTypesTableData', [App\Http\Controllers\Backend\BedTypesController::class, 'getBedTypesTableData'])->name('backend.getBedTypesTableData')->middleware(['auth','is_admin']);
	Route::post('/saveBedTypesData', [App\Http\Controllers\Backend\BedTypesController::class, 'saveBedTypesData'])->name('backend.saveBedTypesData')->middleware(['auth','is_admin']);
	Route::post('/getBedTypeById', [App\Http\Controllers\Backend\BedTypesController::class, 'getBedTypeById'])->name('backend.getBedTypeById')->middleware(['auth','is_admin']);
	Route::post('/deleteBedType', [App\Http\Controllers\Backend\BedTypesController::class, 'deleteBedType'])->name('backend.deleteBedType')->middleware(['auth','is_admin']);
	Route::post('/bulkActionBedType', [App\Http\Controllers\Backend\BedTypesController::class, 'bulkActionBedType'])->name('backend.bulkActionBedType')->middleware(['auth','is_admin']);

	//Newsletters
	Route::get('/subscribe-settings', [App\Http\Controllers\Backend\NewslettersController::class, 'getSubscribeSettings'])->name('backend.subscribe-settings')->middleware(['auth','is_admin']);
	Route::post('/SubscribePopupUpdate', [App\Http\Controllers\Backend\NewslettersController::class, 'SubscribePopupUpdate'])->name('backend.SubscribePopupUpdate')->middleware(['auth','is_admin']);
	Route::get('/mailchimp-settings', [App\Http\Controllers\Backend\NewslettersController::class, 'getMailChimpSettings'])->name('backend.mailchimp-settings')->middleware(['auth','is_admin']);
	Route::post('/MailChimpSettingsUpdate', [App\Http\Controllers\Backend\NewslettersController::class, 'MailChimpSettingsUpdate'])->name('backend.MailChimpSettingsUpdate')->middleware(['auth','is_admin']);
	Route::get('/subscribers', [App\Http\Controllers\Backend\NewslettersController::class, 'getSubscribers'])->name('backend.subscribers')->middleware(['auth','is_admin']);
	Route::get('/getSubscriberTableData', [App\Http\Controllers\Backend\NewslettersController::class, 'getSubscriberTableData'])->name('backend.getSubscriberTableData')->middleware(['auth','is_admin']);
	Route::post('/saveSubscriberData', [App\Http\Controllers\Backend\NewslettersController::class, 'saveSubscriberData'])->name('backend.saveSubscriberData')->middleware(['auth','is_admin']);
	Route::post('/getSubscriberById', [App\Http\Controllers\Backend\NewslettersController::class, 'getSubscriberById'])->name('backend.getSubscriberById')->middleware(['auth','is_admin']);
	Route::post('/deleteSubscriber', [App\Http\Controllers\Backend\NewslettersController::class, 'deleteSubscriber'])->name('backend.deleteSubscriber')->middleware(['auth','is_admin']);

	//languages Page
	Route::get('/languages', [App\Http\Controllers\Backend\LanguagesController::class, 'getLanguagePageLoad'])->name('backend.languages')->middleware(['auth','is_admin']);
	Route::get('/getLanguagesTableData', [App\Http\Controllers\Backend\LanguagesController::class, 'getLanguagesTableData'])->name('backend.getLanguagesTableData')->middleware(['auth','is_admin']);
	Route::post('/saveLanguagesData', [App\Http\Controllers\Backend\LanguagesController::class, 'saveLanguagesData'])->name('backend.saveLanguagesData')->middleware(['auth','is_admin']);
	Route::post('/getLanguageById', [App\Http\Controllers\Backend\LanguagesController::class, 'getLanguageById'])->name('backend.getLanguageById')->middleware(['auth','is_admin']);
	Route::post('/deleteLanguage', [App\Http\Controllers\Backend\LanguagesController::class, 'deleteLanguage'])->name('backend.deleteLanguage')->middleware(['auth','is_admin']);

	//Language Keywords Page
	Route::get('/language-keywords', [App\Http\Controllers\Backend\LanguagesController::class, 'getLanguageKeywordsPageLoad'])->name('backend.language-keywords')->middleware(['auth','is_admin']);
	Route::get('/getLanguageKeywordsTableData', [App\Http\Controllers\Backend\LanguagesController::class, 'getLanguageKeywordsTableData'])->name('backend.getLanguageKeywordsTableData')->middleware(['auth','is_admin']);
	Route::post('/saveLanguageKeywordsData', [App\Http\Controllers\Backend\LanguagesController::class, 'saveLanguageKeywordsData'])->name('backend.saveLanguageKeywordsData')->middleware(['auth','is_admin']);
	Route::post('/getLanguageKeywordsById', [App\Http\Controllers\Backend\LanguagesController::class, 'getLanguageKeywordsById'])->name('backend.getLanguageKeywordsById')->middleware(['auth','is_admin']);
	Route::post('/deleteLanguageKeywords', [App\Http\Controllers\Backend\LanguagesController::class, 'deleteLanguageKeywords'])->name('backend.deleteLanguageKeywords')->middleware(['auth','is_admin']);

	//Customers Page
	Route::get('/customers', [App\Http\Controllers\Backend\CustomerController::class, 'getCustomersPageLoad'])->name('backend.customers')->middleware(['auth','is_admin']);
	Route::get('/getCustomersTableData', [App\Http\Controllers\Backend\CustomerController::class, 'getCustomersTableData'])->name('backend.getCustomersTableData')->middleware(['auth','is_admin']);
	Route::post('/saveCustomersData', [App\Http\Controllers\Backend\CustomerController::class, 'saveCustomersData'])->name('backend.saveCustomersData')->middleware(['auth','is_admin']);
	Route::post('/getCustomerById', [App\Http\Controllers\Backend\CustomerController::class, 'getCustomerById'])->name('backend.getCustomerById')->middleware(['auth','is_admin']);
	Route::post('/deleteCustomer', [App\Http\Controllers\Backend\CustomerController::class, 'deleteCustomer'])->name('backend.deleteCustomer')->middleware(['auth','is_admin']);
	Route::post('/bulkActionCustomers', [App\Http\Controllers\Backend\CustomerController::class, 'bulkActionCustomers'])->name('backend.bulkActionCustomers')->middleware(['auth','is_admin']);

	//Users Page
	Route::get('/users', [App\Http\Controllers\Backend\UsersController::class, 'getUsersPageLoad'])->name('backend.users')->middleware(['auth','is_admin']);
	Route::get('/getUsersTableData', [App\Http\Controllers\Backend\UsersController::class, 'getUsersTableData'])->name('backend.getUsersTableData')->middleware(['auth','is_admin']);
	Route::post('/saveUsersData', [App\Http\Controllers\Backend\UsersController::class, 'saveUsersData'])->name('backend.saveUsersData')->middleware(['auth','is_admin']);
	Route::post('/getUserById', [App\Http\Controllers\Backend\UsersController::class, 'getUserById'])->name('backend.getUserById')->middleware(['auth','is_admin']);
	Route::post('/deleteUser', [App\Http\Controllers\Backend\UsersController::class, 'deleteUser'])->name('backend.deleteUser')->middleware(['auth','is_admin']);
	Route::post('/bulkActionUsers', [App\Http\Controllers\Backend\UsersController::class, 'bulkActionUsers'])->name('backend.bulkActionUsers')->middleware(['auth','is_admin']);

	//Profile Page
	Route::get('/profile', [App\Http\Controllers\Backend\UsersController::class, 'getProfilePageLoad'])->name('backend.profile')->middleware(['auth','is_admin']);
	Route::post('/profileUpdate', [App\Http\Controllers\Backend\UsersController::class, 'profileUpdate'])->name('backend.profileUpdate')->middleware(['auth','is_admin']);

	//Media Page
	Route::get('/media', [App\Http\Controllers\Backend\MediaController::class, 'getMediaPageLoad'])->name('backend.media')->middleware(['auth','is_admin']);
	Route::post('/getMediaById', [App\Http\Controllers\Backend\MediaController::class, 'getMediaById'])->name('backend.getMediaById')->middleware(['auth','is_admin']);
	Route::post('/mediaUpdate', [App\Http\Controllers\Backend\MediaController::class, 'mediaUpdate'])->name('backend.mediaUpdate')->middleware(['auth','is_admin']);
	Route::post('/onMediaDelete', [App\Http\Controllers\Backend\MediaController::class, 'onMediaDelete'])->name('backend.onMediaDelete')->middleware(['auth','is_admin']);
	Route::get('/getGlobalMediaData', [App\Http\Controllers\Backend\MediaController::class, 'getGlobalMediaData'])->name('backend.getGlobalMediaData')->middleware(['auth','is_admin']);
	Route::get('/getMediaPaginationData', [App\Http\Controllers\Backend\MediaController::class, 'getMediaPaginationData'])->name('backend.getMediaPaginationData')->middleware(['auth','is_admin']);

	//Menu Page
	Route::get('/menu', [App\Http\Controllers\Backend\MenuController::class, 'getMenuPageLoad'])->name('backend.menu')->middleware(['auth','is_admin']);
	Route::get('/getMenuTableData', [App\Http\Controllers\Backend\MenuController::class, 'getMenuTableData'])->name('backend.getMenuTableData')->middleware(['auth','is_admin']);
	Route::post('/saveMenuData', [App\Http\Controllers\Backend\MenuController::class, 'saveMenuData'])->name('backend.saveMenuData')->middleware(['auth','is_admin']);
	Route::post('/getMenuById', [App\Http\Controllers\Backend\MenuController::class, 'getMenuById'])->name('backend.getMenuById')->middleware(['auth','is_admin']);
	Route::post('/deleteMenu', [App\Http\Controllers\Backend\MenuController::class, 'deleteMenu'])->name('backend.deleteMenu')->middleware(['auth','is_admin']);
	Route::post('/bulkActionMenu', [App\Http\Controllers\Backend\MenuController::class, 'bulkActionMenu'])->name('backend.bulkActionMenu')->middleware(['auth','is_admin']);

	//Menu Builder Page
	Route::get('/menu-builder/{lan}/{id}', [App\Http\Controllers\Backend\MenuBuilderController::class, 'getMenuBuilderPageLoad'])->name('backend.menu-builder')->middleware(['auth','is_admin']);
	Route::get('/getPageMenuBuilderData', [App\Http\Controllers\Backend\MenuBuilderController::class, 'getPageMenuBuilderData'])->name('backend.getPageMenuBuilderData')->middleware(['auth','is_admin']);
	Route::get('/getProductMenuBuilderData', [App\Http\Controllers\Backend\MenuBuilderController::class, 'getProductMenuBuilderData'])->name('backend.getProductMenuBuilderData')->middleware(['auth','is_admin']);
	Route::get('/getProductCategoryMenuBuilderData', [App\Http\Controllers\Backend\MenuBuilderController::class, 'getProductCategoryMenuBuilderData'])->name('backend.getProductCategoryMenuBuilderData')->middleware(['auth','is_admin']);
	Route::get('/getBlogCategoryMenuBuilderData', [App\Http\Controllers\Backend\MenuBuilderController::class, 'getBlogCategoryMenuBuilderData'])->name('backend.getBlogCategoryMenuBuilderData')->middleware(['auth','is_admin']);
	Route::post('/SaveParentMenu', [App\Http\Controllers\Backend\MenuBuilderController::class, 'SaveParentMenu'])->name('backend.SaveParentMenu')->middleware(['auth','is_admin']);
	Route::get('/ajaxMakeMenuList', [App\Http\Controllers\Backend\MenuBuilderController::class, 'ajaxMakeMenuList'])->name('backend.ajaxMakeMenuList')->middleware(['auth','is_admin']);
	Route::post('/UpdateMenuSettings', [App\Http\Controllers\Backend\MenuBuilderController::class, 'UpdateMenuSettings'])->name('backend.UpdateMenuSettings')->middleware(['auth','is_admin']);
	Route::post('/deleteParentChildMenu', [App\Http\Controllers\Backend\MenuBuilderController::class, 'deleteParentChildMenu'])->name('backend.deleteParentChildMenu')->middleware(['auth','is_admin']);
	Route::post('/getMegaMenuTitleById', [App\Http\Controllers\Backend\MenuBuilderController::class, 'getMegaMenuTitleById'])->name('backend.getMegaMenuTitleById')->middleware(['auth','is_admin']);
	Route::post('/UpdateMegaMenuTitle', [App\Http\Controllers\Backend\MenuBuilderController::class, 'UpdateMegaMenuTitle'])->name('backend.UpdateMegaMenuTitle')->middleware(['auth','is_admin']);
	Route::post('/UpdateSortableMenuList', [App\Http\Controllers\Backend\MenuBuilderController::class, 'UpdateSortableMenuList'])->name('backend.UpdateSortableMenuList')->middleware(['auth','is_admin']);

	//Page
	Route::get('/page', [App\Http\Controllers\Backend\PageController::class, 'getAllPageData'])->name('backend.page')->middleware(['auth','is_admin']);
	Route::get('/getPagePaginationData', [App\Http\Controllers\Backend\PageController::class, 'getPagePaginationData'])->name('backend.getPagePaginationData')->middleware(['auth','is_admin']);
	Route::post('/getPageById', [App\Http\Controllers\Backend\PageController::class, 'getPageById'])->name('backend.getPageById')->middleware(['auth','is_admin']);
	Route::post('/deletePage', [App\Http\Controllers\Backend\PageController::class, 'deletePage'])->name('backend.deletePage')->middleware(['auth','is_admin']);
	Route::post('/bulkActionPage', [App\Http\Controllers\Backend\PageController::class, 'bulkActionPage'])->name('backend.bulkActionPage')->middleware(['auth','is_admin']);
	Route::post('/hasPageTitleSlug', [App\Http\Controllers\Backend\PageController::class, 'hasPageTitleSlug'])->name('backend.hasPageTitleSlug')->middleware(['auth','is_admin']);
	Route::post('/savePageData', [App\Http\Controllers\Backend\PageController::class, 'savePageData'])->name('backend.savePageData')->middleware(['auth','is_admin']);

	//Contact
	Route::get('/contact', [App\Http\Controllers\Backend\ContactController::class, 'getContactData'])->name('backend.contact')->middleware(['auth','is_admin']);
	Route::get('/getContactPaginationData', [App\Http\Controllers\Backend\ContactController::class, 'getContactPaginationData'])->name('backend.getContactPaginationData')->middleware(['auth','is_admin']);
	Route::post('/getContactById', [App\Http\Controllers\Backend\ContactController::class, 'getContactById'])->name('backend.getContactById')->middleware(['auth','is_admin']);
	Route::post('/deleteContact', [App\Http\Controllers\Backend\ContactController::class, 'deleteContact'])->name('backend.deleteContact')->middleware(['auth','is_admin']);
	Route::post('/bulkActionContact', [App\Http\Controllers\Backend\ContactController::class, 'bulkActionContact'])->name('backend.bulkActionContact')->middleware(['auth','is_admin']);
	Route::post('/saveContactData', [App\Http\Controllers\Backend\ContactController::class, 'saveContactData'])->name('backend.saveContactData')->middleware(['auth','is_admin']);

	//Blog Categories
	Route::get('/blog-categories', [App\Http\Controllers\Backend\Blog_categoriesController::class, 'getBlogCategoriesPageLoad'])->name('backend.blog-categories')->middleware(['auth','is_admin']);
	Route::get('/getBlogCategoriesTableData', [App\Http\Controllers\Backend\Blog_categoriesController::class, 'getBlogCategoriesTableData'])->name('backend.getBlogCategoriesTableData')->middleware(['auth','is_admin']);
	Route::post('/saveBlogCategoriesData', [App\Http\Controllers\Backend\Blog_categoriesController::class, 'saveBlogCategoriesData'])->name('backend.saveBlogCategoriesData')->middleware(['auth','is_admin']);
	Route::post('/getBlogCategoriesById', [App\Http\Controllers\Backend\Blog_categoriesController::class, 'getBlogCategoriesById'])->name('backend.getBlogCategoriesById')->middleware(['auth','is_admin']);
	Route::post('/deleteBlogCategories', [App\Http\Controllers\Backend\Blog_categoriesController::class, 'deleteBlogCategories'])->name('backend.deleteBlogCategories')->middleware(['auth','is_admin']);
	Route::post('/bulkActionBlogCategories', [App\Http\Controllers\Backend\Blog_categoriesController::class, 'bulkActionBlogCategories'])->name('backend.bulkActionBlogCategories')->middleware(['auth','is_admin']);
	Route::post('/hasBlogCategorySlug', [App\Http\Controllers\Backend\Blog_categoriesController::class, 'hasBlogCategorySlug'])->name('backend.hasBlogCategorySlug')->middleware(['auth','is_admin']);

	//Blog
	Route::get('/blog', [App\Http\Controllers\Backend\BlogController::class, 'getBlogPageLoad'])->name('backend.blog')->middleware(['auth','is_admin']);
	Route::get('/getBlogTableData', [App\Http\Controllers\Backend\BlogController::class, 'getBlogTableData'])->name('backend.getBlogTableData')->middleware(['auth','is_admin']);
	Route::post('/saveBlogData', [App\Http\Controllers\Backend\BlogController::class, 'saveBlogData'])->name('backend.saveBlogData')->middleware(['auth','is_admin']);
	Route::post('/getBlogById', [App\Http\Controllers\Backend\BlogController::class, 'getBlogById'])->name('backend.getBlogById')->middleware(['auth','is_admin']);
	Route::post('/deleteBlog', [App\Http\Controllers\Backend\BlogController::class, 'deleteBlog'])->name('backend.deleteBlog')->middleware(['auth','is_admin']);
	Route::post('/bulkActionBlog', [App\Http\Controllers\Backend\BlogController::class, 'bulkActionBlog'])->name('backend.bulkActionBlog')->middleware(['auth','is_admin']);
	Route::post('/hasBlogSlug', [App\Http\Controllers\Backend\BlogController::class, 'hasBlogSlug'])->name('backend.hasBlogSlug')->middleware(['auth','is_admin']);

	//Tax
	Route::get('/tax', [App\Http\Controllers\Backend\TaxesController::class, 'getTaxPageLoad'])->name('backend.tax')->middleware(['auth','is_admin']);
	Route::post('/saveTaxData', [App\Http\Controllers\Backend\TaxesController::class, 'saveTaxData'])->name('backend.saveTaxData')->middleware(['auth','is_admin']);

	//Currency
	Route::get('/currency', [App\Http\Controllers\Backend\CurrencyController::class, 'getCurrencyPageLoad'])->name('backend.currency')->middleware(['auth','is_admin']);
	Route::post('/saveCurrencyData', [App\Http\Controllers\Backend\CurrencyController::class, 'saveCurrencyData'])->name('backend.saveCurrencyData')->middleware(['auth','is_admin']);

	//Slider
	Route::get('/slider', [App\Http\Controllers\Backend\HomeSliderController::class, 'getSliderPageLoad'])->name('backend.slider')->middleware(['auth','is_admin']);
	Route::get('/getSliderTableData', [App\Http\Controllers\Backend\HomeSliderController::class, 'getSliderTableData'])->name('backend.getSliderTableData')->middleware(['auth','is_admin']);
	Route::post('/saveSliderData', [App\Http\Controllers\Backend\HomeSliderController::class, 'saveSliderData'])->name('backend.saveSliderData')->middleware(['auth','is_admin']);
	Route::post('/getSliderById', [App\Http\Controllers\Backend\HomeSliderController::class, 'getSliderById'])->name('backend.getSliderById')->middleware(['auth','is_admin']);
	Route::post('/deleteSlider', [App\Http\Controllers\Backend\HomeSliderController::class, 'deleteSlider'])->name('backend.deleteSlider')->middleware(['auth','is_admin']);
	Route::post('/bulkActionSlider', [App\Http\Controllers\Backend\HomeSliderController::class, 'bulkActionSlider'])->name('backend.bulkActionSlider')->middleware(['auth','is_admin']);

	//About Us
	Route::get('/about-us', [App\Http\Controllers\Backend\AboutUsController::class, 'getAboutUsPageLoad'])->name('backend.about-us')->middleware(['auth','is_admin']);
	Route::get('/getAboutUsTableData', [App\Http\Controllers\Backend\AboutUsController::class, 'getAboutUsTableData'])->name('backend.getAboutUsTableData')->middleware(['auth','is_admin']);
	Route::post('/saveAboutUsData', [App\Http\Controllers\Backend\AboutUsController::class, 'saveAboutUsData'])->name('backend.saveAboutUsData')->middleware(['auth','is_admin']);
	Route::post('/getAboutUsById', [App\Http\Controllers\Backend\AboutUsController::class, 'getAboutUsById'])->name('backend.getAboutUsById')->middleware(['auth','is_admin']);
	Route::post('/deleteAboutUs', [App\Http\Controllers\Backend\AboutUsController::class, 'deleteAboutUs'])->name('backend.deleteAboutUs')->middleware(['auth','is_admin']);
	Route::post('/bulkActionAboutUs', [App\Http\Controllers\Backend\AboutUsController::class, 'bulkActionAboutUs'])->name('backend.bulkActionAboutUs')->middleware(['auth','is_admin']);

	//Our Services
	Route::get('/our-services', [App\Http\Controllers\Backend\OurServicesController::class, 'getOurServicesPageLoad'])->name('backend.our-services')->middleware(['auth','is_admin']);
	Route::get('/getOurServicesTableData', [App\Http\Controllers\Backend\OurServicesController::class, 'getOurServicesTableData'])->name('backend.getOurServicesTableData')->middleware(['auth','is_admin']);
	Route::post('/saveOurServicesData', [App\Http\Controllers\Backend\OurServicesController::class, 'saveOurServicesData'])->name('backend.saveOurServicesData')->middleware(['auth','is_admin']);
	Route::post('/getOurServicesById', [App\Http\Controllers\Backend\OurServicesController::class, 'getOurServicesById'])->name('backend.getOurServicesById')->middleware(['auth','is_admin']);
	Route::post('/deleteOurService', [App\Http\Controllers\Backend\OurServicesController::class, 'deleteOurService'])->name('backend.deleteOurService')->middleware(['auth','is_admin']);
	Route::post('/bulkActionOurServices', [App\Http\Controllers\Backend\OurServicesController::class, 'bulkActionOurServices'])->name('backend.bulkActionOurServices')->middleware(['auth','is_admin']);

	//Testimonial
	Route::get('/testimonial', [App\Http\Controllers\Backend\TestimonialController::class, 'getTestimonialPageLoad'])->name('backend.testimonial')->middleware(['auth','is_admin']);
	Route::get('/getTestimonialTableData', [App\Http\Controllers\Backend\TestimonialController::class, 'getTestimonialTableData'])->name('backend.getTestimonialTableData')->middleware(['auth','is_admin']);
	Route::post('/saveTestimonialData', [App\Http\Controllers\Backend\TestimonialController::class, 'saveTestimonialData'])->name('backend.saveTestimonialData')->middleware(['auth','is_admin']);
	Route::post('/getTestimonialById', [App\Http\Controllers\Backend\TestimonialController::class, 'getTestimonialById'])->name('backend.getTestimonialById')->middleware(['auth','is_admin']);
	Route::post('/deleteTestimonial', [App\Http\Controllers\Backend\TestimonialController::class, 'deleteTestimonial'])->name('backend.deleteTestimonial')->middleware(['auth','is_admin']);
	Route::post('/bulkActionTestimonial', [App\Http\Controllers\Backend\TestimonialController::class, 'bulkActionTestimonial'])->name('backend.bulkActionTestimonial')->middleware(['auth','is_admin']);

	//Offer Ads
	Route::get('/offer-ads', [App\Http\Controllers\Backend\Offer_adsController::class, 'getOfferAdsPageLoad'])->name('backend.offer-ads')->middleware(['auth','is_admin']);
	Route::get('/getOfferAdsTableData', [App\Http\Controllers\Backend\Offer_adsController::class, 'getOfferAdsTableData'])->name('backend.getOfferAdsTableData')->middleware(['auth','is_admin']);
	Route::post('/saveOfferAdsData', [App\Http\Controllers\Backend\Offer_adsController::class, 'saveOfferAdsData'])->name('backend.saveOfferAdsData')->middleware(['auth','is_admin']);
	Route::post('/getOfferAdsById', [App\Http\Controllers\Backend\Offer_adsController::class, 'getOfferAdsById'])->name('backend.getOfferAdsById')->middleware(['auth','is_admin']);
	Route::post('/deleteOfferAds', [App\Http\Controllers\Backend\Offer_adsController::class, 'deleteOfferAds'])->name('backend.deleteOfferAds')->middleware(['auth','is_admin']);
	Route::post('/bulkActionOfferAds', [App\Http\Controllers\Backend\Offer_adsController::class, 'bulkActionOfferAds'])->name('backend.bulkActionOfferAds')->middleware(['auth','is_admin']);

	//Countries
	Route::get('/countries', [App\Http\Controllers\Backend\CountriesController::class, 'getCountriesPageLoad'])->name('backend.countries')->middleware(['auth','is_admin']);
	Route::get('/getCountriesTableData', [App\Http\Controllers\Backend\CountriesController::class, 'getCountriesTableData'])->name('backend.getCountriesTableData')->middleware(['auth','is_admin']);
	Route::post('/saveCountriesData', [App\Http\Controllers\Backend\CountriesController::class, 'saveCountriesData'])->name('backend.saveCountriesData')->middleware(['auth','is_admin']);
	Route::post('/getCountryById', [App\Http\Controllers\Backend\CountriesController::class, 'getCountryById'])->name('backend.getCountryById')->middleware(['auth','is_admin']);
	Route::post('/deleteCountry', [App\Http\Controllers\Backend\CountriesController::class, 'deleteCountry'])->name('backend.deleteCountry')->middleware(['auth','is_admin']);
	Route::post('/bulkActionCountry', [App\Http\Controllers\Backend\CountriesController::class, 'bulkActionCountry'])->name('backend.bulkActionCountry')->middleware(['auth','is_admin']);

	//Page Variation
	Route::get('/page-variation', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getPageVariation'])->name('backend.page-variation')->middleware(['auth','is_admin']);
	Route::post('/savePageVariation', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'savePageVariation'])->name('backend.savePageVariation')->middleware(['auth','is_admin']);

	//Home Video Section
	Route::get('/home-video', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getThemeOptionsHomeVideo'])->name('backend.home-video')->middleware(['auth','is_admin']);
	Route::post('/saveThemeOptionsHomeVideo', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveThemeOptionsHomeVideo'])->name('backend.saveThemeOptionsHomeVideo')->middleware(['auth','is_admin']);

	//Section Manage
	Route::get('/section-manage', [App\Http\Controllers\Backend\SectionManageController::class, 'getSectionManagePageLoad'])->name('backend.section-manage')->middleware(['auth','is_admin']);
	Route::get('/getSectionManageTableData', [App\Http\Controllers\Backend\SectionManageController::class, 'getSectionManageTableData'])->name('backend.getSectionManageTableData')->middleware(['auth','is_admin']);
	Route::post('/saveSectionManageData', [App\Http\Controllers\Backend\SectionManageController::class, 'saveSectionManageData'])->name('backend.saveSectionManageData')->middleware(['auth','is_admin']);
	Route::post('/getSectionManageById', [App\Http\Controllers\Backend\SectionManageController::class, 'getSectionManageById'])->name('backend.getSectionManageById')->middleware(['auth','is_admin']);
	Route::post('/deleteSectionManage', [App\Http\Controllers\Backend\SectionManageController::class, 'deleteSectionManage'])->name('backend.deleteSectionManage')->middleware(['auth','is_admin']);
	Route::post('/bulkActionSectionManage', [App\Http\Controllers\Backend\SectionManageController::class, 'bulkActionSectionManage'])->name('backend.bulkActionSectionManage')->middleware(['auth','is_admin']);

	//Theme Logo
	Route::get('/theme-options', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getThemeOptionsPageLoad'])->name('backend.theme-options')->middleware(['auth','is_admin']);
	Route::post('/saveThemeLogo', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveThemeLogo'])->name('backend.saveThemeLogo')->middleware(['auth','is_admin']);

	//Theme Options Header
	Route::get('/theme-options-header', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getThemeOptionsHeaderPageLoad'])->name('backend.theme-options-header')->middleware(['auth','is_admin']);
	Route::post('/saveThemeOptionsHeader', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveThemeOptionsHeader'])->name('backend.saveThemeOptionsHeader')->middleware(['auth','is_admin']);

	//Subheader BG Images
	Route::get('/subheader-images', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getSubheaderBGImagesPageLoad'])->name('backend.subheader-images')->middleware(['auth','is_admin']);
	Route::post('/saveSubheaderBGImages', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveSubheaderBGImages'])->name('backend.saveSubheaderBGImages')->middleware(['auth','is_admin']);

	//Language Switcher
	Route::get('/language-switcher', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getLanguageSwitcher'])->name('backend.language-switcher')->middleware(['auth','is_admin']);
	Route::post('/saveLanguageSwitcher', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveLanguageSwitcher'])->name('backend.saveLanguageSwitcher')->middleware(['auth','is_admin']);

	//Theme Options Footer
	Route::get('/theme-options-footer', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getThemeOptionsFooterPageLoad'])->name('backend.theme-options-footer')->middleware(['auth','is_admin']);
	Route::post('/saveThemeOptionsFooter', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveThemeOptionsFooter'])->name('backend.saveThemeOptionsFooter')->middleware(['auth','is_admin']);

	//Custom css
	Route::get('/custom-css', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getCustomCSSPageLoad'])->name('backend.custom-css')->middleware(['auth','is_admin']);
	Route::post('/saveCustomCSS', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveCustomCSS'])->name('backend.saveCustomCSS')->middleware(['auth','is_admin']);

	//Custom js
	Route::get('/custom-js', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getCustomJSPageLoad'])->name('backend.custom-js')->middleware(['auth','is_admin']);
	Route::post('/saveCustomJS', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveCustomJS'])->name('backend.saveCustomJS')->middleware(['auth','is_admin']);

	//Theme Options Color
	Route::get('/theme-options-color', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getThemeOptionsColorPageLoad'])->name('backend.theme-options-color')->middleware(['auth','is_admin']);
	Route::post('/saveThemeOptionsColor', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveThemeOptionsColor'])->name('backend.saveThemeOptionsColor')->middleware(['auth','is_admin']);

	//Theme Options SEO
	Route::get('/theme-options-seo', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getThemeOptionsSEOPageLoad'])->name('backend.theme-options-seo')->middleware(['auth','is_admin']);
	Route::post('/saveThemeOptionsSEO', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveThemeOptionsSEO'])->name('backend.saveThemeOptionsSEO')->middleware(['auth','is_admin']);

	//Theme Options Facebook
	Route::get('/theme-options-facebook', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getThemeOptionsFacebookPageLoad'])->name('backend.theme-options-facebook')->middleware(['auth','is_admin']);
	Route::post('/saveThemeOptionsFacebook', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveThemeOptionsFacebook'])->name('backend.saveThemeOptionsFacebook')->middleware(['auth','is_admin']);

	//Theme Options Facebook Pixel
	Route::get('/theme-options-facebook-pixel', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getThemeOptionsFacebookPixelLoad'])->name('backend.theme-options-facebook-pixel')->middleware(['auth','is_admin']);
	Route::post('/saveThemeOptionsFacebookPixel', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveThemeOptionsFacebookPixel'])->name('backend.saveThemeOptionsFacebookPixel')->middleware(['auth','is_admin']);

	//Theme Options Twitter
	Route::get('/theme-options-twitter', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getThemeOptionsTwitterPageLoad'])->name('backend.theme-options-twitter')->middleware(['auth','is_admin']);
	Route::post('/saveThemeOptionsTwitter', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveThemeOptionsTwitter'])->name('backend.saveThemeOptionsTwitter')->middleware(['auth','is_admin']);

	//Theme Options Google Analytics
	Route::get('/google-analytics', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getGoogleAnalytics'])->name('backend.google-analytics')->middleware(['auth','is_admin']);
	Route::post('/saveGoogleAnalytics', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveGoogleAnalytics'])->name('backend.saveGoogleAnalytics')->middleware(['auth','is_admin']);

	//Theme Options Google Tag Manager
	Route::get('/google-tag-manager', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getGoogleTagManager'])->name('backend.google-tag-manager')->middleware(['auth','is_admin']);
	Route::post('/saveGoogleTagManager', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveGoogleTagManager'])->name('backend.saveGoogleTagManager')->middleware(['auth','is_admin']);

	//Theme Options Whatsapp
	Route::get('/theme-options-whatsapp', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getThemeOptionsWhatsappPageLoad'])->name('backend.theme-options-whatsapp')->middleware(['auth','is_admin']);
	Route::post('/saveThemeOptionsWhatsapp', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveThemeOptionsWhatsapp'])->name('backend.saveThemeOptionsWhatsapp')->middleware(['auth','is_admin']);

	//Cookie Consent
	Route::get('/cookie-consent', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'getCookieConsent'])->name('backend.cookie-consent')->middleware(['auth','is_admin']);
	Route::post('/saveCookieConsent', [App\Http\Controllers\Backend\ThemeOptionsController::class, 'saveCookieConsent'])->name('backend.saveCookieConsent')->middleware(['auth','is_admin']);

	//Social Media
	Route::get('/social-media', [App\Http\Controllers\Backend\SocialMediasController::class, 'getSocialMediaPageLoad'])->name('backend.social-media')->middleware(['auth','is_admin']);
	Route::get('/getSocialMediaTableData', [App\Http\Controllers\Backend\SocialMediasController::class, 'getSocialMediaTableData'])->name('backend.getSocialMediaTableData')->middleware(['auth','is_admin']);
	Route::post('/saveSocialMediaData', [App\Http\Controllers\Backend\SocialMediasController::class, 'saveSocialMediaData'])->name('backend.saveSocialMediaData')->middleware(['auth','is_admin']);
	Route::post('/getSocialMediaById', [App\Http\Controllers\Backend\SocialMediasController::class, 'getSocialMediaById'])->name('backend.getSocialMediaById')->middleware(['auth','is_admin']);
	Route::post('/deleteSocialMedia', [App\Http\Controllers\Backend\SocialMediasController::class, 'deleteSocialMedia'])->name('backend.deleteSocialMedia')->middleware(['auth','is_admin']);
	Route::post('/bulkActionSocialMedia', [App\Http\Controllers\Backend\SocialMediasController::class, 'bulkActionSocialMedia'])->name('backend.bulkActionSocialMedia')->middleware(['auth','is_admin']);

	//General Page
	Route::get('/general', [App\Http\Controllers\Backend\SettingsController::class, 'getGeneralPageLoad'])->name('backend.general')->middleware(['auth','is_admin']);
	Route::post('/GeneralSettingUpdate', [App\Http\Controllers\Backend\SettingsController::class, 'GeneralSettingUpdate'])->name('backend.GeneralSettingUpdate')->middleware(['auth','is_admin']);

	//Theme Register
	Route::get('/theme-register', [App\Http\Controllers\Backend\SettingsController::class, 'loadThemeRegisterPage'])->name('backend.theme-register')->middleware(['auth','is_admin']);
	Route::post('/CodeVerified', [App\Http\Controllers\Backend\SettingsController::class, 'CodeVerified'])->name('backend.CodeVerified')->middleware(['auth','is_admin']);
	Route::post('/deletePcode', [App\Http\Controllers\Backend\SettingsController::class, 'deletePcode'])->name('backend.deletePcode')->middleware(['auth','is_admin']);

	//Google Recaptcha
	Route::get('/google-recaptcha', [App\Http\Controllers\Backend\SettingsController::class, 'loadGoogleRecaptchaPage'])->name('backend.google-recaptcha')->middleware(['auth','is_admin']);
	Route::post('/GoogleRecaptchaUpdate', [App\Http\Controllers\Backend\SettingsController::class, 'GoogleRecaptchaUpdate'])->name('backend.GoogleRecaptchaUpdate')->middleware(['auth','is_admin']);

	//Google Map
	Route::get('/google-map', [App\Http\Controllers\Backend\SettingsController::class, 'loadGoogleMapPage'])->name('backend.google-map')->middleware(['auth','is_admin']);
	Route::post('/GoogleMapUpdate', [App\Http\Controllers\Backend\SettingsController::class, 'GoogleMapUpdate'])->name('backend.GoogleMapUpdate')->middleware(['auth','is_admin']);

	//Mail Settings
	Route::get('/mail-settings', [App\Http\Controllers\Backend\SettingsController::class, 'loadMailSettingsPage'])->name('backend.mail-settings')->middleware(['auth','is_admin']);
	Route::post('/saveMailSettings', [App\Http\Controllers\Backend\SettingsController::class, 'saveMailSettings'])->name('backend.saveMailSettings')->middleware(['auth','is_admin']);

	//Payment methods
	Route::get('/payment-methods', [App\Http\Controllers\Backend\SettingsController::class, 'loadPaymentMethodsPage'])->name('backend.payment-methods')->middleware(['auth','is_admin']);
	Route::post('/StripeSettingsUpdate', [App\Http\Controllers\Backend\SettingsController::class, 'StripeSettingsUpdate'])->name('backend.StripeSettingsUpdate')->middleware(['auth','is_admin']);
	Route::post('/PaypalSettingsUpdate', [App\Http\Controllers\Backend\SettingsController::class, 'PaypalSettingsUpdate'])->name('backend.PaypalSettingsUpdate')->middleware(['auth','is_admin']);
	Route::post('/RazorpaySettingsUpdate', [App\Http\Controllers\Backend\SettingsController::class, 'RazorpaySettingsUpdate'])->name('backend.RazorpaySettingsUpdate')->middleware(['auth','is_admin']);
	Route::post('/MollieSettingsUpdate', [App\Http\Controllers\Backend\SettingsController::class, 'MollieSettingsUpdate'])->name('backend.MollieSettingsUpdate')->middleware(['auth','is_admin']);
	Route::post('/CODSettingsUpdate', [App\Http\Controllers\Backend\SettingsController::class, 'CODSettingsUpdate'])->name('backend.CODSettingsUpdate')->middleware(['auth','is_admin']);
	Route::post('/BankSettingsUpdate', [App\Http\Controllers\Backend\SettingsController::class, 'BankSettingsUpdate'])->name('backend.BankSettingsUpdate')->middleware(['auth','is_admin']);

	//Media Settings
	Route::get('/media-settings', [App\Http\Controllers\Backend\SettingsController::class, 'loadMediaSettingsPage'])->name('backend.media-settings')->middleware(['auth','is_admin']);
	Route::get('/getMediaSettingsTableData', [App\Http\Controllers\Backend\SettingsController::class, 'getMediaSettingsTableData'])->name('backend.getMediaSettingsTableData')->middleware(['auth','is_admin']);
	Route::post('/getMediaSettingsById', [App\Http\Controllers\Backend\SettingsController::class, 'getMediaSettingsById'])->name('backend.getMediaSettingsById')->middleware(['auth','is_admin']);
	Route::post('/MediaSettingsUpdate', [App\Http\Controllers\Backend\SettingsController::class, 'MediaSettingsUpdate'])->name('backend.MediaSettingsUpdate')->middleware(['auth','is_admin']);

	//All File Upload
	Route::post('/FileUpload', [App\Http\Controllers\Backend\UploadController::class, 'FileUpload'])->name('backend.FileUpload')->middleware(['auth','is_admin']);
	Route::post('/MediaUpload', [App\Http\Controllers\Backend\UploadController::class, 'MediaUpload'])->name('backend.MediaUpload')->middleware(['auth','is_admin']);

	//All Combo
	Route::post('/getTimezoneList', [App\Http\Controllers\Backend\ComboController::class, 'getTimezoneList'])->name('backend.getTimezoneList')->middleware(['auth','is_admin']);
	Route::post('/getUserStatusList', [App\Http\Controllers\Backend\ComboController::class, 'getUserStatusList'])->name('backend.getUserStatusList')->middleware(['auth','is_admin']);
	Route::post('/getUserRolesList', [App\Http\Controllers\Backend\ComboController::class, 'getUserRolesList'])->name('backend.getUserRolesList')->middleware(['auth','is_admin']);
	Route::post('/getStatusList', [App\Http\Controllers\Backend\ComboController::class, 'getStatusList'])->name('backend.getStatusList')->middleware(['auth','is_admin']);
	Route::post('/getCategoryList', [App\Http\Controllers\Backend\ComboController::class, 'getCategoryList'])->name('backend.getCategoryList')->middleware(['auth','is_admin']);

	//Orders Excel/CSV Export
	Route::get('/orders-excel-export', [App\Http\Controllers\Backend\OrdersExportController::class, 'OrdersExcelExport'])->name('backend.orders-excel-export')->middleware(['auth','is_admin']);
	Route::get('/orders-csv-export', [App\Http\Controllers\Backend\OrdersExportController::class, 'OrdersCSVExport'])->name('backend.orders-csv-export')->middleware(['auth','is_admin']);

	//Transactions Excel/CSV Export
	Route::get('/transactions-excel-export', [App\Http\Controllers\Backend\TransactionsExportController::class, 'TransactionsExcelExport'])->name('backend.transactions-excel-export')->middleware(['auth','is_admin']);
	Route::get('/transactions-csv-export', [App\Http\Controllers\Backend\TransactionsExportController::class, 'TransactionsCSVExport'])->name('backend.transactions-csv-export')->middleware(['auth','is_admin']);

});

Route::prefix('receptionist')->group(function(){

	//Dashboard
	Route::get('/dashboard', [App\Http\Controllers\Receptionist\DashboardController::class, 'getDashboardData'])->name('receptionist.dashboard')->middleware(['auth','is_receptionist']);

	//Room List
	Route::get('/room-list', [App\Http\Controllers\Receptionist\RoomListController::class, 'getRoomListPageLoad'])->name('receptionist.room-list')->middleware(['auth','is_receptionist']);
	Route::get('/getRoomsListTableData', [App\Http\Controllers\Receptionist\RoomListController::class, 'getRoomsListTableData'])->name('receptionist.getRoomsListTableData')->middleware(['auth','is_receptionist']);

	//Booking Request
	Route::get('/booking-request', [App\Http\Controllers\Receptionist\BookingController::class, 'getBookingRequestPageLoad'])->name('receptionist.booking-request')->middleware(['auth','is_receptionist']);
	Route::get('/getBookingRequestTableData', [App\Http\Controllers\Receptionist\BookingController::class, 'getBookingRequestTableData'])->name('receptionist.getBookingRequestTableData')->middleware(['auth','is_receptionist']);
	Route::get('/booking/{id}/{type}', [App\Http\Controllers\Receptionist\BookingController::class, 'getBookingData'])->name('receptionist.booking')->middleware(['auth','is_receptionist']);
	Route::post('/updateBookingStatus', [App\Http\Controllers\Receptionist\BookingController::class, 'updateBookingStatus'])->name('receptionist.updateBookingStatus')->middleware(['auth','is_receptionist']);
	Route::post('/updateRoomDate', [App\Http\Controllers\Receptionist\BookingController::class, 'updateRoomDate'])->name('receptionist.updateRoomDate')->middleware(['auth','is_receptionist']);
	Route::get('/getPaymentBookingStatusData', [App\Http\Controllers\Receptionist\BookingController::class, 'getPaymentBookingStatusData'])->name('receptionist.getPaymentBookingStatusData')->middleware(['auth','is_receptionist']);
	Route::post('/deleteBookingRequest', [App\Http\Controllers\Receptionist\BookingController::class, 'deleteBookingRequest'])->name('receptionist.deleteBookingRequest')->middleware(['auth','is_receptionist']);
	Route::post('/bulkActionBookingRequest', [App\Http\Controllers\Receptionist\BookingController::class, 'bulkActionBookingRequest'])->name('receptionist.bulkActionBookingRequest')->middleware(['auth','is_receptionist']);

	//All Booking
	Route::get('/all-booking', [App\Http\Controllers\Receptionist\BookingController::class, 'getAllBookingPageLoad'])->name('receptionist.all-booking')->middleware(['auth','is_receptionist']);
	Route::get('/getAllBookingTableData', [App\Http\Controllers\Receptionist\BookingController::class, 'getAllBookingTableData'])->name('receptionist.getAllBookingTableData')->middleware(['auth','is_receptionist']);

	//Book Room
	Route::get('/book-room', [App\Http\Controllers\Receptionist\BookingController::class, 'getBookRoomPageLoad'])->name('receptionist.book-room')->middleware(['auth','is_receptionist']);
	Route::post('/BookRoomRequest', [App\Http\Controllers\Receptionist\BookingController::class, 'BookRoomRequest'])->name('receptionist.BookRoomRequest')->middleware(['auth','is_receptionist']);
	Route::post('/CheckRoomCount', [App\Http\Controllers\Receptionist\BookingController::class, 'CheckRoomCount'])->name('receptionist.CheckRoomCount')->middleware(['auth','is_receptionist']);

	//Assign Room
	Route::post('/getAssignRoomData', [App\Http\Controllers\Receptionist\BookingController::class, 'getAssignRoomData'])->name('receptionist.getAssignRoomData')->middleware(['auth','is_receptionist']);
	Route::get('/getRoomListTableData', [App\Http\Controllers\Receptionist\BookingController::class, 'getRoomListTableData'])->name('receptionist.getRoomListTableData')->middleware(['auth','is_receptionist']);
	Route::post('/saveAssignRoomData', [App\Http\Controllers\Receptionist\BookingController::class, 'saveAssignRoomData'])->name('receptionist.saveAssignRoomData')->middleware(['auth','is_receptionist']);
	Route::post('/deleteAssignRoom', [App\Http\Controllers\Receptionist\BookingController::class, 'deleteAssignRoom'])->name('receptionist.deleteAssignRoom')->middleware(['auth','is_receptionist']);

	//Excel/CSV Export
	Route::get('/excel-export', [App\Http\Controllers\Receptionist\ExportController::class, 'ExcelExport'])->name('receptionist.excel-export')->middleware(['auth','is_receptionist']);
	Route::get('/csv-export', [App\Http\Controllers\Receptionist\ExportController::class, 'OrdersCSVExport'])->name('receptionist.csv-export')->middleware(['auth','is_receptionist']);

	//Profile Page
	Route::get('/profile', [App\Http\Controllers\Receptionist\UsersController::class, 'getProfilePageLoad'])->name('receptionist.profile')->middleware(['auth','is_receptionist']);
	Route::post('/profileUpdate', [App\Http\Controllers\Receptionist\UsersController::class, 'profileUpdate'])->name('receptionist.profileUpdate')->middleware(['auth','is_receptionist']);
	Route::post('/getUserById', [App\Http\Controllers\Receptionist\UsersController::class, 'getUserById'])->name('receptionist.getUserById')->middleware(['auth','is_receptionist']);

	//All File Upload
	Route::post('/MediaUpload', [App\Http\Controllers\Backend\UploadController::class, 'MediaUpload'])->name('receptionist.MediaUpload')->middleware(['auth','is_receptionist']);

});
