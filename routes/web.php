<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\Student;
use App\Http\Middleware\Teacher;
use App\Http\Middleware\Institution;
use App\Http\Middleware\Admin;
use App\Http\Middleware\CheckStatus;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\InstitutionLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OnlineClassController;
use App\Http\Controllers\CompanySettingController;
use App\Http\Controllers\SystemSettingController;
use App\Http\Controllers\InstitutionTeacherController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CmsController;

use App\Http\Controllers\FaqController;
use App\Http\Controllers\UserDetailController;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstitutionSubcriptionPackageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\InstitutionLController;
use App\Http\Controllers\InstitutionPageController;
use App\Http\Controllers\InstitutionMenuController;
use App\Http\Controllers\InstitutionFormController;
use App\Http\Controllers\InstitutionTeacherRequestController;
use App\Http\Controllers\HomeSettingController;



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
/*
Route::get('/', function () {
    return view('theme.home');
});
*/
Route::get('/', [HomeController::class, 'index']);

Auth::routes();


Route::middleware([CheckStatus::class])->group(function () {
    Route::post('login',[LoginController::class,'login'])->name('login');

});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/allpages', [HomeController::class, 'allpages'])->name('allpages');
Route::get('/page/{slug}', [HomeController::class, 'page'])->name('page');
Route::get('/faquser', [HomeController::class, 'faq'])->name('faquser');

Route::get('/getcity/{country_code}', [HomeController::class, 'getcity'])->name('getcity');
Route::get('studentview/{id}',[HomeController::class,'studentview'])->name('studentview');
Route::get('teacherview/{id}',[HomeController::class,'teacherview'])->name('teacherview');
Route::get('institutionview/{id}',[HomeController::class,'institutionview'])->name('institutionview');
Route::get('courseview/{id}',[HomeController::class,'courseview'])->name('courseview');
Route::get('coursesubscription/{id}',[HomeController::class,'coursesubscription'])->name('coursesubscription');
Route::post('coursesubscriptionpay',[HomeController::class,'coursesubscriptionpay'])->name('coursesubscriptionpay');

// 25.07.23//
Route::post('contactusstore',[HomeController::class,'contactusstore'])->name('contactusstore');
Route::get('allinstitutions',[HomeController::class,'allinstitutions'])->name('allinstitutions');
// 25.07.23//

Route::get('/directtermsandcondition', [HomeController::class, 'directtermsandcondition'])->name('directtermsandcondition');
Route::get('/directprivacypolicy', [HomeController::class, 'directprivacypolicy'])->name('directprivacypolicy');
Route::get('/directaboutus', [HomeController::class, 'directaboutus'])->name('directaboutus');


Route::get('institutionwebsite/{id}',[HomeController::class,'institutionwebsite'])->name('institutionwebsite');

Route::get('teacherstudentregister/{id}',[HomeController::class,'teacherstudentregister'])->name('teacherstudentregister');
Route::get('teacherstudentlogin/{id}',[HomeController::class,'teacherstudentlogin'])->name('teacherstudentlogin');

Route::post('registerstore',[HomeController::class,'registerstore'])->name('registerstore');



Route::post('/postteacherstudentlogin', [HomeController::class, 'postteacherstudentlogin'])->name('postteacherstudentlogin');


Route::post('coursecommentsubmit',[HomeController::class,'coursecommentsubmit'])->name('coursecommentsubmit');

Route::post('coursesubscriptionpay_ajax',[HomeController::class,'coursesubscriptionpay_ajax'])->name('coursesubscriptionpay_ajax');


Route::get('/orders/{order}/payment/callback', [HomeController::class, 'callback'])->name('payment.callback');

Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');


Route::post('teacherstudentstudentapprove/{id}/{type}',  [HomeController::class,'teacherstudentstudentapprove'])->name('teacherstudentstudentapprove');
Route::post('teacherstudentstudentdelete/{id}/{type}',  [HomeController::class,'teacherstudentstudentdelete'])->name('teacherstudentstudentdelete');


Route::post('teacherstudentstudentsend/{id}/{type}',  [HomeController::class,'teacherstudentstudentsend'])->name('teacherstudentstudentsend');
Route::post('institutionstudentstudentsend/{id}/{type}',  [HomeController::class,'institutionstudentstudentsend'])->name('institutionstudentstudentsend');

Route::post('institutionteacherteachersend/{id}/{type}',  [HomeController::class,'institutionteacherteachersend'])->name('institutionteacherteachersend');

Route::post('teacherinstitutioninstitutionsend/{id}/{type}',  [HomeController::class,'teacherinstitutioninstitutionsend'])->name('teacherinstitutioninstitutionsend');

Route::post('institutionstudentstudentdelete/{id}/{type}',  [HomeController::class,'institutionstudentstudentdelete'])->name('institutionstudentstudentdelete');

Route::post('institutionteacherteacherdelete/{id}/{type}',  [HomeController::class,'institutionteacherteacherdelete'])->name('institutionteacherteacherdelete');

