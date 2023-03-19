<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function() {
//     return view('listings', [
//         'listings' => Listing::all()
//     ]);
// });

// Get all listings
Route::get('/', [ListingController::class, 'index']);

// instead of finding by ID, eloquent model allows us to do this. 404 will be return automatically if ID doesnt exist
// Route::get('/listings/{listing}', function(Listing $listing) {
//     return view('listing', [
//         'listing' => $listing
//     ]);
// });

// Show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing Data
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing Data
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

Route::get('/posts/{id}', function($id) {
    return response('Posts ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function(Request $request) {
    return $request->name . ' ' . $request->age;
});

// Show users' listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Show register/create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Store user data
Route::post('/users', [UserController::class, 'store']);

// Show login form
Route::get('/login', [UserController::class, 'login'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Authenticate user
Route::post('/users/auth', [UserController::class, 'auth']);
