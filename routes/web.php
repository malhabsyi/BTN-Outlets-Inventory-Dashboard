<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\erd;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\KantorcabangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

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


Route::get("/profile", [PageController::class, 'profile']);
Route::get("/edit-profile", [PageController::class, 'editProfile']);
Route::get("/create-outlet", [PageController::class, 'createOutlet']);
Route::get("/edit-outlet", [PageController::class, 'editOutlet']);
Route::get("/overview-outlet", [PageController::class, 'overviewOutlet']);
Route::get("/kantor-cabang", [PageController::class, 'kantorCabang']);
Route::get("/overview-cabang", [PageController::class, 'overviewCabang']);
Route::get("/edit-kantor-cabang", [PageController::class, 'editKantorCabang']);
Route::get("/overview-atm", [PageController::class, 'overviewAtm']);
Route::get("/create-atm", [PageController::class, 'createAtm']);
Route::get("/edit-atm", [PageController::class, 'editAtm']);
Route::get("/create-item", [PageController::class, 'createItem']);
Route::get("/edit-item", [PageController::class, 'editItem']);


Route::middleware('guest')->group(function(){
    // LOGIN
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::group(['middleware' =>['auth','cekrole:superadmin']],function(){
    
    //KANTOR CABANG
    Route::get("/edit-kantor-cabang/{id}", [PageController::class, 'editKantorCabang']);
    Route::put("/update-kantor-cabang/{id}",[PageController::class, 'updateKantorCabang']);
    Route::post('delete-kantor-cabang/{id}',[PageController::class, 'destroyKantorCabang']);

    //ATM
    Route::get("/create-atm", [PageController::class, 'createAtm']);
    Route::post("/store-atm", [PageController::class, 'storeAtm']);
    Route::get("edit-atm/{id}", [PageController::class, 'editAtm']);
    Route::put("/update-atm/{id}",[PageController::class, 'updateAtm']);
  
    //DASHBOARD ITEM PENILAIAN ATM  
    Route::get("/create-item-atm/{id}", [PageController::class, 'createItemAtm']);
    Route::get("/edit-item-atm/{id}", [PageController::class, 'editItemAtm']);
    Route::post("/store-item-atm/{id}", [PageController::class, 'storeItemAtm']);
    Route::put("/update-item-atm/{id}", [PageController::class, 'updateItemAtm']);

    //DASHBOARD PENILAIAN ITEM ATM
    Route::get("/indikator-penilaian-atm/{id}", [PageController::class, 'indikatorPenilaianAtm']);
    Route::get("/edit-indikator-penilaian-atm/{id}", [PageController::class, 'editIndikatorPenilaianAtm']);
    Route::put("/update-indikator-penilaian-atm/{id}", [PageController::class, 'updateIndikatorPenilaianAtm']);
    Route::post("/store-indikator-penilaian-atm/{id}", [PageController::class, 'storeIndikatorPenilaianAtm']);
    Route::put("/delete-indikator-penilaian-atm/{id}", [PageController::class, 'deleteIndikatorPenilaianAtm']);
   


    //OUTLET
    //DASHBOARD OUTLET
    Route::get("/overview-cabang/overview-outlet/{id}", [PageController::class, 'overviewOutlet']);
    Route::get("/create-outlet", [PageController::class, 'createOutlet']);
    Route::post("/store-outlet", [PageController::class, 'storeOutlet']);
    Route::get("edit-outlet/{id}", [PageController::class, 'editOutlet']);
    Route::put("/update-outlet/{id}",[PageController::class, 'updateOutlet']);

    //DASHBOARD ITEM PENILAIAN OUTLET 
    Route::get("/create-item-outlet/{id}", [PageController::class, 'createItemOutlet']);
    Route::get("/edit-item-outlet/{id}", [PageController::class, 'editItemOutlet']);
    Route::post("/store-item-outlet/{id}", [PageController::class, 'storeItemOutlet']);
    Route::put("/update-item-outlet/{id}", [PageController::class, 'updateItemOutlet']);


    //DASHBOARD PENILAIAN ITEM OUTLET
    Route::get("/indikator-penilaian-outlet/{id}", [PageController::class, 'indikatorPenilaianoutlet']);
    Route::get("/edit-indikator-penilaian-outlet/{id}", [PageController::class, 'editIndikatorPenilaianoutlet']);
    Route::put("/update-indikator-penilaian-outlet/{id}", [PageController::class, 'updateIndikatorPenilaianoutlet']);
    Route::post("/store-indikator-penilaian-outlet/{id}", [PageController::class, 'storeIndikatorPenilaianoutlet']);
    Route::put("/delete-indikator-penilaian-outlet/{id}", [PageController::class, 'deleteIndikatorPenilaianoutlet']);
   
    //DASHBOARD ADMIN
    Route::get('/akun',[UserController::class, 'index'])->name('akun');
    Route::get('registrasi-form',[UserController::class, 'create'])->name('registrasi-form');
    Route::post('registrasi',[UserController::class, 'store'])->name('registrasi');
    Route::get('edit-user/{id}',[UserController::class, 'edit']);
    Route::put('update-user/{id}',[UserController::class, 'update']);
    Route::post('delete-user/{id}',[UserController::class, 'destroy']);

    //ERD
    Route::get('/erd', [erd::class, 'index']);
  

    // Route::get('/kantorcabang',[KantorcabangController::class, 'index'])->name('kantorcabang');
    // Route::get('edit-kantorcabang/{id}',[KantorcabangController::class, 'edit']);
    // Route::get('overview-kantorcabang/{id}',[KantorcabangController::class, 'overview']);
    // Route::put('update-kantorcabang/{id}',[KantorcabangController::class, 'update']);
    // Route::post('delete-kantorcabang/{id}',[KantorcabangController::class, 'destroy']);


});
Route::group(['middleware' =>['auth','cekrole:superadmin,admin']],function(){


    Route::get('/home', [HomeController::class, 'index']);
    Route::get("/", [PageController::class, 'overview']);

    //LOGOUT
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    //DASHBOARD KANTOR CABANG

    Route::get("/kantor-cabang", [PageController::class, 'kantorCabang']);
    Route::get("/overview-cabang/{id}", [PageController::class, 'overviewKantorCabang']);
  
    //ATM
    //DASHBOARD ATM
    Route::get("/overview-cabang/overview-atm/{id}", [PageController::class, 'overviewAtm']);
 

});