Route::post('teacherinstitutioninstitutiondelete/{id}/{type}',  [HomeController::class,'teacherinstitutioninstitutiondelete'])->name('teacherinstitutioninstitutiondelete');

Route::post('institutionstudentstudentapprove/{id}/{type}',  [HomeController::class,'institutionstudentstudentapprove'])->name('institutionstudentstudentapprove');

Route::post('institutionteacherteacherapprove/{id}/{type}',  [HomeController::class,'institutionteacherteacherapprove'])->name('institutionteacherteacherapprove');

Route::post('teacherinstitutioninstitutionapprove/{id}/{type}',  [HomeController::class,'teacherinstitutioninstitutionapprove'])->name('teacherinstitutioninstitutionapprove');

Route::post('studentteacherstudentapprove/{id}/{type}',  [HomeController::class,'studentteacherstudentapprove'])->name('studentteacherstudentapprove');

Route::post('studentinstitutionstudentapprove/{id}/{type}',  [HomeController::class,'studentinstitutionstudentapprove'])->name('studentinstitutionstudentapprove');

Route::post('studentteacherstudentdelete/{id}/{type}',  [HomeController::class,'studentteacherstudentdelete'])->name('studentteacherstudentdelete');

Route::post('studentinstitutionstudentdelete/{id}/{type}',  [HomeController::class,'studentinstitutionstudentdelete'])->name('studentinstitutionstudentdelete');

Route::post('studentteacherstudentsend/{id}/{type}',  [HomeController::class,'studentteacherstudentsend'])->name('studentteacherstudentsend');

Route::post('studentinstitutionstudentsend/{id}/{type}',  [HomeController::class,'studentinstitutionstudentsend'])->name('studentinstitutionstudentsend');
Route::match(['get', 'post'], '/custom-logout', [HomeController::class, 'logout'])->name('custom.logout');



//start INstitution register//
Route::get('/register/step1', [RegisterController::class, 'showStep1'])->name('register.step1');
Route::post('/Step1submit', [RegisterController::class, 'Step1submit'])->name('Step1submit');
Route::get('/register/step2', [RegisterController::class,'showStep2'])->name('register.step2');
Route::post('/Step2submit', [RegisterController::class, 'Step2submit'])->name('Step2submit');
Route::get('/register/step3',  [RegisterController::class,'showStep3'])->name('register.step3');
Route::post('/register/submit',  [RegisterController::class,'submit'])->name('register.submit');
//End INstitution register//
//start INstitution login//

Route::get('/instlogin', [InstitutionLController::class, 'instlogin'])->name('instlogin');
Route::post('/postinstlogin', [InstitutionLController::class, 'postinstlogin'])->name('postinstlogin');
Route::get('/signout', [InstitutionLController::class, 'signout'])->name('signout');



Route::domain('{company_name}.markez.elvirainfotech.org')->group(function () {


    Route::get('/',[HomeController::class,'newinstitutionwebsite'])->name('newinstitutionwebsite');
});

//End INstitution login//

// Start Institution dashboard

// Start Page management//
Route::get('/institutionpage', [InstitutionPageController::class, 'institutionpage'])->name('institutionpage');
Route::post('/pagestore',[InstitutionPageController::class,'pagestore'])->name('pagestore');

Route::post('/pageupdate/{id}',[InstitutionPageController::class,'pageupdate'])->name('pageupdate');

Route::get('viewpage/{id}',[InstitutionPageController::class,'viewpage'])->name('viewpage');
Route::post('/pagedelete/{id}',[InstitutionPageController::class,'pagedelete'])->name('pagedelete');
//End  Page management//
// Start Form management //

// Start Form management //

Route::get('/institution-form', [InstitutionFormController::class,'institutionform'])->name('institutionform');
// Route::get('/addnewform', [InstitutionFormController::class,'addnewform'])->name('addnewform');
 Route::post('/addnewform', [InstitutionFormController::class,'addnewform'])->name('addnewform');
Route::post('/fieldstore', [InstitutionFormController::class,'fieldstore'])->name('fieldstore');

Route::get('viewform/{id}',[InstitutionFormController::class,'viewform'])->name('viewform');
Route::post('/formdelete/{id}',[InstitutionFormController::class,'formdelete'])->name('formdelete');
Route::post('/formupdate/{id}',[InstitutionFormController::class,'formupdate'])->name('formupdate');
Route::post('/formfielddelete/{id}',[InstitutionFormController::class,'formfielddelete'])->name('formfielddelete');

// End Form management//

// End Form management

// Start menu management//
Route::get('/institutionmenu', [InstitutionMenuController::class, 'institutionmenu'])->name('institutionmenu');
Route::post('/menustore',[InstitutionMenuController::class,'menustore'])->name('menustore');
Route::post('/menuupdate/{id}',[InstitutionMenuController::class,'menuupdate'])->name('menuupdate');
Route::get('viewmenu/{id}',[InstitutionMenuController::class,'viewmenu'])->name('viewmenu');
Route::post('/menudelete/{id}',[InstitutionMenuController::class,'menudelete'])->name('menudelete');

