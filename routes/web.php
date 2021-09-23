<?php

use App\Http\Controllers\ShoppingCartDetailController;
use App\Http\Controllers\WebController;
use App\Product;
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

// Route::get('/productos', function () {
//     return view('web.show_grid');
// });
Route::get('/detalles', function () {
    return view('web.product_detail');
});
Route::get('/micuenta', function () {
    return view('web.my_account');
});

Route::get('/contactenos', function () {
    return view('web.contact_us');
});
Route::get('/cart', function () {
    return view('web.cart');
});
Route::get('/checkout', function () {
    return view('web.checkout');
});

Route::get('/', function () {
    return view('welcome');
    /* return redirect()->route('login'); */
});

// ============= RUTAS DEL CLIENTE =================
Route::get('/productos', 'WebController@show_grid')->name('web.show_grid');
Route::get('/producto/{product}', 'WebController@product_detail')->name('web.product_detail');

Route::get('/carrito', 'WebController@cart')->name('web.cart');
Route::get('/registro', 'WebController@login_register')->name('web.registro');
Route::get('/micuenta', 'WebController@myAccount')->name('web.my_account');



Route::resource('shopping_cart_detail', 'ShoppingCartDetailController')->only(['update'])->names('shopping_cart_details');
Route::get('shopping_cart_detail/{shopping_cart_detail}/destroy', 'ShoppingCartDetailController@destroy')->name('shopping_cart_details.destroy');
Route::post('add_to_cart/{product}/store', 'ShoppingCartDetailController@store')->name('shopping_cart_details.store');
Route::get('add_a_product_to_cart/{product}/store', 'ShoppingCartDetailController@storeOne')->name('shopping_cart_details.storeOne');


Route::put('shopping_cart', 'ShoppingCartController@update')->name('shopping_cart.update');

//============== FIN ===============================


// RUTAS PARA BARCODE
Route::get('/barcode', function () {
    $products = Product::get();
    return view('admin.product.barcode', compact('products'));
});
Route::get('print_barcode', 'ProductController@print_barcode')->name('print_barcode');

//RUTAS PARA BUSSINESS
Route::resource('business', 'BusinessController')->names('business')->only([
    'index', 'update'
]);

//RUTAS PARA CATEGORIES
Route::resource('categories', 'CategoryController')->names('categories');

//RUTAS PARA SUBCATEGORIES
Route::resource('subcategories', 'SubcategoryController')->names('subcategories');

//RUTAS PARA AJAX
Route::get('get_subcategories', 'AjaxController@get_subcategories')->name('get_subcategories');
Route::get('getProductsBySubcategory', 'AjaxController@getProductsBySubcategory')->name('getProductsBySubcategory');

// RUTAS PARA PRODUCTS
Route::resource('products', 'ProductController')->names('products');
Route::post('upload/product/{id}/image', 'ProductController@upload_image')->name('upload.product.image');
Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');
Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')->name('get_products_by_barcode');
Route::get('get_products_by_id', 'ProductController@get_products_by_id')->name('get_products_by_id');

//RUTAS PARA PURCHASES
Route::resource('purchases', 'PurchaseController')->names('purchases')->except([
    'edit', 'update', 'destroy'
]);
Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
Route::get('purchases/upload/{purchase}', 'PurchaseController@upload')->name('upload.purchases');
Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');

//RUTAS PARA SALES
Route::resource('sales', 'SaleController')->names('sales')->except([
    'edit', 'update', 'destroy'
]);
Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date');
Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');
Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');
Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');
Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');


//RUTAS PARA LOS TAGS
Route::resource('tags', TagController::class)->except(['show'])->names('tags');







Route::resource('printers', 'PrinterController')->names('printers')->only([
    'index', 'update'
]);


// RUTAS PARA CLIENTS
Route::resource('clients', 'ClientController')->names('clients');

// RUTAS PARA PROVIDERS
Route::resource('providers', 'ProviderController')->names('providers');





// RUTAS PARA USERS
Route::resource('users', 'UserController')->names('users');

// RUTAS PARA ROLES
Route::resource('roles', 'RoleController')->names('roles');






Route::get('/prueba', function () {
    return view('prueba');
});




Auth::routes();

/* Auth::routes(['register' => false]); */
Route::get('/home', 'HomeController@index')->name('home');