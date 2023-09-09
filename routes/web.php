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
/* Home */

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/barangay/{barangay_id}/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login.page');
Route::get('/admin/login', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.login.page');
Route::post('/user/auth', [App\Http\Controllers\HomeController::class, 'authenticate'])->name('login.auth');
Route::post('/user/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout.auth')->middleware('auth');

/* admin */
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('barangay/official')->name('official.')->group(function () {
        Route::get('/{year_id?}/{barangay_id?}', [App\Http\Controllers\admin\OfficialsController::class, 'index'])->name('index');
        Route::post('store', [App\Http\Controllers\admin\OfficialsController::class, 'store'])->name('store');
        Route::put('update/{id}', [App\Http\Controllers\admin\OfficialsController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [App\Http\Controllers\admin\OfficialsController::class, 'delete'])->name('delete');
    });
    Route::prefix('barangay')->name('barangay.')->group(function () {
        Route::get('/', [App\Http\Controllers\admin\BarangayController::class, 'index'])->name('index');
        Route::get('/show/{id}', [App\Http\Controllers\admin\BarangayController::class, 'show'])->name('show');
        Route::post('store/{isBarangay}/{barangay_id}', [App\Http\Controllers\admin\BarangayController::class, 'store'])->name('store');
        Route::put('update/{isBarangay}/{id}/{barangay_id}', [App\Http\Controllers\admin\BarangayController::class, 'update'])->name('update');
        Route::delete('delete/{isBarangay}/{id}', [App\Http\Controllers\admin\BarangayController::class, 'destroy'])->name('delete');
    });

    Route::prefix('archive')->name('archive.')->group(function () {
        Route::get('/{folder}', [App\Http\Controllers\admin\ArchiveController::class, 'index'])->name('index');
        Route::put('/restore/{folder}/{id}', [App\Http\Controllers\admin\ArchiveController::class, 'update'])->name('restore');
    });
});

/* user */
Route::prefix('user')->name('user.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\user\DashboardController::class, 'index'])->name('dashboard.index');


    Route::prefix('barangay')->name('barangay.')->group(function () {
        Route::prefix('resident')->name('resident.')->group(function () {
            Route::get('/index', [App\Http\Controllers\user\ResidentsController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\user\ResidentsController::class, 'create'])->name('create');
            Route::get('/show/{id}', [App\Http\Controllers\user\ResidentsController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [App\Http\Controllers\user\ResidentsController::class, 'edit'])->name('edit');
            Route::post('/store', [App\Http\Controllers\user\ResidentsController::class, 'store'])->name('store');
            Route::put('/update/{id}', [App\Http\Controllers\user\ResidentsController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [App\Http\Controllers\user\ResidentsController::class, 'delete'])->name('delete');
        });
        Route::prefix('permit')->name('permit.')->group(function () {
            Route::get('/{permit_type}', [App\Http\Controllers\user\PermitController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\user\PermitController::class, 'create'])->name('create');
            Route::get('/show/{id}', [App\Http\Controllers\user\PermitController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [App\Http\Controllers\user\PermitController::class, 'edit'])->name('edit');
            Route::post('/store', [App\Http\Controllers\user\PermitController::class, 'store'])->name('store');
            Route::put('/update/{id}', [App\Http\Controllers\user\PermitController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [App\Http\Controllers\user\PermitController::class, 'delete'])->name('delete');
        });
        Route::prefix('certificate')->name('certificate.')->group(function () {
            Route::get('/create/resident/{resident_id}', [App\Http\Controllers\user\CertificateListController::class, 'create'])->name('create');

        });
    });
});


//Analytics
Route::group(['prefix' => 'Brgy-Analytics', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\AnalyticsController::class, 'index'])->name('analytics.index');
});



Route::group(['prefix' => 'residents', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\ResidentsController::class, 'index'])->name('residence.index');
    Route::get('/create', [App\Http\Controllers\ResidentsController::class, 'create'])->name('residence.create');
    Route::get('/edit/{id}', [App\Http\Controllers\ResidentsController::class, 'edit'])->name('residence.edit');
    Route::post('/store', [App\Http\Controllers\ResidentsController::class, 'store'])->name('residence.store');
    Route::put('/update/{id}', [App\Http\Controllers\ResidentsController::class, 'update'])->name('residence.update');
    Route::get('/show/{id}', [App\Http\Controllers\ResidentsController::class, 'show'])->name('residence.show');
    Route::delete('/delete/{id}', [App\Http\Controllers\ResidentsController::class, 'destroy'])->name('residence.delete');

    Route::get('/import', [App\Http\Controllers\ResidentsController::class, 'import'])->name('residence.import');
});

Route::group(['prefix' => 'residents/brgy_clearance', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\BarangayClearanceController::class, 'index'])->name('brgy_clearance.index');
    Route::get('/create/{id}', [App\Http\Controllers\BarangayClearanceController::class, 'create'])->name('brgy_clearance.create');
    Route::post('/show/{id}', [App\Http\Controllers\BarangayClearanceController::class, 'show'])->name('brgy_clearance.show');
});