//End  menu management//



// End Institution dashboard



// Route::middleware([Student::class])->group(function () {
    Route::get('profile', [StudentController::class, 'profile'])->name('profile');
    Route::post('profileupdate', [StudentController::class, 'profileupdate'])->name('profileupdate');


    Route::post('save_quiz_response', [StudentController::class, 'save_quiz_response'])->name('save_quiz_response');

    Route::post('ajaxImageUpload', [StudentController::class, 'ajaxImageUploadPost'])->name('ajaxImageUpload');
    /*Route::get('course',[StudentController::class,'course'])->name('studentcourse');*/
     Route::get('studentcourse',[StudentController::class,'course'])->name('studentcourse');
    Route::get('teacher',[StudentController::class,'teacher'])->name('studentteacher');
    Route::get('institution',[StudentController::class,'institution'])->name('studentinstitution');
    Route::get('studentcoursecontent/{id}',[StudentController::class,'coursecontent'])->name('studentcoursecontent');
    Route::get('studentcoursecontentview/{id}',[StudentController::class,'studentcourseView'])->name('studentcoursecontentview');
    Route::get('studentcoursecontentquize/{id}/{content_id}',[StudentController::class,'coursequize'])->name('studentcoursecontentquize');
    Route::get('studentcoursecontentquizeview/{id}',[StudentController::class,'quizView'])->name('studentcoursecontentquizeview');
    Route::get('studentcoursecontentquizequestion/{id}/{content_id}/{quiz_id}',[StudentController::class,'coursequizequestion'])->name('studentcoursecontentquizequestion');

     Route::get('studentcoursecontentquizeresult/{id}/{content_id}/{quiz_id}',[StudentController::class,'coursequizeresult'])->name('studentcoursecontentquizeresult');


    Route::get('studentcoursecontentquizequestionview/{id}',[StudentController::class,'questionView'])->name('studentcoursecontentquizequestionview');
    Route::get('studentcourseview/{id}',[StudentController::class,'courseView'])->name('studentcourseview');
    Route::get('studentcourseonline_classes/{id}/{content_id}',[StudentController::class,'onlineclassstudent'])->name('studentcourseonline_classes');

    Route::get('studentcoursecertificate/{id}/{download}',[StudentController::class,'coursecertificate'])->name('studentcoursecertificate');
     Route::get('studentorder',[StudentController::class,'order'])->name('studentorder');
    Route::get('studentorderpaymentview/{id}',[StudentController::class,'paymentView'])->name('studentorderpaymentview');
    Route::get('studentmessage',[StudentController::class,'message'])->name('studentmessage');
    Route::post('getteacherlistforstudentmessage',[StudentController::class,'getteacherlistforstudentmessage'])->name('getteacherlistforstudentmessage');

    Route::post('getmessagechatforstudentteacher',[StudentController::class,'getmessagechatforstudentteacher'])->name('getmessagechatforstudentteacher');

    Route::post('sendmessagechatforstudentteacher',[StudentController::class,'sendmessagechatforstudentteacher'])->name('sendmessagechatforstudentteacher');

    Route::get('studentmessageinstitution',[StudentController::class,'messageinstitution'])->name('studentmessageinstitution');

    Route::post('getinstitutionlistforstudentmessage',[StudentController::class,'getinstitutionlistforstudentmessage'])->name('getinstitutionlistforstudentmessage');

    Route::post('getmessagechatforstudentinstitution',[StudentController::class,'getmessagechatforstudentinstitution'])->name('getmessagechatforstudentinstitution');

    Route::post('sendmessagechatforstudentinstitution',[StudentController::class,'sendmessagechatforstudentinstitution'])->name('sendmessagechatforstudentinstitution');

    Route::get('becometeacher', [StudentController::class, 'becometeacher'])->name('becometeacher');
    Route::post('submitrequest', [StudentController::class, 'submitrequest'])->name('submitrequest');




// });

