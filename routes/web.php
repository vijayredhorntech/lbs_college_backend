<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use \App\Http\Controllers\SettlementReportController;
use \App\Http\Controllers\StudentsReligionWiseController;
use \App\Http\Controllers\StudentsYearWiseController;
use \App\Http\Controllers\DummyController;



//use App\Http\Controllers\CustomerController;
//use App\Http\Controllers\OrderController;
//use App\Http\Controllers\InvoiceController;
//use App\Http\Controllers\MemberController;
//use App\Http\Controllers\TransactionController;
//use App\Http\Controllers\JobController;
//use App\Http\Controllers\CampaignController;

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

Route::redirect('/', 'login');

Route::get('/secure/{path}', [FileController::class, 'getPrivateFile'])
    ->name('private.file')
    ->middleware('signed')
    ->where('path', '.*');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::group(['prefix' => 'student'], function () {
        Route::get('/list', [StudentController::class, 'index'])->name('student-list');
        Route::get('/form/{student:uuid?}', \App\Livewire\StudentEnrollmentForm::class)->name('student-form');
        Route::get('/profile', function(){
            $student = auth()->user()->student;
            return redirect()->route('student-form', $student);
        })->name('profile');
        Route::get('/profile/{student:uuid?}', \App\Livewire\StudentProfile::class)->name('student-profile');
        Route::get('/profile/{student:uuid}/print', function(App\Models\Student $student){
            return view('admin.student.profile-print', compact('student'));
        })->name('student-profile-print');

        Route::get('/education', \App\Livewire\StudentEducation::class)->name('student-education');
        Route::get('/documents', \App\Livewire\StudentDocuments::class)->name('student-documents');
        Route::group(['prefix' => 'enrollment'], function () {
            Route::view('/', 'admin.student.enrollment-list')->name('enrollment-list');
            Route::get('/enrollment/{student:uuid}/{schedule}', \App\Livewire\CourseEnrollmentForm::class)->name('student-enrollment');
//            Route::get('/enrollment/{student:uuid}/{schedule}/payment', \App\Livewire\PaymentForm::class)->name('student-payment');
        });
    });
    Route::group(['prefix' => 'faculty'], function () {
        Route::get('/list', [FacultyController::class, 'index'])->name('faculty-list');
        Route::get('/form/{faculty:id?}', \App\Livewire\Management\FacultyForm::class)->name('faculty-form');
        Route::get('/classes', [FacultyController::class, 'classesList'])->name('faculty-classes-list');
        Route::get('/class/form/{facultyClass?}', \App\Livewire\FacultyClassForm::class)->name('faculty-class-form');
        Route::get('/class/{facultyClass}/attendance', \App\Livewire\MarkAttendance::class)->name('faculty-mark-attendance');
        Route::get('/class/{facultyClass}/attendance/report', \App\Livewire\AttendanceReport::class)->name('faculty-attendance-report');
    });
    Route::group(['prefix' => 'management'], function () {
        Route::group(['prefix' => 'course'], function () {
            Route::get('/list', [CourseController::class, 'index'])->name('course-list');
            Route::get('/form/{course:slug?}', \App\Livewire\Management\CourseForm::class)->name('course-form');
        });
        Route::group(['prefix' => 'subject'], function () {
            Route::get('/list', [\App\Http\Controllers\SubjectController::class, 'index'])->name('subject-list');
            Route::get('/form/{subject:slug?}', \App\Livewire\Management\SubjectForm::class)->name('subject-form');
        });

        Route::group(['prefix' => 'schedule'], function () {
            Route::view('/list', 'management.schedule.list')->name('schedule-list');
            Route::get('/form/{schedule:id?}', \App\Livewire\Management\ScheduleForm::class)->name('schedule-form');
        });
        Route::group(['prefix' => 'fee'], function () {
            Route::get('/', \App\Livewire\FeeStructure::class)->name('fee-structure');
        });
        Route::group(['prefix' => 'documents'], function () {
            Route::get('/', \App\Livewire\StudentEducationDocuments::class)->name('student_education_documents');
            Route::get('/edit/{id}', \App\Livewire\StudentEducationDocuments::class)->name('student_education_documents_edit');
        });
    })->middleware('role:admin');

    Route::group(['prefix'=>'Report'], function(){
        Route::get('/settlement_report', [SettlementReportController::class, 'index'])->name('settlement');
        Route::get('religionwise_report/', [StudentsReligionWiseController::class, 'index'])->name('religionwise');
        Route::get('/students_year_wise', [StudentsYearWiseController::class, 'index'])->name('students_yearwise');

    });



Route::get('upload', function () {
    return view('dummyStuden');
});

Route::post('students/import', [DummyController::class, 'import'])->name('students.import');


