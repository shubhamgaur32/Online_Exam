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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'Admin@index');
Route::get('/admin/examCategory', 'Admin@examCategory');
Route::post('/admin/addNewCategory', 'Admin@addNewCategory');
Route::get('/admin/deleteCategory/{id}', 'Admin@deleteCategory');
Route::get('/admin/editCategory/{id}', 'Admin@editCategory');
Route::post('admin/editNewCategory', 'Admin@editNewCategory');
Route::get('/admin/categoryStatus/{id}', 'Admin@categoryStatus');
Route::get('/admin/examManage', 'Admin@examManage');
Route::post('/admin/addNewExam', 'Admin@addNewExam');
Route::get('/admin/examStatus/{id}', 'Admin@examStatus');
Route::get('/admin/deleteExam/{id}', 'Admin@deleteExam');
Route::get('/admin/editExam/{id}', 'Admin@editExam');
Route::post('admin/editExamSub', 'Admin@editExamSub');
Route::get('/admin/studentsManage', 'Admin@studentsManage');
Route::post('admin/addNewStudent', 'Admin@addNewStudent');
Route::get('/admin/studentStatus/{id}', 'Admin@studentStatus');
Route::get('/admin/deleteStudent/{id}', 'Admin@deleteStudent');
Route::get('/admin/editStudent/{id}', 'Admin@editStudent');
Route::post('admin/editStudentFinal', 'Admin@editStudentFinal');
Route::get('/admin/portalManage', 'Admin@portalManage');
Route::post('/admin/addNewPortal', 'Admin@addNewPortal');
Route::get('/admin/portalStatus/{id}', 'Admin@portalStatus');
Route::get('/admin/deletePortal/{id}', 'Admin@deletePortal');
Route::get('/admin/editPortal/{id}', 'Admin@editPortal');
Route::post('admin/editPortalSub', 'Admin@editPortalSub');
Route::get('admin/addQuestions/{id}', 'Admin@addQuestions');
Route::post('admin/addNewQuestion', 'Admin@addNewQuestion');
Route::get('/admin/questionStatus/{id}', 'Admin@questionStatus');
Route::get('/admin/deleteQuestion/{id}', 'Admin@deleteQuestion');
Route::get('/admin/editQuestion/{id}', 'Admin@editQuestion');
Route::post('admin/editQuestionSub', 'Admin@editQuestionSub');
Route::get('admin/logout', 'Admin@logout');


/*PORTAL*/
Route::get('portal/signup', 'PortalController@portalSignup');
Route::post('portal/signupSub', 'PortalController@signupSub');
Route::get('portal/login', 'PortalController@login');
Route::post('portal/loginSub', 'PortalController@loginSub');
Route::get('portal/dashboard', 'PortalOperation@dashboard');
Route::get('portal/examForm/{id}', 'PortalOperation@examForm');
Route::post('portal/examFormSubmit', 'PortalOperation@examFormSubmit');
Route::get('portal/print/{id}', 'PortalOperation@print');
Route::get('portal/updateForm', 'PortalOperation@updateForm');
Route::get('portal/student_exam_info', 'PortalOperation@student_exam_info');
Route::post('portal/student_exam_info_edit', 'PortalOperation@student_exam_info_edit');
Route::get('portal/logout', 'PortalOperation@logout');


/*Student*/
Route::get('student/login', 'StudentController@login');
Route::post('student/loginSub', 'StudentController@loginSub');
Route::get('student/dashboard', 'StudentOperation@dashboard');
Route::get('student/logout', 'StudentOperation@logout');
Route::get('student/exam', 'StudentOperation@exam');
Route::get('student/join_exam', 'StudentOperation@join_exam');
Route::post('student/testData','HomeController@testCal');  
Route::get('student/takeTest','HomeController@test');