// Route::middleware([Teacher::class])->group(function () {
     Route::get('teacherprofile', [TeacherController::class, 'teacherprofile'])->name('teacherprofile');
     Route::post('teacherprofileupdate', [TeacherController::class, 'profileupdate'])->name('teacherprofileupdate');
    Route::get('teachercourse',[TeacherController::class,'course'])->name('teachercourse');
    Route::post('teachercoursestatus/{id}/{status}',[TeacherController::class,'statuscourse'])->name('teachercoursestatus');

    Route::get('teachercoursecontent/{id}',[TeacherController::class,'coursecontent'])->name('teachercoursecontent');
    Route::post('teachercoursecontentstatus/{id}/{status}',[TeacherController::class,'statusteachercoursecontent'])->name('teachercoursecontentstatus');
    Route::get('teachercoursecontenteview/{id}',[TeacherController::class,'courseView'])->name('teachercoursecontenteview');
    Route::post('teachercoursecontentdelete/{id}',[TeacherController::class,'destroy'])->name('teachercoursecontentdelete');
    Route::post('teachercoursecontentstore',[TeacherController::class,'store'])->name('teachercoursecontentstore');
    Route::post('teachercoursecontentupdate/{id}',[TeacherController::class,'update'])->name('teachercoursecontentupdate');
    Route::get('teacherinstitution',[TeacherController::class,'institution'])->name('teacherinstitution');
     Route::get('teacherstudent',[TeacherController::class,'student'])->name('teacherstudent');
     Route::post('teacherajaxImageUpload', [TeacherController::class, 'ajaxImageUploadPost'])->name('teacherajaxImageUpload');

     Route::get('teachercoursecontentquize/{id}/{content_id}',[TeacherController::class,'coursequize'])->name('teachercoursecontentquize');
     Route::post('teachercoursecontentquizestore',[TeacherController::class,'quizestore'])->name('teachercoursecontentquizestore');
     Route::post('teachercoursecontentquizestatus/{id}/{status}',[TeacherController::class,'statusteacherquiz'])->name('teachercoursecontentquizestatus');
     Route::get('teachercoursecontentquize/{id}/{content_id}',[TeacherController::class,'coursequize'])->name('teachercoursecontentquize');
     Route::get('teachercoursecontentquizeview/{id}',[TeacherController::class,'quizView'])->name('teachercoursecontentquizeview');
    Route::post('teachercoursecontentquizedelete/{id}',[TeacherController::class,'quizdestroy'])->name('teachercoursecontentquizedelete');
    Route::post('teachercoursecontentquizeupdate/{id}',[TeacherController::class,'quizupdate'])->name('teachercoursecontentquizeupdate');


    Route::get('online_classes/{id}/{content_id}',[OnlineClassController::class,'index'])->name('online_classes');



    Route::get('teacheronlineattendance/{id}/{content_id}/{online_class_id}',[OnlineClassController::class,'onlineattendance'])->name('teacheronlineattendance');

    Route::post('online_classes_store',[OnlineClassController::class,'store'])->name('online_classes.store');
    Route::post('online_classes_delete/{id}',[OnlineClassController::class,'destroy'])->name('online_classes_delete');
    Route::get('online_classes_testing',[OnlineClassController::class,'testing'])->name('online_classes_testing');

    Route::post('teacheronlineattendancestore/{id}/{online_class_id}',[OnlineClassController::class,'attendancestore'])->name('teacheronlineattendancestore');

    Route::get('teachercoursecontentquizequestion/{id}/{content_id}/{quiz_id}',[TeacherController::class,'coursequizequestion'])->name('teachercoursecontentquizequestion');
    Route::post('teachercoursecontentquizequestionstore',[TeacherController::class,'questionstore'])->name('teachercoursecontentquizequestionstore');
    Route::get('teachercoursecontentquizequestionview/{id}',[TeacherController::class,'questionView'])->name('teachercoursecontentquizequestionview');
    Route::post('teachercoursecontentquizequestionstatus/{id}/{status}',[TeacherController::class,'statusquestion'])->name('teachercoursecontentquizequestionstatus');
    Route::post('teachercoursecontentquizequestiondelete/{id}/{quiz_id}',[TeacherController::class,'questiondestroy'])->name('teachercoursecontentquizequestiondelete');
    Route::post('teachercoursecontentquizequestionupdate/{id}',[TeacherController::class,'questionupdate'])->name('teachercoursecontentquizequestionupdate');


     Route::get('teachermessage',[TeacherController::class,'teachermessage'])->name('teachermessage');
    Route::post('getstudentlistforteachermessage',[TeacherController::class,'getstudentlistforteachermessage'])->name('getstudentlistforteachermessage');

    Route::post('getmessagechatforteacherstudent',[TeacherController::class,'getmessagechatforteacherstudent'])->name('getmessagechatforteacherstudent');

    Route::post('sendmessagechatforteacherstudent',[TeacherController::class,'sendmessagechatforteacherstudent'])->name('sendmessagechatforteacherstudent');

    Route::get('institutionview',[TeacherController::class,'institutionview'])->name('institutionview');
    Route::get('institutioninvitation',[TeacherController::class,'institutioninvitation'])->name('institutioninvitation');
        //assign course  approve and reject //
        Route::get('courseassignlist',[TeacherController::class,'courseassignlist'])->name('courseassignlist');
        Route::post('courseassignapprove/{id}',[TeacherController::class,'courseassignapprove'])->name('courseassignapprove');
        Route::post('courseassigndecline/{id}',[TeacherController::class,'courseassigndecline'])->name('courseassigndecline');
        //assign course  approve and reject //


// });

