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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| LINKS PUBLIC WEB
*/
Route::get('/', 'WebPagesController@index')->name('web.home');
Route::get('/blog', 'WebPagesController@blog')->name('web.blog');;
Route::get('/about', 'WebPagesController@about')->name('web.about');
Route::get('/services', 'WebPagesController@services')->name('web.services');
Route::get('/contact', 'WebPagesController@contact')->name('web.contact');

Route::post('/contact-form/create', 'WebPagesController@storeContactForm')->name('contact-form.store');

Route::get('/privacidad', function(){
    return view('web.privacidad');
});

Route::get('/carta-porte', function(){
    return view('web.carta-porte');
});

Route::get('/search-number-tracking', 'WebPagesController@searchNumberTracking');

Route::post('/search-number-tracking/search','WebPagesController@findSearchNumberTracking');

Route::get('/image/{type}/{name}', 'WebPagesController@viewImage');

Route::get('/tracking-control','TrackingControlController@index');

Route::post('/tracking-control/find', 'TrackingControlController@findTrackingNumber')->name('trackingcontrol.find');

Route::post('/tracking-control/update/status', 'ShipmentsController@shipmentUpdateStatusByCollector')->name('trackingcontrol.update.status');

Route::get('/tracking-number/search', 'WebPagesController@searchTrackingNumber')->name('trackingcontrol.search-trk');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/passwords/reset', 'HomeController@passwordReset')->name('password.reset');
    Route::post('/user/passwords/update', 'HomeController@updatePassword')->name('password.update');


    Route::get('/estados/get', 'CommonsController@getEstados');
    Route::get('/municipio/get/{id}', 'CommonsController@getMunicipio');

    /*
    |--------------------------------------------------------------------------
    | MIDDLEWARE ADMIN
    */
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin', 'DashboardAdminController@index');

        //Links admin/COLLECTORS
        Route::get('/admin/collectors', 'DashboardAdminController@collectorsIndex');

        Route::get('/admin/collectors/get', 'CollectorsController@list');
        Route::post('/admin/collectors/store', 'CollectorsController@store');
        Route::put('/admin/collectors/update', 'CollectorsController@update');
        Route::put('/admin/collectors/update-baja', 'CollectorsController@updatBaja');
        Route::put('/admin/collectors/update/active', 'CollectorsController@updateActive');
        Route::put('/admin/collectors/update/inactive', 'CollectorsController@updateInactive');

        Route::get('/admin/collectors/detail/{id}', 'DashboardAdminController@collectorDetail')->name('collector.detail');


        //Links admin/CUSTOMERS
        Route::get('/admin/customers', 'DashboardAdminController@customersIndex');
        Route::get('/admin/customers/create', 'DashboardAdminController@customerCreate');
        Route::get('/admin/customers/edit/{id}', 'DashboardAdminController@customerEdit')->name('customer.edit');

        Route::get('/admin/customers/reset-pass/{id}', 'DashboardAdminController@customerResetPass')->name('customer.reset-pass');

        Route::get('/admin/customers/edit/status/{id}', 'DashboardAdminController@customerEditStatus')->name('customer.edit.status');
        Route::get('/admin/customers/delete/{id}', 'DashboardAdminController@customerDelete')->name('customer.delete');
        Route::get('/admin/customers/detail/{id}', 'DashboardAdminController@customerDetail')->name('customer.detail');

        Route::post('/admin/customers/store', 'CustomersController@store');
        Route::post('/admin/customers/update', 'CustomersController@update');
        Route::post('/admin/customers/update-pass', 'CustomersController@resetPass');
        Route::post('/admin/customers/update-status', 'CustomersController@updateStatus');
        Route::post('/admin/customers/destroy', 'CustomersController@destroy');

        //Links admin/SHIPMENTS
        Route::get('/admin/shipments', 'DashboardAdminController@shipmentsIndex');
        Route::get('/admin/shipments/detail/{shipment_id}', 'DashboardAdminController@shipmentsDetail')->name('shipments.detail');
        Route::get('/admin/shipments/edit/{shipment_id}', 'DashboardAdminController@shipmentsEdit')->name('shipments.edit');

        Route::get('/admin/shipments/edit/remitent/{shipment_id}', 'DashboardAdminController@shipmentsEditRemitent')->name('shipments.edit.remitent');
        Route::get('/admin/shipments/edit/destinatary/{shipment_id}', 'DashboardAdminController@shipmentsEditDestinatary')->name('shipments.edit.destinatry');
        Route::get('/admin/shipments/edit/status/{shipment_id}', 'DashboardAdminController@shipmentsEditStatus')->name('shipments.edit.status');
        Route::get('/admin/shipments/edit/cost/{shipment_id}', 'DashboardAdminController@shipmentsEditCosto')->name('shipments.edit.cost');
        Route::get('/admin/shipments/edit/disabled/{shipment_id}', 'DashboardAdminController@shipmentsEditDisabled')->name('shipments.edit.disabled');

        Route::get('/admin/shipments/export/excel', 'DashboardAdminController@shipmentsExportExcel')->name('shipments.export.excel');


        Route::post('/admin/shipment/update/remitent', 'ShipmentsController@updateRemitent');
        Route::post('/admin/shipment/update/destinatary', 'ShipmentsController@updateDestinatary');
        Route::post('/admin/shipment/update/cost', 'ShipmentsController@updateCost');
        Route::post('/admin/shipment/update/status', 'ShipmentsController@updateStatus');
        Route::post('/admin/shipment/update/disabled', 'ShipmentsController@updateDisabled');

        /*LINKS API GET DATOS*/
        Route::get('/admin/shipments/get-shipments', 'DashboardAdminController@getShipments');

        Route::get('/admin/shipments/set-seesion-fechas', 'DashboardAdminController@setSessionFechas');


        Route::get('/admmin/shipments_status/', 'DashboardAdminController@shipmentsStatusIndex');

        Route::get('/admmin/shipments_status/get-statuses', 'ShipmentStatusesController@get');

        Route::post('/admmin/shipments_status/store', 'ShipmentStatusesController@store');
        Route::put('/admmin/shipments_status/update', 'ShipmentStatusesController@update');
        Route::put('/admmin/shipments_status/update-active', 'ShipmentStatusesController@activar');
        Route::put('/admmin/shipments_status/update-inactive', 'ShipmentStatusesController@desactivar');
        Route::put('/admmin/shipments_status/delete', 'ShipmentStatusesController@delete');

    });
    /*
    |--------------------------------------------------------------------------
    | MIDDLEWARE CUSTOMER
    */
    Route::group(['middleware' => 'customer'], function () {

        Route::get('/customer/get-customers', 'DashboardCustomerController@getCustumers');

        Route::get('/customer', 'DashboardCustomerController@index');

        Route::get('/customer/search-shipments', 'DashboardCustomerController@searchShipments');

        Route::get('/customer/shipment/create','DashboardCustomerController@createShipment');

        /*-------------------------------------*/
        Route::get('/customer/clients/','DashboardCustomerController@customersClients');

        Route::get('/customer/clients/get/','DashboardCustomerController@getClients');

        Route::post('/customer/clients/store','DashboardCustomerController@storeClient');
        Route::put('/customer/clients/update','DashboardCustomerController@updateClient');

        /*-------------------------------------*/
        Route::get('/customer/shipment/destination-directory','DashboardCustomerController@destinationDirectory');

        Route::get('/customer/shipment/get/destination-directory','DashboardCustomerController@getDestinationDirectory');





        Route::get('/customer/shipment/print/{shipment_id}','DashboardCustomerController@printShipment')->name('customer.shipment.print');
        Route::get('/customer/shipment/print-new/{shipment_id}','DashboardCustomerController@printShipmentNew')->name('customer.shipment.print.new');

        Route::get('/customer/shipment/print-new-alt/{shipment_id}','DashboardCustomerController@printShipmentNewAlt')->name('customer.shipment.print.alt');

        Route::get('/customer/shipment/detail/{shipment_id}','DashboardCustomerController@detailShipment')->name('customer.shipment.detail');

        Route::get('/customer/my-contact-information','DashboardCustomerController@customerContactInformation');

        Route::post('/customer/shipment/store','ShipmentsController@store');


        Route::get('/customer/get/my-info','DashboardCustomerController@getMeRemitent');
        Route::get('/customer/get/destinos','DashboardCustomerController@getDestinos');
        Route::get('/customer/get/clients','DashboardCustomerController@getClientes');

    });

    /*
    |--------------------------------------------------------------------------
    | MIDDLEWARE COLLECTORS
    */

    Route::group(['middleware' => 'collector'], function () {
        Route::get('/collector', 'DashboardCollectorController@home');
        Route::get('/collector/trk/{trk}', 'DashboardCollectorController@trk');

        Route::get('/collector/get-shipment/{id}', 'DashboardCollectorController@getShipment');

        Route::post('/collector/update-status-shipment', 'DashboardCollectorController@updateStatusShipment');

        //Route::post('/collector/image/store', 'DashboardCollectorController@storeImage');
    });

});


