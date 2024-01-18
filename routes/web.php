<?php
// namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Agent\AgentController;



use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminController;
// use App\Http\Controllers\AdminController;
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
Route::get('result-declared', [AgentController::class, 'resultdeclared'])->name('resultdeclared');
route::get('subhank', [AgentController::class, 'subhank'])->name('subhank');
route::get('report', [AgentController::class, 'report'])->name('report');
Route::get('/get-filtered-data', [AgentController::class, 'getFilteredDataForAdmins']);
// Route::get('/filtereddata',  [AgentController::class, 'filtereddata']);
Route::get('/filtereddata', [AgentController::class, 'filtereddata'])->name('filtereddata');

Route::get('/', function () {
    return view('home');
});
route::get("/",[AdminController::class, 'newhome']);
route::get('login', [LoginController::class, 'index']);
route::get('dash', [LoginController::class, 'show']);
// route::get('user', [LoginController::class, 'usershow']);
// route::get('/home', [AdminController::class, 'home']);
// route::get('table', [LoginController::class, 'table']);
// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return Redirect::route('admin.login');
    });

    Route::match(['get', 'post'], '/login', [AdminController::class, 'login'])->name('admin.login');


    Route::middleware('auth:admin')->group(function () {
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        // Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Route::get('/userdata', [AdminController::class, 'userdata'])->name('userdata');
        // Route::post('/userdata', [AdminController::class, 'userstore'])->name('userdata.store');
        // route::get('userdata/{id}', [AdminController::class, 'view'])->name('view');
        // route::get('newview/{id}', [AdminController::class, 'newview'])->name('newview');
        // route::get('newedit/{id}', [AdminController::class, 'edit'])->name('newedit');
        // Route::post('newupdate/{id}', [AdminController::class, 'newupdate'])->name('newupdate');
        // route::get('delete/{id}', [AdminController::class, 'delete'])->name('delete');
        route::get('transaction/{id?}', [AdminController::class, 'transaction'])->name('transaction');
        // Route::match(['get', 'post'], 'transaction/{id}', [AdminController::class, 'transaction'])->name('transaction');
        route::get('newhome', [AdminController::class, 'newhome']);
      
        route::get('main', [AdminController::class, 'newheader']);
      

        Route::get('user', [AdminController::class, 'user'])->name('user');
        Route::get('useradd', [AdminController::class, 'useradd'])->name('admin.useradd');
        Route::post('user', [AdminController::class, 'usersave'])->name('user.save');
        // Route::get('user', [AdminController::class, 'displayUsers'])->name('user.list');
        Route::get('admin/user', [AdminController::class, 'displayUsers'])->name('admin.user');

        route::get('useredit/{id}', [AdminController::class, 'useredit'])->name('useredit');
        Route::post('userupdate/{id}', [AdminController::class, 'userupdate'])->name('userupdate');
        route::get('userdelete/{id}', [AdminController::class, 'userdelete'])->name('userdelete');
        // route::get('result', [AdminController::class, 'result']);
        route::get('result', [AdminController::class, 'result'])->name('admin.result');
        Route::get('resultadd', [AdminController::class, 'resultadd'])->name('admin.resultadd');
        Route::post('result', [AdminController::class, 'resultsave'])->name('admin.result.save');
        route::get('resultedit/{id}', [AdminController::class, 'resultedit'])->name('admin.resultedit');
        Route::post('resultupdate/{id}', [AdminController::class, 'resultupdate'])->name('admin.resultupdate');
        route::get('resultdelete/{id}', [AdminController::class, 'resultdelete'])->name('admin.resultdelete');
        route::get('profile', [AdminController::class, 'profile']);
        Route::get('/header', [AdminController::class, 'header'])->name('admin.header');
        Route::get('adminchangepassword', [AdminController::class, 'adminshowChangePassword'])->name('admin.adminchangepassword');


        Route::post('adminchangepassword', [AdminController::class, 'adminchangePassword'])->name('adminchange.password');
        Route::get('change-password/{id}', [AdminController::class, 'showChangePasswordForm'])->name('change-password');

        // Handle the change password form submission (POST request)
        Route::post('change-password', [AdminController::class, 'changePassword'])->name('change.password');
        // Route::get('amount/{id}', [AdminController::class, 'amount'])->name('amount');
        // Route::post('amount/{id}', [AdminController::class, 'amountsave'])->name('amountsave');
        Route::match(['get', 'post'], 'amount/{id}', [AdminController::class, 'amount'])->name('amount');
        Route::match(['get', 'post'], 'withdrawal/{id}', [AdminController::class, 'withdrawal'])->name('withdrawal');
        

        Route::get('/get-filtered-data', [AdminController::class, 'getFilteredDataForAdmin']);
        // Route::get('/get-filtered-datas', [AdminController::class, 'getFilteredDataForAdmins']);
        // Route::get('/admin/get-filtered-data', [AdminController::class, 'getFilteredData'])->name('admin.getFilteredData');


        // Route::get('settlement', [AdminController::class, 'settlement'])->name('settlement');
        Route::get('/settlement', [AdminController::class, 'settlement'])->name('settlement');
    
    });
});

