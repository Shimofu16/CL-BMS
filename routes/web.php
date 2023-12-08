<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\PermitController;
use App\Http\Controllers\user\FencingController;
use App\Http\Controllers\admin\ArchiveController;
use App\Http\Controllers\user\BlottersController;
use App\Http\Controllers\admin\BarangayController;
use App\Http\Controllers\user\AnalyticsController;
use App\Http\Controllers\user\ResidentsController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\OfficialsController;
use App\Http\Controllers\user\DiggingPermitController;
use App\Http\Controllers\admin\settings\YearController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\BuildingPermitController;
use App\Http\Controllers\user\CertificateListController;
use App\Http\Controllers\user\MeralcoClearanceController;
use App\Http\Controllers\user\BusinessClearanceController;
use App\Http\Controllers\user\FranchiseClearanceController;
use App\Http\Controllers\user\UsersController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/barangay/{barangay_id}/login', [HomeController::class, 'login'])->name('login.page');
Route::get('/admin/login', [HomeController::class, 'admin'])->name('admin.login.page');
Route::post('/user/auth', [HomeController::class, 'authenticate'])->name('login.auth');
Route::post('/user/logout', [HomeController::class, 'logout'])->name('logout.auth')->middleware('auth');

/* admin */
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/dashboard/{year_id?}', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('barangay/official')->name('official.')->group(function () {
        Route::get('/{year_id?}/{barangay_id?}', [OfficialsController::class, 'index'])->name('index');
        Route::post('store', [OfficialsController::class, 'store'])->name('store');
        Route::put('update/{id}', [OfficialsController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [OfficialsController::class, 'delete'])->name('delete');
    });
    Route::prefix('barangay')->name('barangay.')->group(function () {
        Route::get('/', [BarangayController::class, 'index'])->name('index');
        Route::get('/show/{id}', [BarangayController::class, 'show'])->name('show');
        Route::post('store/{isBarangay}/{barangay_id}', [BarangayController::class, 'store'])->name('store');
        Route::put('update/{isBarangay}/{id}/{barangay_id}', [BarangayController::class, 'update'])->name('update');
        Route::delete('delete/{isBarangay}/{id}', [BarangayController::class, 'destroy'])->name('delete');
    });

    Route::prefix('archive')->name('archive.')->group(function () {
        Route::get('/{folder}', [ArchiveController::class, 'index'])->name('index');
        Route::put('/restore/{folder}/{id}', [ArchiveController::class, 'update'])->name('restore');
    });

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::prefix('year')->name('year.')->group(function () {
            Route::get('/', [YearController::class, 'index'])->name('index');
            Route::post('/store', [YearController::class, 'store'])->name('store');
            Route::put('/update/{id}', [YearController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [YearController::class, 'delete'])->name('delete');
        });
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/{barangay_id?}', [UserController::class, 'index'])->name('index');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('delete');
        Route::get('/{id}/activities', [UserController::class, 'activities'])->name('activities');
    });
});

/* user */
Route::prefix('user')->name('user.')->middleware('auth')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\user\DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('barangay')->name('barangay.')->group(function () {
        Route::prefix('resident')->name('resident.')->group(function () {
            Route::get('/', [ResidentsController::class, 'index'])->name('index');
            Route::get('/create', [ResidentsController::class, 'create'])->name('create');
            Route::get('/show/{id}', [ResidentsController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [ResidentsController::class, 'edit'])->name('edit');
            Route::post('/store', [ResidentsController::class, 'store'])->name('store');
            Route::put('/update/{id}', [ResidentsController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [ResidentsController::class, 'delete'])->name('delete');
        });

        Route::prefix('permit')->name('permit.')->group(function () {
            Route::get('/{permit_type}', [PermitController::class, 'index'])->name('index');
            Route::get('/create', [PermitController::class, 'create'])->name('create');
            Route::get('/show/{id}', [PermitController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [PermitController::class, 'edit'])->name('edit');
            Route::post('/store', [PermitController::class, 'store'])->name('store');
            Route::put('/update/{id}', [PermitController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [PermitController::class, 'delete'])->name('delete');
        });

        Route::prefix('certificate')->name('certificate.')->group(function () {
            Route::post('/create/resident/{resident_id}', [CertificateListController::class, 'create'])->name('create');
        });

        Route::prefix('blotters')->name('blotters.')->middleware(['auth'])->group(function () {
            Route::get('/index', [BlottersController::class, 'index'])->name('index');
            Route::get('/create', [BlottersController::class, 'create'])->name('create');
            Route::post('/store', [BlottersController::class, 'store'])->name('store');
            Route::get('/show/{id}', [BlottersController::class, 'show'])->name('show');
            Route::get('/settelement-agreement/{id}', [BlottersController::class, 'settelement'])->name('settelement');
            Route::put('/settelement-agreement/save/{id}', [BlottersController::class, 'settelement_save'])->name('settelement_save');
            Route::post('/update/{id}', [BlottersController::class, 'update'])->name('update');
            Route::post('/manage/{id}', [BlottersController::class, 'manage'])->name('manage');
            Route::get('/patawag-form/{date}/{id}', [BlottersController::class, 'patawag'])->name('patawag');

            // Route::delete('/delete/{id}', [App\Http\Controllers\ResidentsController::class, 'destroy'])->name('residence.delete');
        });
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('index');
        Route::post('/', [UsersController::class, 'store'])->name('store');
        Route::post('/', [UsersController::class, 'store'])->name('store');
    });
});
Route::prefix('profile')->name('profile.')->middleware(['auth'])->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::put('/', [ProfileController::class, 'update'])->name('update');
});