Route::group(['prefix' => 'residents/brgy_indigency', 'middleware' => 'auth'], function () {
    Route::get('/create/{id}', [App\Http\Controllers\BarangayIndigencyController::class, 'create'])->name('brgy_indigency.create');
    Route::post('/show/{id}', [App\Http\Controllers\BarangayIndigencyController::class, 'show'])->name('brgy_indigency.show');
});

Route::group(['prefix' => 'residents/residents/brgy_residency', 'middleware' => 'auth'], function () {
    Route::get('/create/{id}', [App\Http\Controllers\BarangayResidencyController::class, 'create'])->name('brgy_residency.create');
    Route::post('/show/{id}', [App\Http\Controllers\BarangayResidencyController::class, 'show'])->name('brgy_residency.show');
});

Route::group(['prefix' => 'residents/brgy_goodmoral', 'middleware' => 'auth'], function () {
    Route::get('/create/{id}', [App\Http\Controllers\BarangayGoodmoralController::class, 'create'])->name('brgy_goodmoral.create');
    Route::post('/show/{id}', [App\Http\Controllers\BarangayGoodmoralController::class, 'show'])->name('brgy_goodmoral.show');
});

Route::group(['prefix' => 'residents/brgy_PUI-PUM', 'middleware' => 'auth'], function () {
    Route::get('/create/{id}', [App\Http\Controllers\BarangayPUIPUMController::class, 'create'])->name('brgy_puipum.create');
    Route::post('/show/{id}', [App\Http\Controllers\BarangayPUIPUMController::class, 'show'])->name('brgy_puipum.show');
});

Route::group(['prefix' => 'residents/brgy_live-in', 'middleware' => 'auth'], function () {
    Route::get('/create/{id}', [App\Http\Controllers\BarangayLiveinController::class, 'create'])->name('brgy_live-in.create');
    Route::post('/show/{id}', [App\Http\Controllers\BarangayLiveinController::class, 'show'])->name('brgy_live-in.show');
});

Route::group(['prefix' => 'residents/brgy_income', 'middleware' => 'auth'], function () {
    Route::get('/create/{id}', [App\Http\Controllers\BarangayIncomeController::class, 'create'])->name('brgy_income.create');
    Route::post('/show/{id}', [App\Http\Controllers\BarangayIncomeController::class, 'show'])->name('brgy_income.show');
});

Route::group(['prefix' => 'Blotters/settlement_agreement', 'middleware' => 'auth'], function () {
    Route::get('/show/{id}', [App\Http\Controllers\BarangaySettlementAgreementController::class, 'show'])->name('settlement_agreement.show');
});



//Blotters
Route::group(['prefix' => 'Blotters', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\BlottersController::class, 'index'])->name('blotters.index');
    Route::get('/create', [App\Http\Controllers\BlottersController::class, 'create'])->name('blotters.create');
    Route::post('/store', [App\Http\Controllers\BlottersController::class, 'store'])->name('blotters.store');
    Route::get('/show/{id}', [App\Http\Controllers\BlottersController::class, 'show'])->name('blotters.show');
    Route::get('/settelement-agreement/{id}', [App\Http\Controllers\BlottersController::class, 'settelement'])->name('blotters.settelement');
    Route::put('/settelement-agreement/save/{id}', [App\Http\Controllers\BlottersController::class, 'settelement_save'])->name('blotters.settelement_save');
    Route::post('/update/{id}', [App\Http\Controllers\BlottersController::class, 'update'])->name('blotters.update');
    Route::post('/manage/{id}', [App\Http\Controllers\BlottersController::class, 'manage'])->name('blotters.manage');
    Route::get('/patawag-form/{date}/{id}', [App\Http\Controllers\BlottersController::class, 'patawag'])->name('blotters.patawag');

    // Route::delete('/delete/{id}', [App\Http\Controllers\ResidentsController::class, 'destroy'])->name('residence.delete');
});

//Reports
Route::group(['prefix' => 'Reports', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');

    Route::get('/residents-report', [App\Http\Controllers\ReportController::class, 'residents_report'])->name('residents.report');
    Route::get('/blotters-report', [App\Http\Controllers\ReportController::class, 'blotters_report'])->name('blotters.report');

    Route::get('/senior-citizen-report', [App\Http\Controllers\ReportController::class, 'senior_citizen_report'])->name('senior-citizen.report');
    Route::get('/PWD-report', [App\Http\Controllers\ReportController::class, 'PWD_report'])->name('PWD.report');
    Route::get('/student-report', [App\Http\Controllers\ReportController::class, 'student_report'])->name('student.report');
    Route::get('/membership-program-report', [App\Http\Controllers\ReportController::class, 'membership_program_report'])->name('membership-program.report');
    Route::get('/residents-occupation-report', [App\Http\Controllers\ReportController::class, 'residents_occupation_report'])->name('residents-occupation.report');
});

Route::get('/permits', function () {
    return view('brgy_permit.index');
})->name('certificate');

