<?php

use App\Models\Customer;
use App\Models\Designation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\ActiveDeactiveController;
use App\Http\Controllers\InteractionHisotryController;

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
// return view('admin.index');


Route::middleware(['guard'])->group(function () {

    Route::get('/', [IndexController::class, 'index']);
    //Config Route
    Route::get('/menuSetup', [ConfigController::class, 'index'])->name('menu.entry');
    Route::get('menuSetupEdit/{id}', [ConfigController::class, 'menuSetupEdit']);
    Route::post('menuSetupEdits/{id}', [ConfigController::class, 'menuSetupEdits']);
    Route::post('menuSubmit', [ConfigController::class, 'menuSubmit']);

    //Department
    Route::get('/department', [DepartmentController::class, 'index'])->name('department.entry');
    Route::post('/departmentSubmit', [DepartmentController::class, 'departmentSubmit']);
    Route::get('/departmentEdit/{id}', [DepartmentController::class, 'departmentEdit']);
    Route::post('/departmentEdits/{id}', [DepartmentController::class, 'departmentEdits']);

    //Designation
    Route::get('/designation', [DesignationController::class, 'index'])->name('designation.entry');
    Route::get('designationEdit/{id}', [DesignationController::class, 'designationEdit']);
    Route::post('designationEdits/{id}', [DesignationController::class, 'designationEdits']);
    Route::post('/designationSubmit', [DesignationController::class, 'designationSubmit']);


    //userSetup
    Route::get('/userSetup', [UserController::class, 'index'])->name('user.entry');
    Route::get('getDesig/{id}', function ($id) {
        $desg = Designation::where('deptNm', '=', $id)->get();
        return response()->json($desg);
    });
    Route::post('/userSubmit', [UserController::class, 'userSubmit']);
    Route::get('userEdit/{id}', [UserController::class, 'userEdit']);
    Route::post('userEdits/{id}', [UserController::class, 'userEdits']);


    //query
    Route::get('/query', [QueryController::class, 'index'])->name('qr.entry');
    Route::post('/querySubmit', [QueryController::class, 'querySubmit']);
    Route::get('queryEdit/{id}', [QueryController::class, 'queryEdit']);
    Route::post('queryEdits/{id}', [QueryController::class, 'queryEdits']);
    Route::get('callCust/{custNm2}', function ($custNm2) {
        $csts = Customer::where('custId', '=', $custNm2)->get()->toArray();
        return $csts['0']['custNumber'];
        // return response()->json($csts);

    });

    //Interaction History
    Route::get('/interactionHisotry', [InteractionHisotryController::class, 'index']);
    Route::get('getinteractionHisotryList', [InteractionHisotryController::class, 'getinteractionHisotryList']);
    Route::get('addInteraction/{id}', [InteractionHisotryController::class, 'addInteraction'])->name('int.entry');
    Route::post('addInteractions/{qid}', [InteractionHisotryController::class, 'addInteractions']);
    Route::get('deleteInt/{qid}', [InteractionHisotryController::class, 'deleteInt']);
    Route::get('createProjectAndCustomer', [InteractionHisotryController::class, 'createProjectAndCustomer']);

    ///view -> customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('Customer.entry');
    Route::get('/customerList', [CustomerController::class, 'customerList']);
    Route::get('customerEdit/{id}', [CustomerController::class, 'customerEdit']);

    ///view -> customer

    //delete
    Route::get('delete/{tbl}/{pg}/{id}', [DeleteController::class, 'index']);
    //activeDeactive
    Route::get('acdc/{tbl}/{pg}/{stat}/{id}', [ActiveDeactiveController::class, 'index']);
});



//login
Route::get('login', [LogController::class, 'index']);
Route::post('loggedIn', [LogController::class, 'loggedIn']);
Route::get('logout', [LogController::class, 'logout']);
Route::get('noAccess', [LogController::class, 'noAccess']);
