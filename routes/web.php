<?php
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CitieController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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

Route::get('/', function () {
    return redirect('login');
});

Route::get('/charts', function () {
    return view('charts');
});


Route::get('my-profile', [ProfileController::class , 'index']);
Route::put('my-profile',[ ProfileController::class, 'update']);


//permission
Route::resource('permissions', PermissionController::class);

//city
Route::resource('cities', CitieController::class);

//role
Route::resource('roles', RoleController::class);

//categorie

Route::resource('categories', CategorieController::class);

//Priority

Route::resource('priorities', PriorityController::class);

//Status

Route::resource('statuses', StatusController::class);

//users

Route::resource('users', UserController::class);

//tickets

Route::resource('tickets', TicketController::class);

//comments

Route::resource('comments', CommentController::class);
Route::get('comment/delete/{id}', [CommentController::class, 'destroy']);

//User settings

Route::get('tickets/{id}/details', [TicketController::class, 'show'])->name('details');

//comments


//displaying
Route::get('my_tickets', [TicketController::class, 'userTickets'])->name('mytickets');
Route::get('my_tickets/{id}/edit', [TicketController::class, 'show'])->name('mytickets.edit');
Route::put('my_tickets/{id}', [TicketController::class, 'update'])->name('mytickets.update');

// showing

Route::get('tickets/{ticket_id}', [TicketController::class, 'show']);
//
Route::post('comment', [CommentController::class, 'postComment']);

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('tickets', [TicketController::class, 'index']);
    Route::post('close_ticket/{ticket_id}', [TicketController::class, 'close']);
});
Route::get('admin', function () {
    return view('admin');
});
Route::get('user', function () {
    return view('user');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