//officials
Route::group(['prefix' => 'officials', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\OfficialsController::class, 'index'])->name('officials.index');
    Route::get('/edit', [App\Http\Controllers\OfficialsController::class, 'edit'])->name('officials.edit');
    Route::put('/update/{id1}/{id2}/{id3}/{id4}/{id5}/{id6}/{id7}/{id8}/{id9}/{id10}/{id11}/{id12}/{id13}', [App\Http\Controllers\OfficialsController::class, 'update'])->name('officials.update');
    Route::get('/create', [App\Http\Controllers\OfficialsController::class, 'create'])->name('officials.create');
    Route::post('/store', [App\Http\Controllers\OfficialsController::class, 'store'])->name('officials.store');
    Route::post('/officials-history', [App\Http\Controllers\OfficialsController::class, 'history'])->name('officials.history');
});



Route::group(['prefix' => 'business_clearance', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\BusinessClearanceController::class, 'index'])->name('business_clearance.index');
    Route::get('/create-business', [App\Http\Controllers\BusinessClearanceController::class, 'create_business'])->name('create_business');
    Route::post('/store', [App\Http\Controllers\BusinessClearanceController::class, 'store_business'])->name('store_business');
    Route::get('/show/{id}', [App\Http\Controllers\BusinessClearanceController::class, 'show'])->name('business_clearance.show');
    Route::post('/clearance/{id}', [App\Http\Controllers\BusinessClearanceController::class, 'show_clearance'])->name('business_clearance.show_clearance');
});

Route::group(['prefix' => 'building_permit', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\BuildingPermitController::class, 'index'])->name('building_permit.index');
    Route::get('/create', [App\Http\Controllers\BuildingPermitController::class, 'create'])->name('building_permit.create');
    Route::post('/store', [App\Http\Controllers\BuildingPermitController::class, 'store'])->name('building_permit.store');
    Route::get('/show/{id}', [App\Http\Controllers\BuildingPermitController::class, 'show'])->name('building_permit.show');
    Route::get('/clearance/{id}', [App\Http\Controllers\BuildingPermitController::class, 'clearance'])->name('building_permit.clearance');
});

Route::group(['prefix' => 'meralco_clearance', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\MeralcoClearanceController::class, 'index'])->name('meralco_clearance.index');
    Route::get('/create', [App\Http\Controllers\MeralcoClearanceController::class, 'create'])->name('meralco_clearance.create');
    Route::post('/store', [App\Http\Controllers\MeralcoClearanceController::class, 'store'])->name('meralco_clearance.store');
    Route::get('/show/{id}', [App\Http\Controllers\MeralcoClearanceController::class, 'show'])->name('meralco_clearance.show');
    Route::get('/clearance/{id}', [App\Http\Controllers\MeralcoClearanceController::class, 'clearance'])->name('meralco_clearance.clearance');
});

Route::group(['prefix' => 'franchise_clearance', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\FranchiseClearanceController::class, 'index'])->name('franchise_clearance.index');
    Route::get('/create', [App\Http\Controllers\FranchiseClearanceController::class, 'create'])->name('franchise_clearance.create');
    Route::post('/store', [App\Http\Controllers\FranchiseClearanceController::class, 'store'])->name('franchise_clearance.store');
    Route::get('/show/{id}', [App\Http\Controllers\FranchiseClearanceController::class, 'show'])->name('franchise_clearance.show');
    Route::get('/clearance/{id}', [App\Http\Controllers\FranchiseClearanceController::class, 'clearance'])->name('franchise_clearance.clearance');
});

Route::group(['prefix' => 'digging_permit', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\DiggingPermitController::class, 'index'])->name('digging_permit.index');
    Route::get('/create', [App\Http\Controllers\DiggingPermitController::class, 'create'])->name('digging_permit.create');
    Route::post('/store', [App\Http\Controllers\DiggingPermitController::class, 'store'])->name('digging_permit.store');
    Route::get('/show/{id}', [App\Http\Controllers\DiggingPermitController::class, 'show'])->name('digging_permit.show');
    Route::get('/clearance/{id}', [App\Http\Controllers\DiggingPermitController::class, 'clearance'])->name('digging_permit.clearance');
});

Route::group(['prefix' => 'fencing_permit', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\FencingController::class, 'index'])->name('fencing_permit.index');
    Route::get('/create', [App\Http\Controllers\FencingController::class, 'create'])->name('fencing_permit.create');
    Route::post('/store', [App\Http\Controllers\FencingController::class, 'store'])->name('fencing_permit.store');
    Route::get('/show/{id}', [App\Http\Controllers\FencingController::class, 'show'])->name('fencing_permit.show');
    Route::get('/clearance/{id}', [App\Http\Controllers\FencingController::class, 'clearance'])->name('fencing_permit.clearance');
});

//import
Route::post('residence/import', [App\Http\Controllers\ResidenceImportController::class, 'import'])->name('importResidence');


Route::group(['prefix' => 'ActivityLog', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\ActivityLogController::class, 'index'])->name('activity_logs.index');
});
