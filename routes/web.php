<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AdminSignInController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BillPdfController;
use App\Http\Controllers\AdminBackupCSVController;
use App\Http\Controllers\AdminChangePassword;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\AdminFeedbackController;
use App\Http\Controllers\FeedbackController;


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

// ---------------------------- ADMIN PANEL ROUTES STARTS HERE ------------------------------------------------
Route::get('/admin_index', [AdminSignInController::class, 'login_in_admin_fun'])->name('admin_index');
Route::post('/admin_login', [AdminSignInController::class, 'admin_login_fun'])->name('admin_login');
Route::get('/admin_dashboard',[AdminSignInController::class, 'admin_dashboard_fun'])->name('admin_dashboard');

// View, Add, Edit, Delete, AUTHOR [CRUD]
Route::get('showauthor', [AuthorController::class, 'admin_author_view'])->name('showauthor');
Route::get('admin_author', [AuthorController::class, 'index'])->name('admin_author');
Route::post('admin_save_author', [AuthorController::class, 'save_author_fun'])->name('admin_save_author');
Route::post('admin_author_view', [AuthorController::class, 'admin_author_view'])->name('admin_author_view');
Route::post('admin_author_edit', [AuthorController::class, 'admin_author_edit'])->name('admin_author_edit');
Route::post('admin_update_author', [AuthorController::class, 'update_author_fun'])->name('admin_update_author');
Route::post('admin_author_delete', [AuthorController::class, 'admin_author_delete'])->name('admin_author_delete');

// View, Add, Edit, Delete CATEGORY [CRUD]
Route::get('showcategory', [CategoryController::class, 'admin_category_view'])->name('showcategory');
Route::get('admin_category', [CategoryController::class, 'index'])->name('admin_category');
Route::post('save_categories', [CategoryController::class, 'save_categories_fun'])->name('save_categories');
Route::post('admin_category_view', [CategoryController::class, 'admin_category_view'])->name('admin_category_view');
Route::post('admin_category_edit', [CategoryController::class, 'admin_category_edit'])->name('admin_category_edit');
Route::post('admin_update_category', [CategoryController::class, 'update_category_fun'])->name('admin_update_category');
Route::post('admin_category_delete', [CategoryController::class, 'admin_category_delete'])->name('admin_category_delete');

// View, Add, Edit, Delete BOOK [CRUD]
Route::get('showbook', [BookController::class, 'admin_book_view'])->name('showbook');
Route::get('admin_book', [BookController::class, 'index'])->name('admin_book');
Route::post('save_book', [BookController::class, 'save_book_fun'])->name('save_book');
Route::post('admin_book_view', [BookController::class, 'admin_book_view'])->name('admin_book_view');
Route::get('admin_book_edit', [BookController::class, 'admin_book_edit'])->name('admin_book_edit');
Route::post('admin_update_book', [BookController::class, 'update_book_fun'])->name('admin_update_book');
Route::post('admin_book_delete', [BookController::class, 'admin_book_delete'])->name('admin_book_delete');


// View, Delete Feedback
Route::get('admin_feedback', [AdminFeedbackController::class, 'index'])->name('admin_feedback');
Route::post('admin_feedback_view', [AdminFeedbackController::class, 'admin_feedback_view'])->name('admin_feedback_view');
Route::post('admin_feedback_delete', [AdminFeedbackController::class, 'admin_feedback_delete'])->name('admin_feedback_delete');


// Admin --> Backup to MySQL to CSV of Books Table
Route::get('admin_backup_csv', [AdminBackupCSVController::class, 'index'])->name('admin_backup_csv');

// Admin --> Change Password
Route::get('admin_change_pwd', [AdminChangePassword::class, 'index'])->name('admin_change_pwd');
Route::post('admin_update_pwd', [AdminChangePassword::class, 'admin_update_password_fun'])->name('admin_update_pwd');

Route::get('/logout_admin',[AdminSignInController::class,'logout_fun'])->name('logout_admin');
//  -------------------------- ADMIN PANEL ROUTES ENDS HERE -------------------------------------------


Route::get('/', [HomeController::class, 'index'])->name('home');

// Sign Up / Registration
Route::get('/signup', [SignUpController::class, 'index'])->name('signup');
Route::post('register_user',[SignUpController::class, 'register_user_fun'])->name('register_user');

// Sign In / Login
Route::get('/signin', [SignInController::class, 'index'])->name('signin');
Route::post('login_user', [SignInController::class, 'login_user_fun'])->name('login_user');

// Forget Password
Route::get('forget_password',[ForgetPasswordController::class, 'index'])->name('forget_password');
Route::post('forget_password_send_mail',[ForgetPasswordController::class, 'forget_password_send_mail'])->name('forget_password_send_mail');

Route::get('/reset_password', [ResetPasswordController::class, 'index'])->name('reset_password');
Route::post('reset_password_save', [ResetPasswordController::class, 'reset_password_fun'])->name('reset_password_save');


// Logout
Route::get('/logout',[SignInController::class,'logout'])->name('logout');

//contact detail
Route::get('/add_contact', [ContactsController::class, 'index'])->name('add_contact');
Route::post('save_contact', [ContactsController::class, 'save_contact_fun'])->name('save_contact');

//feedback
Route::get('/add_feedback', [FeedbackController::class, 'index'])->name('add_feedback');
Route::post('save_feedback', [FeedbackController::class, 'save_feedback_fun'])->name('save_feedback');

//shop details
Route::get('/detail', [DetailController::class, 'index'])->name('detail');

//contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Cart Routes
Route::get('/shopping', [ProductController::class, 'index'])->name('shopping');  
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
 
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
//page->cart->checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('bill_pdf', [BillPdfController::class, 'bill_pdf_fun'])->name('bill_pdf');

