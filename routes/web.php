<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FrontController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\API\SocialAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Users\UsersController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('addcart/{id}', [FrontendController::class, 'addcart'])->name('addcart');


Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('categories', [FrontendController::class, 'categories'])->name('categories');
Route::get('menus', [FrontendController::class, 'menus'])->name('menus');
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory'])->name('viewcategory');
Route::get('categories/{category_slug}/{menu_slug}', [FrontendController::class, 'menuview'])->name('menuview');
Route::get('menus/{menu_slug}', [FrontendController::class, 'menusview'])->name('menusview');
Route::get('query', [FrontendController::class, 'query'])->name('query');

//contact
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('contactstore', [FrontendController::class, 'contactstore'])->name('contactstore');

Route::get('about', [FrontendController::class, 'about'])->name('about');



Auth::routes();
// users
Route::middleware(['auth', 'isUsers'])->group(function () {
    Route::get('users', [UsersController::class, 'user'])->name('users');
    Route::get('users/edit', [UsersController::class, 'edit'])->name('users.edit-profile');
    Route::get('users/profile', [UsersController::class, 'profile'])->name('users.profile');
    Route::put('users', [UsersController::class, 'update'])->name('users.update-profile');
    Route::get('users/carts', [UsersController::class, 'carts'])->name('users.carts');
    Route::get('users/editcart/{id}', [UsersController::class, 'editcart'])->name('users.edit-cart');
    Route::put('users/{id}', [UsersController::class, 'updatecart'])->name('users.updatecart');
    Route::delete('users/{id}', [UsersController::class, 'deletecart'])->name('users.delete-cart');


});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [FrontController::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('menu', MenuController::class);
    Route::get('search', [FrontController::class, 'search'])->name('search');
    Route::get('admin/carts', [FrontController::class, 'carts'])->name('admin.carts');
    Route::get('admin/editcart/{id}', [FrontController::class, 'editcart'])->name('admin.editcart');
    Route::put('admin/updatecart/{id}', [FrontController::class, 'updatecart'])->name('admin.updatecart');
    Route::delete('admin/destroycarts/{id}', [FrontController::class, 'destroycarts'])->name('admin.destroycarts');
    Route::get('admin/clients', [FrontController::class, 'clients'])->name('admin.clients');
    Route::get('admin/profile', [FrontController::class, 'profile'])->name('admin.profile');
    Route::get('admin/edit-profile', [FrontController::class, 'edit'])->name('admin.edit-profile');
    Route::put('/dashboard', [FrontController::class, 'update'])->name('admin.update-profile');
    Route::get('admin/contact', [FrontController::class, 'contact'])->name('admin.contact');


});


//require __DIR__.'/auth.php';
// google login
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('google/callback', [LoginController::class, 'handleGoogleCallback']);

// google facebook
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('facebook/callback', [LoginController::class, 'handleFacebookCallback']);
