<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\StudentclassController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TermController;
use App\http\controllers\SessionController;
use App\http\controllers\SubjectController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ExamController;


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

Route::get('/', function (){
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/index', function () {
    return view('admin.index');
})->name('index');

Route::get('/BasicSetting', function () {
    return view('admin.basic');
})->name('BasicSetting');

// Route::get('/CreateBasic', function() {
//     return view('admin.create-basic');
// })->name('CreateBasic');

// Route::get('/CreateExam', function() {
//     return view('admin.create-exam');
// })->name('CreateExam');

// Route::get('/UploadStudent', function() {
//     return view('admin.uploadStudent');
// })->name('UploadStudent');

require __DIR__.'/auth.php';

Route::get('/CreateBasic', [BasicController::class, 'viewCreateBasics'])->name('CreateBasic');

Route::get('/UploadStudent', [StudentclassController::class, 'viewclass'])->name('UploadStudent');

Route::post('/UploadSchoolLogo', [BasicController::class, 'uploadLogo'])->name('UploadSchoolLogo');


//Create New.....
Route::post('/createClass', [StudentclassController::class, 'createclass'])->name('createClass');

Route::post('/CreateTeacher', [TeacherController::class, 'createteacher'])->name('CreateTeacher');

Route::post('/CreateTerm', [TermController::class, 'createterm'])->name('CreateTerm');

Route::post('/CreateSession', [SessionController::class, 'createsession'])->name('CreateSession');

Route::post('/CreateSubject', [SubjectController::class, 'createsubject'])->name('CreateSubject');

Route::get('/CreateExam', [ExamController::class, 'viewCreateExam'])->name('CreateExam');

Route::post('/MakeExam', [ExamController::class, 'createexam'])->name('MakeExam');


//Edit ......
Route::get('/EditClass/{id}', [StudentclassController::class, 'Vieweditclass'])->name('EditClass');

Route::post('/edit_class/{id}', [studentclassController::class, 'editclass'])->name('edit_class');

Route::get('/EditTeacher/{id}', [TeacherController::class, 'Vieweditteacher'])->name('EditTeacher');

Route::post('/edit_teacher/{id}', [TeacherController::class, 'editteacher'])->name('edit_teacher');

Route::get('/EditTerm/{id}', [TermController::class, 'Vieweditterm'])->name('EditTerm');

Route::post('/edit_term/{id}', [TermController::class, 'editterm'])->name('edit_term');

Route::get('/EditSession/{id}', [SessionController::class, 'Vieweditsession'])->name('EditSession');

Route::post('/edit_session/{id}', [SessionController::class, 'editsession'])->name('edit_session');

Route::get('/EditSubject/{id}', [SubjectController::class, 'Vieweditsubject'])->name('EditSubject');

Route::post('/edit_subject/{id}', [SubjectController::class, 'editsubject'])->name('edit_subject');

//View All...
Route::get('allClasses',[studentclassController::class, 'viewallclasses'])->name('allClasses');

Route::get('allTerms',[TermController::class , 'viewallterms'])->name('allTerms');

Route::get('allTeachers',[TeacherController::class , 'viewallteachers'])->name('allTeachers');

Route::get('allSessions',[SessionController::class , 'viewallsessions'])->name('allSessions');

Route::get('allSubjects',[SubjectController::class , 'viewallsubjects'])->name('allSubjects');

//Route for import excel data to database.
Route::post('importExcel', [RegisteredUserController::class, 'importExcel'])->name('importExcel');