//instution start//
     Route::get('institutionprofile', [InstitutionLoginController::class, 'institutionprofile'])->name('institutionprofile');

     Route::get('institutiondashboard', [InstitutionLoginController::class, 'institutiondashboard'])->name('institutiondashboard');
      Route::post('institutionprofileupdate', [InstitutionLoginController::class, 'profileupdate'])->name('institutionprofileupdate');
    Route::post('institutioninstitutionupdate', [InstitutionLoginController::class, 'institutionupdate'])->name('institutioninstitutionupdate');
    Route::get('institutioncourse',[InstitutionLoginController::class,'course'])->name('institutioncourse');

    Route::post('institutioncoursestatus/{id}/{status}',[InstitutionLoginController::class,'statuscourse'])->name('institutioncoursestatus');

     Route::post('institutioncourcecommissionpercentage/{id}',[InstitutionLoginController::class,'courcecommissionpercentage'])->name('institutioncourcecommissionpercentage');

     Route::post('institutioncourcecommissionpercentagesave/{course_id}/{str}',[InstitutionLoginController::class,'courcecommissionpercentagesave'])->name('institutioncourcecommissionpercentagesave');

     Route::get('teacherstudentregister/{id}',[HomeController::class,'teacherstudentregister'])->name('teacherstudentregister');
     Route::get('teacherstudentlogin/{id}',[HomeController::class,'teacherstudentlogin'])->name('teacherstudentlogin');

     Route::post('registerstore',[HomeController::class,'registerstore'])->name('registerstore');



     Route::post('/postteacherstudentlogin', [HomeController::class, 'postteacherstudentlogin'])->name('postteacherstudentlogin');


    Route::get('institutioncourseview/{id}',[InstitutionLoginController::class,'courseView'])->name('institutioncourseview');
    Route::post('institutioncoursedelete/{id}',  [InstitutionLoginController::class,'destroy'])->name('institutioncoursedelete');
    Route::post('institutioncoursestore',[InstitutionLoginController::class,'store'])->name('institutioncoursestore');
    Route::post('institutioncourseupdate/{id}',[InstitutionLoginController::class,'update'])->name('institutioncourseupdate');
    Route::get('institutionteacher',[InstitutionLoginController::class,'teacher'])->name('institutionteacher');
    Route::get('institutionstudent',[InstitutionLoginController::class,'student'])->name('institutionstudent');
     Route::post('institutionajaxImageUpload', [InstitutionLoginController::class, 'ajaxImageUploadPost'])->name('institutionajaxImageUpload');

    Route::get('institutioncoursecontent/{id}',[InstitutionLoginController::class,'coursecontent'])->name('institutioncoursecontent');
    Route::get('institutioncoursecontentview/{id}',[InstitutionLoginController::class,'institutioncourseView'])->name('institutioncoursecontentview');
    Route::get('institutioncoursecontentquize/{id}/{content_id}',[InstitutionLoginController::class,'coursequize'])->name('institutioncoursecontentquize');
    Route::get('institutioncoursecontentquizeview/{id}',[InstitutionLoginController::class,'quizView'])->name('institutioncoursecontentquizeview');
    Route::get('institutioncoursecontentquizequestion/{id}/{content_id}/{quiz_id}',[InstitutionLoginController::class,'coursequizequestion'])->name('institutioncoursecontentquizequestion');
    Route::get('institutioncoursecontentquizequestionview/{id}',[InstitutionLoginController::class,'questionView'])->name('institutioncoursecontentquizequestionview');

    Route::get('institutioncourseonline_classes/{id}/{content_id}',[InstitutionLoginController::class,'onlineclassindex'])->name('institutioncourseonline_classes');

    Route::get('institutionmessage',[InstitutionLoginController::class,'institutionmessage'])->name('institutionmessage');

    Route::post('getstudentlistforinstitutionmessage',[InstitutionLoginController::class,'getstudentlistforinstitutionmessage'])->name('getstudentlistforinstitutionmessage');

    Route::post('getmessagechatforinstitutionstudent',[InstitutionLoginController::class,'getmessagechatforinstitutionstudent'])->name('getmessagechatforinstitutionstudent');

    Route::post('sendmessagechatforinstitutionstudent',[InstitutionLoginController::class,'sendmessagechatforinstitutionstudent'])->name('sendmessagechatforinstitutionstudent');

    Route::get('subcription',[InstitutionLoginController::class,'institutionsubcription'])->name('subcription');
    Route::get('institutionsubscription/{id}',[InstitutionLoginController::class,'institutionsubscriptionpackage'])->name('institutionsubscription');
    Route::get('institutionorder',[InstitutionLoginController::class,'order'])->name('institutionorder');
    Route::post('institutionorderdelete/{id}',  [InstitutionLoginController::class,'orderdestroy'])->name('institutionorderdelete');

    Route::get('/subcriptionpackage',[InstitutionLoginController::class,'institutionsubcriptionpackagedetail'])->name('subcriptionpackage');

    Route::get('/noaccess',[InstitutionLoginController::class,'noaccesspage'])->name('noaccess');
    Route::get('institutionteacherview',[InstitutionLoginController::class,'institutionteacherview'])->name('institutionteacherview');

        Route::get('institutionmyteacher',[InstitutionLoginController::class,'institutionmyteacher'])->name('institutionmyteacher');
        Route::get('institutionteacherrequest',[InstitutionLoginController::class,'institutionteacherrequest'])->name('institutionteacherrequest');
        Route::get('assigncoursetoteacher',[InstitutionLoginController::class,'assigncoursetoteacher'])->name('assigncoursetoteacher');

        Route::post('assigncoursetoteacherstore',[InstitutionLoginController::class,'assigncoursetoteacherstore'])->name('assigncoursetoteacherstore');
        Route::post('assigncoursetoteacherupdate/{id}',[InstitutionLoginController::class,'assigncoursetoteacherupdate'])->name('assigncoursetoteacherupdate');
        Route::get('courseteacherview/{id}',[InstitutionLoginController::class,'courseteacherview'])->name('courseteacherview');
        Route::get('statistics',[InstitutionLoginController::class,'statistics'])->name('statistics');

        //start Institution Company settings section//
    Route::get('/institutioncompany',[InstitutionLoginController::class,'institutioncompany'])->name('institutioncompany');
    Route::get('institutioncompanyview/{id}',[InstitutionLoginController::class,'institutioncompanyview'])->name('institutioncompanyview');
    Route::post('/institutioncompanyupdate/{id}',[InstitutionLoginController::class,'institutioncompanyupdate'])->name('institutioncompanyupdate');
    //end Institution Company settings section//

       //start Institution system settings section//
       Route::get('/institutionsystem',[InstitutionLoginController::class,'institutionsystem'])->name('institutionsystem');
       Route::get('institutionsystemview/{id}',[InstitutionLoginController::class,'institutionsystemview'])->name('institutionsystemview');
       Route::post('/institutionsystemupdate/{id}',[InstitutionLoginController::class,'institutionsystemupdate'])->name('institutionsystemupdate');
       //end Institution system settings section//


       //start banner section