Route::match(['get', 'post'], '/login', [AgentController::class, 'login'])->name('login');
Route::middleware('auth:agent')->group(function () {
    Route::get('/logout', [AgentController::class, 'logout'])->name('logout');
    Route::get('dashboard/{number?}', [AgentController::class, 'dashboard'])->name('dashboard');
    Route::post('dashboard/{number?}', [AgentController::class, 'savedashboard'])->name('savedashboard');
  
    // Route::get('/userdata', [AgentController::class, 'userdata'])->name('agent.userdata');
    // Route::post('/userdata', [AgentController::class, 'userstore'])->name('agent.userdata.store');
    // route::get('userdata/{id}', [AgentController::class, 'view'])->name('agent.view');
    // route::get('newview/{id}', [AgentController::class, 'newview'])->name('agent.newview');
    // route::get('newedit/{id}', [AgentController::class, 'edit'])->name('agent.newedit');
    // Route::post('newupdate/{id}', [AgentController::class, 'newupdate'])->name('agent.newupdate');
    // route::get('delete/{id}', [AgentController::class, 'delete'])->name('agent.delete');
    route::get('transaction/{id?}', [AgentController::class, 'transaction'])->name('agent.transaction');
    // route::get('home', [AgentController::class, 'home']);
    // route::get('main', [AgentController::class, 'newheader']);
    // route::get('user', [AgentController::class, 'user']);
    // route::post('user', [AgentController::class, 'usersave'])->name('agent.usersave');
    route::get('result', [AgentController::class, 'result'])->name('result');
    Route::get('tes', [AgentController::class, 'tes'])->name('agent.tes');
    Route::post('tes', [AgentController::class, 'tessave'])->name('tessave');
    
    Route::post('result', [AgentController::class, 'resultsave'])->name('result.save');
    route::get('resultedit/{id}', [AgentController::class, 'resultedit'])->name('resultedit');
    Route::post('resultupdate/{id}', [AgentController::class, 'resultupdate'])->name('resultupdate');
    route::get('resultdelete/{id}', [AgentController::class, 'resultdelete'])->name('resultdelete');
    // route::get('profile', [AgentController::class, 'profile']);

    // Route::get('/header', [AgentController::class, 'header'])->name('agent.header');
    // Route::get('/change-password', [AgentController::class, 'showChangePasswordForm'])->name('agent.change-password');
    // Route::post('/change-password', [AgentController::class, 'changePassword'])->name('agent.change.password');


    Route::get('agentchangepassword', [AgentController::class, 'agentshowChangePassword'])->name('agent.agentchangepassword');


    Route::post('agentchangepassword', [AgentController::class, 'agentchangePassword'])->name('agentchange.password');
    Route::get('cancel-ticket', [LoginController::class, 'canceltiket'])->name('canceltiket');
    // Route::get('/get-filtered-data', [AgentController::class ,'getFilteredData']);
    Route::get('dashview/{number?}', [AgentController::class, 'dashview'])->name('dashview');
  });