//Analytics
Route::group(['prefix' => 'Brgy-Analytics', 'middleware' => 'auth'], function () {
    Route::get('/index', [AnalyticsController::class, 'index'])->name('analytics.index');
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


// Permits and clearances
Route::group(['prefix' => 'business_clearance', 'middleware' => 'auth'], function () {
    Route::get('/index', [BusinessClearanceController::class, 'index'])->name('business_clearance.index');
    Route::get('/create-business', [BusinessClearanceController::class, 'create_business'])->name('create_business');
    Route::post('/store', [BusinessClearanceController::class, 'store_business'])->name('store_business');
    Route::get('/show/{id}', [BusinessClearanceController::class, 'show'])->name('business_clearance.show');
    Route::post('/clearance/{id}', [BusinessClearanceController::class, 'show_clearance'])->name('business_clearance.show_clearance');
});

Route::group(['prefix' => 'building_permit', 'middleware' => 'auth'], function () {
    Route::get('/index', [BuildingPermitController::class, 'index'])->name('building_permit.index');
    Route::get('/create', [BuildingPermitController::class, 'create'])->name('building_permit.create');
    Route::post('/store', [BuildingPermitController::class, 'store'])->name('building_permit.store');
    Route::get('/show/{id}', [BuildingPermitController::class, 'show'])->name('building_permit.show');
    Route::get('/clearance/{id}', [BuildingPermitController::class, 'clearance'])->name('building_permit.clearance');
});

Route::group(['prefix' => 'meralco_clearance', 'middleware' => 'auth'], function () {
    Route::get('/index', [MeralcoClearanceController::class, 'index'])->name('meralco_clearance.index');
    Route::get('/create', [MeralcoClearanceController::class, 'create'])->name('meralco_clearance.create');
    Route::post('/store', [MeralcoClearanceController::class, 'store'])->name('meralco_clearance.store');
    Route::get('/show/{id}', [MeralcoClearanceController::class, 'show'])->name('meralco_clearance.show');
    Route::get('/clearance/{id}', [MeralcoClearanceController::class, 'clearance'])->name('meralco_clearance.clearance');
});

Route::group(['prefix' => 'franchise_clearance', 'middleware' => 'auth'], function () {
    Route::get('/index', [FranchiseClearanceController::class, 'index'])->name('franchise_clearance.index');
    Route::get('/create', [FranchiseClearanceController::class, 'create'])->name('franchise_clearance.create');
    Route::post('/store', [FranchiseClearanceController::class, 'store'])->name('franchise_clearance.store');
    Route::get('/show/{id}', [FranchiseClearanceController::class, 'show'])->name('franchise_clearance.show');
    Route::get('/clearance/{id}', [FranchiseClearanceController::class, 'clearance'])->name('franchise_clearance.clearance');
});

Route::group(['prefix' => 'digging_permit', 'middleware' => 'auth'], function () {
    Route::get('/index', [DiggingPermitController::class, 'index'])->name('digging_permit.index');
    Route::get('/create', [DiggingPermitController::class, 'create'])->name('digging_permit.create');
    Route::post('/store', [DiggingPermitController::class, 'store'])->name('digging_permit.store');
    Route::get('/show/{id}', [DiggingPermitController::class, 'show'])->name('digging_permit.show');
    Route::get('/clearance/{id}', [DiggingPermitController::class, 'clearance'])->name('digging_permit.clearance');
});

Route::group(['prefix' => 'fencing_permit', 'middleware' => 'auth'], function () {
    Route::get('/index', [FencingController::class, 'index'])->name('fencing_permit.index');
    Route::get('/create', [FencingController::class, 'create'])->name('fencing_permit.create');
    Route::post('/store', [FencingController::class, 'store'])->name('fencing_permit.store');
    Route::get('/show/{id}', [FencingController::class, 'show'])->name('fencing_permit.show');
    Route::get('/clearance/{id}', [FencingController::class, 'clearance'])->name('fencing_permit.clearance');
});

//import
Route::post('residence/import', [App\Http\Controllers\ResidenceImportController::class, 'import'])->name('importResidence');


Route::group(['prefix' => 'ActivityLog', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\user\ActivityLogController::class, 'index'])->name('activity_logs.index');
});