Route::get('/institutionbannersetting',[InstitutionLoginController::class,'institutionbannersetting'])->name('institutionbannersetting');
Route::get('institutionbannersettingview/{id}',[InstitutionLoginController::class,'institutionbannersettingview'])->name('institutionbannersettingview');
Route::post('/institutionbannersettingdelete/{id}',[InstitutionLoginController::class,'institutionbannersettingdelete'])->name('institutionbannersettingdelete');
Route::post('/institutionbannersettingstore',[InstitutionLoginController::class,'institutionbannersettingstore'])->name('institutionbannersettingstore');
Route::post('/institutionbannersettingupdate/{id}',[InstitutionLoginController::class,'institutionbannersettingupdate'])->name('institutionbannersettingupdate');

     //start banner section

          //start category section//
          Route::get('/institutioncategory',[InstitutionLoginController::class,'institutioncategory'])->name('institutioncategory');
          Route::post('/institutionstatuscategory/{id}/{status}',[InstitutionLoginController::class,'institutionstatuscategory'])->name('institutionstatuscategory');
          Route::get('institutionviewcategory/{id}',[InstitutionLoginController::class,'institutionviewcategory'])->name('institutionviewcategory');
          Route::post('/institutioncategorydelete/{id}',  [InstitutionLoginController::class,'institutioncategorydelete'])->name('institutioncategorydelete');
          Route::post('/institutioncategorystore',[InstitutionLoginController::class,'institutioncategorystore'])->name('institutioncategorystore');
          Route::post('/institutioncategoryupdate/{id}',[InstitutionLoginController::class,'institutioncategoryupdate'])->name('institutioncategoryupdate');

          //end category section //
               ////start institution Faq section
     Route::get('/institutionfaq',[InstitutionLoginController::class,'institutionfaq'])->name('institutionfaq');
     Route::post('/institutionstatusfaq/{id}/{status}',[InstitutionLoginController::class,'institutionstatusfaq'])->name('institutionstatusfaq');
     Route::get('institutionviewfaq/{id}',[InstitutionLoginController::class,'institutionviewfaq'])->name('institutionviewfaq');
     Route::post('/institutionfaqdelete/{id}',[InstitutionLoginController::class,'institutionfaqdelete'])->name('institutionfaqdelete');
     Route::post('/institutionfaqstore',[InstitutionLoginController::class,'institutionfaqstore'])->name('institutionfaqstore');
     Route::post('/institutionfaqupdate/{id}',[InstitutionLoginController::class,'institutionfaqupdate'])->name('institutionfaqupdate');

     //end institution faq section
     //start institution subscription //
     Route::get('/showinstitutionsubscription',[InstitutionLoginController::class,'showinstitutionsubscription'])->name('showinstitutionsubscription');

       //start institution  subscription //

       Route::get('assigncourserequest',[InstitutionLoginController::class,'assigncourserequest'])->name('assigncourserequest');

     Route::post('teachersend',[InstitutionLoginController::class,'teachersend'])->name('teachersend');

        //start contact us management //
        Route::post('institutioncontactusstore',[InstitutionLoginController::class,'institutioncontactusstore'])->name('institutioncontactusstore');

        Route::get('/institutionenquiry',[InstitutionLoginController::class,'institutionenquiry'])->name('institutionenquiry');
        Route::post('/institutionenquirydelete/{id}',[InstitutionLoginController::class,'institutionenquirydelete'])->name('institutionenquirydelete');


        //end contect us manangement //
