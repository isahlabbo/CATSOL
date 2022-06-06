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

Route::get('/', function () {
    return view('welcome',['sections'=>App\Models\Section::all()]);
});

Route::prefix('ajax')
   ->group(function() {
    Route::get('/section/programme/{programmeId}/get-schedules', 'AjaxController@getSchedules');
    Route::get('/address/state/{stateId}/get-lgas', 'AjaxController@getLgas');
    Route::get('/section/{sectionId}/get-pins', 'AjaxController@getPins');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->name('project.')
    ->prefix('/project')
    ->namespace('Project')
    ->group(function (){
        Route::get('/', 'ProjectController@index')->name('index');
        Route::get('school/{schoolId}', 'ProjectController@schoolProject')->name('school');
        // Student projects
        Route::name('student.')
        ->prefix('school/{schoolId}/student')
        ->group(function (){
            Route::get('/', 'ProjectStudentController@index')->name('index');
            Route::get('/create', 'ProjectStudentController@create')->name('create');
            Route::post('/register', 'ProjectStudentController@register')->name('register');
        });
        //school supervisor routes
        Route::name('supervisor.')
        ->prefix('school/{schoolId}/supervisor')
        ->group(function (){
            Route::get('/', 'SupervisorController@index')->name('index');
            Route::get('/create', 'SupervisorController@create')->name('create');
            Route::get('/{supervisorId}/edit', 'SupervisorController@edit')->name('edit');
            Route::get('/{supervisorId}/delete', 'SupervisorController@delete')->name('delete');
            Route::post('/register', 'SupervisorController@register')->name('register');
            Route::post('/{supervisorId}/update', 'SupervisorController@update')->name('update');
            // supervisor projects
            Route::name('project.')
            ->prefix('{supervisorId}/project')
            ->group(function (){
                Route::get('/', 'SupervisorProjectController@index')->name('index');
                Route::post('/register', 'SupervisorProjectController@register')->name('register');
            });
    });
});

    // school routes
Route::middleware(['auth:sanctum', 'verified'])
    ->name('school.')
    ->prefix('/school')
    ->group(function (){
        Route::get('/', 'SchoolController@index')->name('index');
        //admission routes
        Route::name('admission.')
        ->prefix('admission')
        ->group(function (){
            Route::get('/session/{sessionId}', 'AdmissionController@admissions')->name('index');
            Route::get('/pin/{pinId}', 'AdmissionController@create')->name('create');
            Route::get('/{admissionId}/confirm', 'AdmissionController@confirm')->name('confirm');
            Route::post('/{admissionId}/changepin', 'AdmissionController@changePin')->name('changepin');
            Route::post('/verifypin', 'AdmissionController@verifyPin')->name('verifypin');
            Route::post('/pin/{pindId}/register', 'AdmissionController@register')->name('register');
        });
        //student routes
        Route::name('student.')
        ->prefix('student')
        ->group(function (){
            Route::get('/', 'StudentController@index')->name('index');
            Route::get('/create', 'StudentController@create')->name('create');
            Route::post('/register', 'StudentController@register')->name('register');
            Route::get('/{studentId}/delete', 'StudentController@delete')->name('delete');
            Route::get('/{studentId}/edit', 'StudentController@edit')->name('edit');
            Route::post('/{studentId}/update', 'StudentController@update')->name('update');
            Route::post('/{studentId}/use-pin', 'StudentController@usePin')->name('usePin');
            Route::get('/{studentId}/pin/{pinId}/create-admission', 'StudentController@newAdmission')->name('newAdmission');
            Route::post('/{studentId}/pin/{pinId}/programme-register', 'StudentController@newProgramme')->name('programme.register');
        });

        //payment routes
        Route::name('payment.')
        ->prefix('payment')
        ->group(function (){
            Route::get('/', 'PaymentController@index')->name('index');
            Route::post('/pay', 'PaymentController@register')->name('pay');
        });

        //section routes
        Route::name('section.')
        ->prefix('section')
        ->group(function (){
        Route::get('/', 'SectionController@index')->name('index');
        Route::post('/register', 'SectionController@register')->name('register');
        Route::post('/{sectionId}/update', 'SectionController@update')->name('update');
        Route::get('/{sectionId}/delete', 'SectionController@delete')->name('delete');
        //pin routes
        Route::name('pin.')
        ->prefix('{sectionId}/pin')
        ->group(function (){
            Route::get('/', 'SectionRegistrationPinController@index')->name('index');
            Route::get('/print', 'SectionRegistrationPinController@print')->name('print');
            Route::get('{pinId}/sale', 'SectionRegistrationPinController@sale')->name('sale');
            Route::get('{pinId}/delete', 'SectionRegistrationPinController@delete')->name('delete');
            Route::post('/', 'SectionRegistrationPinController@register')->name('register');
        });
        Route::name('programme.')
        ->prefix('{sectionId}/programme')
        ->group(function (){
            Route::get('/', 'ProgrammeController@index')->name('index');
            Route::post('/register', 'ProgrammeController@register')->name('register');
            Route::post('/{programmeId}/update', 'ProgrammeController@update')->name('update');
            Route::get('/{programmeId}/delete', 'ProgrammeController@delete')->name('delete');
           
            Route::name('course.')
            ->prefix('{programmeId}/course')
            ->group(function (){
                Route::get('/', 'CourseController@index')->name('index');
                Route::post('/register', 'CourseController@register')->name('register');
                Route::post('/{scheduleId}/update', 'CourseController@update')->name('update');
                Route::get('/{scheduleId}/delete', 'CourseController@delete')->name('delete');
                // scheme routes
                Route::name('scheme.')
                ->prefix('{courseId}/scheme')
                ->group(function (){
                    Route::get('/', 'CourseSchemeController@index')->name('index');
                    Route::get('/add-week', 'CourseSchemeController@addWeek')->name('addweek');
                    Route::get('/{schemeId}/edit', 'CourseSchemeController@edit')->name('edit');
                    Route::post('/{schemeId}/update', 'CourseSchemeController@update')->name('update');
                    
                });
            });
            
            Route::name('schedule.')
            ->prefix('{programmeId}/schedule')
            ->group(function (){
                Route::get('/', 'ProgrammeScheduleController@index')->name('index');
                Route::post('/register', 'ProgrammeScheduleController@register')->name('register');
                Route::post('/{scheduleId}/update', 'ProgrammeScheduleController@update')->name('update');
                Route::get('/{scheduleId}/delete', 'ProgrammeScheduleController@delete')->name('delete');
                //lectures routes
                Route::name('lecture.')
                ->prefix('{scheduleId}/lectures')
                ->group(function (){
                    Route::get('/', 'ScheduleLectureController@index')->name('index');
                    Route::post('/register', 'ScheduleLectureController@register')->name('register');
                    Route::post('/{lectureId}/update', 'ScheduleLectureController@update')->name('update');
                    Route::get('/{lectureId}/delete', 'ScheduleLectureController@delete')->name('delete');
                });
                //student routes
                Route::name('admission.')
                ->prefix('admission')
                ->group(function (){
                    Route::get('/programme-schedule/{programmeScheduleId}', 'AdmissionController@index')->name('index');
                    Route::get('/{admissionId}/edit', 'AdmissionController@edit')->name('edit');
                    Route::get('/{admissionId}/delete', 'AdmissionController@delete')->name('delete');
                    Route::post('/{admissionId}/update', 'AdmissionController@update')->name('update');
                });
            }); 
        });
    });
});