//    Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns');
//    Route::get('/community/users-tabs', [MemberController::class, 'indexTabs'])->name('users-tabs');
//    Route::get('/community/users-tiles', [MemberController::class, 'indexTiles'])->name('users-tiles');
//    Route::get('/community/profile', function () {
//        return view('pages/community/profile');
//    })->name('profile');
//    Route::get('/community/feed', function () {
//        return view('pages/community/feed');
//    })->name('feed');
//    Route::get('/community/forum', function () {
//        return view('pages/community/forum');
//    })->name('forum');
//    Route::get('/community/forum-post', function () {
//        return view('pages/community/forum-post');
//    })->name('forum-post');
//    Route::get('/community/meetups', function () {
//        return view('pages/community/meetups');
//    })->name('meetups');
//    Route::get('/community/meetups-post', function () {
//        return view('pages/community/meetups-post');
//    })->name('meetups-post');
//    Route::get('/finance/cards', function () {
//        return view('pages/finance/credit-cards');
//    })->name('credit-cards');
//    Route::get('/finance/transactions', [TransactionController::class, 'index01'])->name('transactions');
//    Route::get('/finance/transaction-details', [TransactionController::class, 'index02'])->name('transaction-details');
//    Route::get('/job/job-listing', [JobController::class, 'index'])->name('job-listing');
//    Route::get('/job/job-post', function () {
//        return view('pages/job/job-post');
//    })->name('job-post');
//    Route::get('/job/company-profile', function () {
//        return view('pages/job/company-profile');
//    })->name('company-profile');
//    Route::get('/messages', function () {
//        return view('pages/messages');
//    })->name('messages');
//    Route::get('/tasks/kanban', function () {
//        return view('pages/tasks/tasks-kanban');
//    })->name('tasks-kanban');
//    Route::get('/tasks/list', function () {
//        return view('pages/tasks/tasks-list');
//    })->name('tasks-list');
//    Route::get('/inbox', function () {
//        return view('pages/inbox');
//    })->name('inbox');
//    Route::get('/calendar', function () {
//        return view('pages/calendar');
//    })->name('calendar');
//    Route::get('/settings/account', function () {
//        return view('pages/settings/account');
//    })->name('account');
//    Route::get('/settings/notifications', function () {
//        return view('pages/settings/notifications');
//    })->name('notifications');
//    Route::get('/settings/apps', function () {
//        return view('pages/settings/apps');
//    })->name('apps');
//    Route::get('/settings/plans', function () {
//        return view('pages/settings/plans');
//    })->name('plans');
//    Route::get('/settings/billing', function () {
//        return view('pages/settings/billing');
//    })->name('billing');
//    Route::get('/settings/feedback', function () {
//        return view('pages/settings/feedback');
//    })->name('feedback');
//    Route::get('/utility/changelog', function () {
//        return view('pages/utility/changelog');
//    })->name('changelog');
//    Route::get('/utility/roadmap', function () {
//        return view('pages/utility/roadmap');
//    })->name('roadmap');
//    Route::get('/utility/faqs', function () {
//        return view('pages/utility/faqs');
//    })->name('faqs');
//    Route::get('/utility/empty-state', function () {
//        return view('pages/utility/empty-state');
//    })->name('empty-state');
//    Route::get('/utility/404', function () {
//        return view('pages/utility/404');
//    })->name('404');
//    Route::get('/utility/knowledge-base', function () {
//        return view('pages/utility/knowledge-base');
//    })->name('knowledge-base');
//    Route::get('/onboarding-01', function () {
//        return view('pages/onboarding-01');
//    })->name('onboarding-01');
//    Route::get('/onboarding-02', function () {
//        return view('pages/onboarding-02');
//    })->name('onboarding-02');
//    Route::get('/onboarding-03', function () {
//        return view('pages/onboarding-03');
//    })->name('onboarding-03');
//    Route::get('/onboarding-04', function () {
//        return view('pages/onboarding-04');
//    })->name('onboarding-04');
//    Route::get('/component/button', function () {
//        return view('pages/component/button-page');
//    })->name('button-page');
//    Route::get('/component/form', function () {
//        return view('pages/component/form-page');
//    })->name('form-page');
//    Route::get('/component/dropdown', function () {
//        return view('pages/component/dropdown-page');
//    })->name('dropdown-page');
//    Route::get('/component/alert', function () {
//        return view('pages/component/alert-page');
//    })->name('alert-page');
//    Route::get('/component/modal', function () {
//        return view('pages/component/modal-page');
//    })->name('modal-page');
//    Route::get('/component/pagination', function () {
//        return view('pages/component/pagination-page');
//    })->name('pagination-page');
//    Route::get('/component/tabs', function () {
//        return view('pages/component/tabs-page');
//    })->name('tabs-page');
//    Route::get('/component/breadcrumb', function () {
//        return view('pages/component/breadcrumb-page');
//    })->name('breadcrumb-page');
//    Route::get('/component/badge', function () {
//        return view('pages/component/badge-page');
//    })->name('badge-page');
//    Route::get('/component/avatar', function () {
//        return view('pages/component/avatar-page');
//    })->name('avatar-page');
//    Route::get('/component/tooltip', function () {
//        return view('pages/component/tooltip-page');
//    })->name('tooltip-page');
//    Route::get('/component/accordion', function () {
//        return view('pages/component/accordion-page');
//    })->name('accordion-page');
//    Route::get('/component/icons', function () {
//        return view('pages/component/icons-page');
//    })->name('icons-page');
    Route::fallback(function () {
        return view('pages/utility/404');
    });
});