// institution end//

//admin section

Route::prefix('admin')->middleware([Admin::class])->group(function () {
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin');

//Category section
    Route::get('/category',[CategoryController::class,'Category'])->name('category');
    Route::post('/statuscategory/{id}/{status}',[CategoryController::class,'statuscategory'])->name('category.status');
    Route::get('viewcategory/{id}',[CategoryController::class,'categoryView'])->name('viewcategory');
    Route::post('/categorydelete/{id}',  [CategoryController::class,'destroy'])->name('categorydelete');
    Route::post('/categorystore',[CategoryController::class,'store'])->name('categorystore');
    Route::post('/categoryupdate/{id}',[CategoryController::class,'update'])->name('categoryupdate');


    //Company section
    Route::get('/company',[CompanySettingController::class,'Company'])->name('company');
    Route::get('viewcompany/{id}',[CompanySettingController::class,'companyView'])->name('viewcompany');
    Route::post('/companyupdate/{id}',[CompanySettingController::class,'update'])->name('companyupdate');

    //System section
    Route::get('/system',[SystemSettingController::class,'System'])->name('system');
    Route::get('viewsystem/{id}',[SystemSettingController::class,'systemView'])->name('viewsystem');
    Route::post('/systemupdate/{id}',[SystemSettingController::class,'update'])->name('systemupdate');


    Route::get('/institution_teacher_need_approval',[InstitutionTeacherController::class,'institution_teacher_need_approval'])->name('institution_teacher_need_approval');

    Route::get('/institution_teacher_approved',[InstitutionTeacherController::class,'institution_teacher_approved'])->name('institution_teacher_approved');

     Route::post('/approve_request/{id}',[InstitutionTeacherController::class,'approve_request'])->name('approve_request');
     Route::post('/reject_request/{id}',[InstitutionTeacherController::class,'reject_request'])->name('reject_request');

     Route::get('/order',[OrderController::class,'Order'])->name('order');
    Route::get('viewpayment/{id}',[OrderController::class,'adminpaymentView'])->name('viewpayment');

      Route::get('/institution_subscription_order',[OrderController::class,'institution_subscription_order'])->name('institution_subscription_order');
    Route::get('view_institution_subscription_payment/{id}',[OrderController::class,'admin_institution_subscription_paymentView'])->name('view_institution_subscription_payment');

    Route::get('viewpayment_institution_subcription/{id}',[OrderController::class,'adminpaymentView_institution_subcription'])->name('viewpayment_institution_subcription');

     //CMS section
    Route::get('/cms',[CmsController::class,'Cms'])->name('cms');
    Route::post('/statuscms/{id}/{status}',[CmsController::class,'statusCms'])->name('statuscms');
    Route::get('viewcms/{id}',[CmsController::class,'cmsView'])->name('viewcms');
    Route::post('/cmsdelete/{id}',[CmsController::class,'destroy'])->name('cmsdelete');
    Route::post('/cmsstore',[CmsController::class,'store'])->name('cmsstore');
    Route::post('/cmsupdate/{id}',[CmsController::class,'update'])->name('cmsupdate');

     //Faq section
       Route::get('/faq',[FaqController::class,'Faq'])->name('faq');
       Route::post('/statusfaq/{id}/{status}',[FaqController::class,'statusFaq'])->name('statusfaq');
       Route::get('viewfaq/{id}',[FaqController::class,'faqView'])->name('viewfaq');
       Route::post('/faqdelete/{id}',[FaqController::class,'destroy'])->name('faqdelete');
       Route::post('/faqstore',[FaqController::class,'store'])->name('faqstore');
       Route::post('/faqupdate/{id}',[FaqController::class,'update'])->name('faqupdate');

       //user section

       Route::get('/student',[UserDetailController::class,'student'])->name('student');
        Route::post('/statusstudent/{id}/{status}',[UserDetailController::class,'statusstudent'])->name('statusstudent');

       Route::get('/teacher',[UserDetailController::class,'teacher'])->name('teacher');
       Route::get('/institution',[UserDetailController::class,'institution'])->name('institution');
        Route::post('/studetupdate/{id}',[UserDetailController::class,'studetupdate'])->name('studetupdate');
         Route::post('/teacherupdate/{id}',[UserDetailController::class,'teacherupdate'])->name('teacherupdate');
         Route::post('/institutionupdate/{id}',[UserDetailController::class,'institutionupdate'])->name('institutionupdate');

           //course section

             Route::get('/course',[CourseController::class,'Course'])->name('course');
             Route::get('coursesubcriptionlist/{id}',[CourseController::class,'Admincoursesubcriptionlist'])->name('coursesubcriptionlist');

             Route::post('/statuscourse/{id}/{status}',[CourseController::class,'statuscourse'])->name('statuscourse');
             Route::post('/courseupdate/{id}',[CourseController::class,'update'])->name('courseupdate');
             Route::get('viewcourse/{id}',[CourseController::class,'courseview'])->name('viewcourse');

             //Institutionsubcriptionpackage section
    Route::get('/institutionsubcriptionpackage',[InstitutionSubcriptionPackageController::class,'Institutionsubcriptionpackage'])->name('institutionsubcriptionpackage');
    Route::post('/packagestore',[InstitutionSubcriptionPackageController::class,'store'])->name('packagestore');
    Route::get('viewpackage/{id}',[InstitutionSubcriptionPackageController::class,'packageView'])->name('viewpackage');
    Route::post('/packageupdate/{id}',[InstitutionSubcriptionPackageController::class,'update'])->name('packageupdate');

      //student section
      Route::get('/studentpayment',[UserDetailController::class,'studentpayment'])->name('studentpayment');

      Route::get('viewstudentpayment/{id}',[UserDetailController::class,'viewstudentpayment'])->name('viewstudentpayment');

      Route::post('/studentpaymentupdate/{id}',[UserDetailController::class,'studentpaymentupdate'])->name('studentpaymentupdate');

       //institution section


 Route::get('/admininstitution',[UserDetailController::class,'admininstitution'])->name('admininstitution');
 Route::post('/admininstitutionstatus/{id}/{status}',[UserDetailController::class,'admininstitutionstatus'])->name('admininstitutionstatus');


//admin approve and reject//

Route::get('/sendrequest',[InstitutionTeacherRequestController::class,'sendrequest'])->name('sendrequest');
Route::post('/approve/{id}',[InstitutionTeacherRequestController::class,'approve'])->name('admin.approve');
Route::post('/decline/{id}',[InstitutionTeacherRequestController::class,'decline'])->name('admin.decline');

//Enquiry section//
Route::get('/enquiry',[AdminController::class,'enquiry'])->name('enquiry');
Route::post('/enquirydelete/{id}',[AdminController::class,'enquirydelete'])->name('enquirydelete');
//enquiry section//

//Home section

Route::get('/adminhomesetting',[HomeSettingController::class,'adminhomesetting'])->name('adminhomesetting');
Route::get('adminhomesettingview/{id}',[HomeSettingController::class,'adminhomesettingview'])->name('adminhomesettingview');
Route::post('/adminhomesettingdelete/{id}',[HomeSettingController::class,'adminhomesettingdelete'])->name('adminhomesettingdelete');
Route::post('/adminhomesettingstore',[HomeSettingController::class,'adminhomesettingstore'])->name('adminhomesettingstore');
Route::post('/adminhomesettingupdate/{id}',[HomeSettingController::class,'adminhomesettingupdate'])->name('adminhomesettingupdate');

//TermsandCondition section
Route::get('/termsandcondition',[AdminController::class,'termsandcondition'])->name('termsandcondition');
Route::get('termsandconditionview/{id}',[AdminController::class,'termsandconditionview'])->name('termsandconditionview');
Route::post('/termsandconditionupdate/{id}',[AdminController::class,'termsandconditionupdate'])->name('termsandconditionupdate');

//privacypolicy section
Route::get('/privacypolicy',[AdminController::class,'privacypolicy'])->name('privacypolicy');
Route::get('privacypolicyview/{id}',[AdminController::class,'privacypolicyview'])->name('privacypolicyview');
Route::post('/privacypolicyupdate/{id}',[AdminController::class,'privacypolicyupdate'])->name('privacypolicyupdate');

//about section
Route::get('/aboutus',[AdminController::class,'aboutus'])->name('aboutus');
Route::get('aboutusview/{id}',[AdminController::class,'aboutusview'])->name('aboutusview');
Route::post('/aboutusupdate/{id}',[AdminController::class,'aboutusupdate'])->name('aboutusupdate');

//admin teacher approve and reject //


Route::get('/adminteacherstatus',[AdminController::class,'adminteacherstatus'])->name('adminteacherstatus');
Route::post('/teacherapprove/{id}',[AdminController::class,'teacherapprove'])->name('admin.teacherapprove');
Route::post('/teacherdecline/{id}',[AdminController::class,'teacherdecline'])->name('admin.teacherdecline');
//admin teacher approve and reject //

//form section //
Route::get('/adminform', [AdminController::class,'adminform'])->name('adminform');
Route::post('/adminaddnewform', [AdminController::class,'adminaddnewform'])->name('adminaddnewform');
Route::post('/adminfieldstore', [AdminController::class,'adminfieldstore'])->name('adminfieldstore');

Route::get('adminviewform/{id}',[AdminController::class,'adminviewform'])->name('adminviewform');
Route::post('/adminformdelete/{id}',[AdminController::class,'adminformdelete'])->name('adminformdelete');
Route::post('/adminformupdate/{id}',[AdminController::class,'adminformupdate'])->name('adminformupdate');
Route::post('/adminformfielddelete/{id}',[AdminController::class,'adminformfielddelete'])->name('adminformfielddelete');
//form section //

});
