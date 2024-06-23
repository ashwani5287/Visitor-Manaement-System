<?php

use Illuminate\Support\Facades\Route;
// use app\Http\Controllers\VisterController;
use App\Http\Controllers\VisterController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\DriverDetailsController;
use App\Http\Controllers\OTPVerificationController;

use App\Http\Controllers\UserMobileOtpVerifyController;
use App\Http\Controllers\AddStudentController;
use App\Http\Controllers\OTPDriverWithStudentController;

//role controlller

use App\Http\Controllers\role\RedirectController;
use App\Http\Controllers\role\SuperAdminController;

use App\Http\Controllers\role\AdminController;
use App\Http\Controllers\role\UserController;




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
//*************************Frontend ALL Routes******************* */



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Route::group(['middleware' => ['role:SuperAdmin']], function () {

    //     Route::get('/dashboard', [RedirectController::class, 'redirectUser'])->name('dashboard');

    //     // Route::prefix('admin/')->group(function () {
    //         Route::get('/', [VisterController::class, 'index'])->name('front.home');

    //         // Route::get('admin/dashboard', [AdminPanelController::class, 'index'])->name('admin.dashboard');

    //         Route::group(['prefix' => 'admin'], function () {
    //             Route::group(['as' => 'admin.'], function () {

    // });
    


    // Route::group(['middleware' =>'SchoolTime'], function(){
        Route::group(['middleware' =>'network'], function(){

            Route::group(['middleware' =>'SchoolTime'], function(){
                Route::get('/', [VisterController::class, 'index'])->name('front.home');

                
//********************new Visitor************************** */
Route::get('visitor/Register', [VisterController::class, 'VisitorRegister'])->name('front.VisitorRegister');
Route::post('visitor/Register/store', [VisterController::class, 'VisitorStore'])->name('front.VisitorStore');

//********************pre Visitor************************** */
Route::get('pre/visitor/view', [VisterController::class, 'preVisitor'])->name('front.preVisitor');
Route::post('pre/visitor/store', [VisterController::class, 'preVisitorStore'])->name('front.preVisitorStore');



        // Route::group(['middleware' =>'SchoolTime'], function(){
        // Route::group(['middleware' =>'SchoolTime'], function(){

    Route::post('/Registration',[VisterController::class,'register'])->name('front.Checkexistingregister');
    
    Route::post('Register', [VisterController::class, 'store'])->name('front.Register');
    Route::get('Thanku', [VisterController::class, 'WelcomePage'])->name('front.thanku');
   
});
});


    // Route::group(['middleware' => 'SchoolAuth'], function(){
    Route::get('dashboard', [BackendController::class, 'dashboard'])->name('admin.Dashboard');
    Route::get('new-register', [BackendController::class, 'NewRegister'])->name('admin.NewRegister');
   Route::get('pre-register', [BackendController::class, 'PreRegister'])->name('admin.PreRegister');
    
    // Category Section
    
    Route::get('Meeting/Category', [BackendController::class, 'meetingCategory'])->name('admin.Meeting');
    Route::post('Meeting/Category/store', [BackendController::class, 'meetingCategoryStore'])->name('admin.MeetingStore');
    Route::get('Meeting/Category/delete/{id}', [BackendController::class, 'meetingCategoryDelete'])->name('admin.MeetingDelete');
    Route::post('Meeting/Category/Update', [BackendController::class, 'meetingCategoryUpdate'])->name('admin.MeetingUpdate');

    // Role Section
    Route::get('Role/Category', [RoleController::class, 'AssignRole'])->name('Role.AssignRole');
    Route::post('Assign/Role/Category', [RoleController::class, 'CreateRoleUser'])->name('Role.CreateRoleUser');
    Route::post('update/Role/user/details', [RoleController::class, 'UpdateUserRole'])->name('Role.UpdateUserRole');
    Route::get('delete/Role/user/details', [RoleController::class, 'DeleteUserRole'])->name('Role.DeleteUserRole');

    // Role Create Section
    Route::get('Create/Role/Category', [RoleController::class, 'CreateRole'])->name('Role.CreateRole');
    Route::post('Store/Role/Category', [RoleController::class, 'StoreRole'])->name('Role.StoreRole');
    Route::post('Update/Role/Category', [RoleController::class, 'UpdateRole'])->name('Role.UpdateRole');
    Route::get('Delete/Role/Category/{id}', [RoleController::class, 'DeleteRole'])->name('Role.DeleteRole');

    // Login Details
    Route::get('user/Login/Details', [RoleController::class, 'LoginDetails'])->name('user.LoginDetails');

    // Profile Section
    Route::get('admin/Profile/', [BackendController::class, 'Profile'])->name('admin.Profile');
    Route::post('admin/Profile/image/update', [BackendController::class, 'ProfileImageUpdate'])->name('admin.ProfileImageUpdate');
    Route::post('admin/Profile/password/update', [BackendController::class, 'ProfilePasswordUpdate'])->name('admin.ProfilePasswordUpdate');

//Time system
    Route::get('admin/time/', [BackendController::class, 'timeSystem'])->name('admin.timeSystem');
    Route::post('admin/time/update', [BackendController::class, 'UpdateTimeSystem'])->name('admin.UpdateTimeSystem');

    //ip section
    Route::get('admin/ip/', [BackendController::class, 'ipManage'])->name('admin.IPmanage');
    Route::post('admin/update/ip/', [BackendController::class, 'IPUpdate'])->name('admin.IPUpdate');
    Route::post('admin/add/ip/', [BackendController::class, 'IPAdd'])->name('admin.IPAdd');
    Route::get('admin/delete/ip/', [BackendController::class, 'DeleteIP'])->name('admin.DeleteIP');

  


//*********************************MANAGE STUDENT ****************************** */
    Route::get('student/details', [AddStudentController::class, 'details'])->name('student.StudentDetails');
    Route::post('student/admission', [AddStudentController::class, 'admission'])->name('student.StudentAdmission');
    Route::post('import-students', [AddStudentController::class, 'import'])->name('student.import');
    Route::post('student/updates', [AddStudentController::class, 'UpdateStudents'])->name('student.UpdateStudent');
    Route::get('student/deletes', [AddStudentController::class, 'DeleteStudents'])->name('student.deleteStudents');
    


// });

    // admin.IPmanage

    //*********************************Driver Section*********************************** */
    Route::get('school/driver/', [DriverDetailsController::class, 'driver'])->name('school.driver');
    Route::post('school/driver/add', [DriverDetailsController::class, 'AddDriver'])->name('school.AddDriver');
    // Route::post('school/driver/Update', [DriverDetailsController::class, 'UpdateDriver'])->name('school.UpdateDriver');
    // Route::get('school/driver/Delete/{id}', [DriverDetailsController::class, 'DeleteDriver'])->name('school.DeleteDriver');
    //*********************************Driver With Student Section*********************************** */
    // Route::get('school/driver/batch_Student', [DriverWithStudentController::class, 'batch_Student'])->name('school.batch_Student');
    // Route::post('school/driver/Add/batch/Student', [DriverWithStudentController::class, 'Add_batch_Student'])->name('school.Add_batch_Student');

     //*********************************Driver With Student Section*********************************** */
     Route::get('add/student', [DriverDetailsController::class, 'Student'])->name('school.student');
     Route::post('add/student/driver', [DriverDetailsController::class, 'AddStudentWithDriver'])->name('school.AddStudentWithDriver');
     Route::post('school/send/otp/driver', [DriverDetailsController::class, 'SendOTPAllDriver'])->name('school.SendOTPAllDriver');
     Route::post('import/students/driver', [DriverDetailsController::class, 'importStudent'])->name('school.importStudent');
     Route::get('student/delete/', [DriverDetailsController::class, 'StudentDelete'])->name('school.StudentDelete');
     Route::post('student/update/', [DriverDetailsController::class, 'updateStudent'])->name('school.updateStudent');
     Route::post('update/driver/', [DriverDetailsController::class, 'updateDriver'])->name('school.updateDriver');
     Route::get('Delete/driver/', [DriverDetailsController::class, 'DeleteDriver'])->name('school.DeleteDriver');

     
     
     //*********************************OTP Driver With Student Section*********************************** */
     Route::get('driver/otp', [OTPDriverWithStudentController::class, 'SendOTP'])->name('Driver.SendOTP');
     Route::get('driver/otp/details', [OTPDriverWithStudentController::class, 'SendOTPDetails'])->name('Driver.SendOTPDetails');
     Route::post('driver/otp/verification', [OTPDriverWithStudentController::class, 'DriverOtpVerification'])->name('Driver.DriverOtpVerification');
     Route::post('driver/otp/verification/store', [OTPDriverWithStudentController::class, 'DriverOtpVerificationStore'])->name('Driver.DriverOtpVerificationStore');
     Route::get('driver/otp/verification/details', [OTPDriverWithStudentController::class, 'DriverOtpVerificationDetails'])->name('Driver.SendOTPVerifiy');

     
     
     
    
   
    //*********************************OTP Section******************************************* */

    //this is realted to verify student section only send otp and verify otp 
    Route::get('school/student/otp/otptesting', [OTPVerificationController::class, 'SendOTPAllStudent'])->name('verification.SendOTPAllStudent');

    Route::post('school/student/otp/verification', [OTPVerificationController::class, 'verifyStudentOTP'])->name('verification.OTPVerifcation');
    Route::post('school/student/otp/verification/store/data', [OTPVerificationController::class, 'verifyStudentStore'])->name('verification.verifyStudentStore');
    Route::get('school/student/otp/Details', [OTPVerificationController::class, 'StudentSendOtpDetails'])->name('verification.StudentSendOtpDetails');

    Route::get('school/student/otp/verifyed', [OTPVerificationController::class, 'StudentSendOtpVerifyed'])->name('verification.StudentSendOtpVerifyed');


    


// ***************anyone registraion and get otp and verify ****************************
Route::post('visitor/registraion', [UserMobileOtpVerifyController::class, 'SendOTP'])->name('visitor.sendOTP');
// Route::post('visitor/verification/otp', [UserMobileOtpVerifyController::class, 'verifyOtp'])->name('visitor.verifyOtp');


Route::post('visitor/verification/otp', [UserMobileOtpVerifyController::class, 'verifyOtp'])->name('visitor.verifyOtp');


});








//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});





route::get('/logout',[BackendController::class,'logout'])->name('back.logout');

//Custom Login 

Route::get('/school/login/form',[SchoolController::class,'index'])->name('school.loginForm');
Route::post('/school/login',[SchoolController::class,'Authenticate'])->name('school.login')->middleware('geo_login');

