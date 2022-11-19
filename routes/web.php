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
    return view('front.index');
});


Route::get('logout',function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('login');
});
Route::post('Userlogin',[\App\Http\Controllers\Front\AuthController::class,'login'])->name('login');
Route::post('RegisterStudent',[\App\Http\Controllers\Front\AuthController::class,'RegisterStudent'])->name('RegisterStudent');
Route::post('RegisterInstructor',[\App\Http\Controllers\Front\AuthController::class,'RegisterInstructor'])->name('RegisterInstructor');

Route::get('Category/{slug}',[\App\Http\Controllers\Front\HomeController::class,'Category'])->name('Category');
Route::get('SubCategory/{slug}',[\App\Http\Controllers\Front\HomeController::class,'SubCategory'])->name('SubCategory');

Route::get('Course/{slug}',[\App\Http\Controllers\Front\HomeController::class,'Course'])->name('Course');
Route::get('Careers',[\App\Http\Controllers\Front\HomeController::class,'Careers'])->name('Careers');
Route::get('Search',[\App\Http\Controllers\Front\HomeController::class,'search'])->name('Search');
Route::get('internships',[\App\Http\Controllers\Front\HomeController::class,'internships'])->name('internships');
Route::get('IDISCUSS',[\App\Http\Controllers\Front\HomeController::class,'IDISCUSS'])->name('IDISCUSS');
Route::get('QuestionDetails/{id}',[\App\Http\Controllers\Front\HomeController::class,'QuestionDetails'])->name('QuestionDetails');

Route::get('Contact',function (){
  return view('front.contact');
})->name('contact');

Route::get('logoutUser',function (){
    if(Auth::guard('web')->check()){
        \Illuminate\Support\Facades\Auth::guard('web')->logout();
    }else if(Auth::guard('instructor')->check()) {
        \Illuminate\Support\Facades\Auth::guard('instructor')->logout();
    }else{
        \Illuminate\Support\Facades\Auth::guard('admin')->logout();
    }
    return redirect('/');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login',['App\Http\Controllers\Admin\AuthController','login']);
Route::post('/loginUser',[\App\Http\Controllers\Front\AuthController::class,'login']);
Route::post('/registerUser',[\App\Http\Controllers\Front\AuthController::class,'registerUser']);
Route::post('/registerInstructor',[\App\Http\Controllers\Front\CompanyController::class,'registerCompany']);

Route::get('Page/{slug}',[\App\Http\Controllers\Front\HomeController::class,'Page']);
Route::get('Faq',[\App\Http\Controllers\Front\HomeController::class,'faq']);
Route::get('lang/{lang}', function ($lang) {


    if (session()->has('lang')) {
        session()->forget('lang');
    }
    if ($lang == 'en') {
        session()->put('lang', 'en');
    } else {
        session()->put('lang', 'ar');
    }


    return back();
});

Route::middleware(['web'])->group(function () {

    Route::get('addCart', [\App\Http\Controllers\Front\HomeController::class, 'addCart']);
    Route::get('remove-cart', [\App\Http\Controllers\Front\HomeController::class, 'RemoveCart']);
    Route::get('cart', [\App\Http\Controllers\Front\HomeController::class, 'cart']);
    Route::get('MyCourses', [\App\Http\Controllers\Front\HomeController::class, 'MyCourses']);
    Route::get('addWishList', [\App\Http\Controllers\Front\HomeController::class, 'addWishList']);



    Route::post('active_promo_code',[\App\Http\Controllers\Front\HomeController::class,'activePromoCode']);
    Route::get('paymobtest',[\App\Http\Controllers\PayMobController::class,'index'])->name('paymobtest');
    Route::get('paymobInstractor',[\App\Http\Controllers\PayMobController::class,'paymobInstractor'])->name('paymobInstractor');

    Route::get('Course-Lessons/{id}',[\App\Http\Controllers\Front\HomeController::class,'CourseLessons']);
    Route::get('paymobtest2',[\App\Http\Controllers\PayMobController::class,'index2'])->name('paymobtest2');
    Route::get('offlinePayment',[\App\Http\Controllers\PayMobController::class,'offlinePayment'])->name('offlinePayment');
    Route::post('StorePayment',[\App\Http\Controllers\PayMobController::class,'index2'])->name('StorePayment');
    Route::get('getOrderStatus',[\App\Http\Controllers\PayMobController::class,'getOrderStatus'])->name('getOrderStatus');

    Route::post('store-Question',[\App\Http\Controllers\Front\HomeController::class,'storeQuestion']);
    Route::post('store-Answer',[\App\Http\Controllers\Front\HomeController::class,'storeAnswer']);
    Route::get('IDISCUSS',[\App\Http\Controllers\Front\HomeController::class,'IDISCUSS'])->name('IDISCUSS');
    Route::get('QuestionDetails/{id}',[\App\Http\Controllers\Front\HomeController::class,'QuestionDetails'])->name('QuestionDetails');

});
Route::middleware(['admin'])->group(function () {
    Route::get('/Dashboard', function () {
        return view('admin.dashboard');
    });

    //Students settings
    Route::get('Students', [\App\Http\Controllers\Admin\UsersController::class, 'index']);
    Route::get('client_datatable', [\App\Http\Controllers\Admin\UsersController::class, 'datatable'])->name('client.datatable.data');
    Route::get('delete-client', [\App\Http\Controllers\Admin\UsersController::class, 'destroy']);
    Route::get('get-branch/{id}', [\App\Http\Controllers\Admin\UsersController::class, 'getBranch']);
    Route::post('store-client', [\App\Http\Controllers\Admin\UsersController::class, 'store']);
    Route::get('client-edit/{id}', [\App\Http\Controllers\Admin\UsersController::class, 'edit']);
    Route::post('update-client', [\App\Http\Controllers\Admin\UsersController::class, 'update']);
    Route::get('/add-button-client', function () {
        return view('admin/Users/button');
    });

    //Instructor settings
    Route::get('Instructors', [\App\Http\Controllers\Admin\InstructorController::class, 'index']);
    Route::get('Instructor_datatable', [\App\Http\Controllers\Admin\InstructorController::class, 'datatable'])->name('Instructor.datatable.data');
    Route::get('delete-Instructor', [\App\Http\Controllers\Admin\InstructorController::class, 'destroy']);
    Route::post('store-Instructor', [\App\Http\Controllers\Admin\InstructorController::class, 'store']);
    Route::get('Instructor-edit/{id}', [\App\Http\Controllers\Admin\InstructorController::class, 'edit']);
    Route::post('update-Instructor', [\App\Http\Controllers\Admin\InstructorController::class, 'update']);
    Route::get('/add-button-Instructor', function () {
        return view('admin/Instructor/button');
    });


    //Pages settings
    Route::get('Pages', [\App\Http\Controllers\Admin\PagesController::class, 'index']);
    Route::get('Pages_datatable', [\App\Http\Controllers\Admin\PagesController::class, 'datatable'])->name('Pages.datatable.data');
    Route::get('delete-Pages', [\App\Http\Controllers\Admin\PagesController::class, 'destroy']);
    Route::post('store-Pages', [\App\Http\Controllers\Admin\PagesController::class, 'store']);
    Route::get('Pages-edit/{id}', [\App\Http\Controllers\Admin\PagesController::class, 'edit']);
    Route::post('update-Pages', [\App\Http\Controllers\Admin\PagesController::class, 'update']);
    Route::get('/add-button-Pages', function () {
        return view('admin/Pages/button');
    });

    //Pages settings
    Route::get('PromoCode', [\App\Http\Controllers\Admin\PromoCodeController::class, 'index']);
    Route::get('PromoCode_datatable', [\App\Http\Controllers\Admin\PromoCodeController::class, 'datatable'])->name('PromoCode.datatable.data');
    Route::get('delete-PromoCode', [\App\Http\Controllers\Admin\PromoCodeController::class, 'destroy']);
    Route::post('store-PromoCode', [\App\Http\Controllers\Admin\PromoCodeController::class, 'store']);
    Route::get('PromoCode-edit/{id}', [\App\Http\Controllers\Admin\PromoCodeController::class, 'edit']);
    Route::post('update-PromoCode', [\App\Http\Controllers\Admin\PromoCodeController::class, 'update']);
    Route::get('/add-button-PromoCode', function () {
        return view('admin/PromoCode/button');
    });

    //faqs settings
    Route::get('Faq_settings', [\App\Http\Controllers\Admin\FaqController::class, 'index']);
    Route::get('Faq_datatable', [\App\Http\Controllers\Admin\FaqController::class, 'datatable'])->name('Faq.datatable.data');
    Route::get('delete-Faq', [\App\Http\Controllers\Admin\FaqController::class, 'destroy']);
    Route::post('store-Faq', [\App\Http\Controllers\Admin\FaqController::class, 'store']);
    Route::get('Faq-edit/{id}', [\App\Http\Controllers\Admin\FaqController::class, 'edit']);
    Route::post('update-Faq', [\App\Http\Controllers\Admin\FaqController::class, 'update']);
    Route::get('/add-button-Faq', function () {
        return view('admin/Faq/button');
    });

    //Categories settings
    Route::get('Categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('Category_datatable', [\App\Http\Controllers\Admin\CategoryController::class, 'datatable'])->name('Category.datatable.data');
    Route::get('delete-Category', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    Route::post('store-Category', [\App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('Category-edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::post('update-Category', [\App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('/add-button-Category', function () {
        return view('admin/Category/button');
    });

    //SubCategories settings
    Route::get('SubCategories/{id}', [\App\Http\Controllers\Admin\SubCategoryController::class, 'index']);
    Route::get('SubCategory_datatable', [\App\Http\Controllers\Admin\SubCategoryController::class, 'datatable'])->name('SubCategory.datatable.data');
    Route::get('delete-SubCategory', [\App\Http\Controllers\Admin\SubCategoryController::class, 'destroy']);
    Route::post('store-SubCategory', [\App\Http\Controllers\Admin\SubCategoryController::class, 'store']);
    Route::get('SubCategory-edit/{id}', [\App\Http\Controllers\Admin\SubCategoryController::class, 'edit']);
    Route::post('update-SubCategory', [\App\Http\Controllers\Admin\SubCategoryController::class, 'update']);
    Route::get('/add-button-SubCategory/{id}', function ($id) {
        return view('admin/SubCategory/button',compact('id'));
    });


    Route::get('Setting', [\App\Http\Controllers\Admin\SettingController::class, 'index']);
    Route::post('Setting-update', [\App\Http\Controllers\Admin\SettingController::class, 'update']);

    //Courses settings
    Route::get('Packages', [\App\Http\Controllers\Admin\PackagesController::class, 'index']);
    Route::get('Packages_datatable', [\App\Http\Controllers\Admin\PackagesController::class, 'datatable'])->name('Packages.datatable.data');
    Route::get('delete-Packages', [\App\Http\Controllers\Admin\PackagesController::class, 'destroy']);
    Route::post('store-Packages', [\App\Http\Controllers\Admin\PackagesController::class, 'store']);
    Route::get('Packages-edit/{id}', [\App\Http\Controllers\Admin\PackagesController::class, 'edit']);
    Route::post('update-Packages', [\App\Http\Controllers\Admin\PackagesController::class, 'update']);
    Route::get('/add-button-Packages', function () {
        return view('admin/Packages/button');
    });


    //Courses settings
    Route::get('HowToUse/{id}', [\App\Http\Controllers\Admin\HowToUseController::class, 'index']);
    Route::get('HowToUse_datatable', [\App\Http\Controllers\Admin\HowToUseController::class, 'datatable'])->name('HowToUse.datatable.data');
    Route::get('delete-HowToUse', [\App\Http\Controllers\Admin\HowToUseController::class, 'destroy']);
    Route::post('store-HowToUse', [\App\Http\Controllers\Admin\HowToUseController::class, 'store']);
    Route::get('HowToUse-edit/{id}', [\App\Http\Controllers\Admin\HowToUseController::class, 'edit']);
    Route::post('update-HowToUse', [\App\Http\Controllers\Admin\HowToUseController::class, 'update']);
    Route::get('/add-button-HowToUse/{type}', function ($type) {
        return view('admin/HowToUse/button',compact('type'));
    });

});
Route::middleware(['instructor'])->group(function () {
    Route::get('/Dashboard', function () {
        return view('admin.dashboard');
    })->name('InstractorDashboard');;

    //Students settings
    Route::get('Students', [\App\Http\Controllers\Admin\UsersController::class, 'index']);
    Route::get('client_datatable', [\App\Http\Controllers\Admin\UsersController::class, 'datatable'])->name('client.datatable.data');

    Route::get('GetSubCategory/{id}', [\App\Http\Controllers\Admin\SubCategoryController::class, 'GetSubCategory']);


    //Courses settings
    Route::get('Courses', [\App\Http\Controllers\Admin\CourseController::class, 'index'])->name('InstractorCourses');
    Route::get('delete-Course', [\App\Http\Controllers\Admin\CourseController::class, 'destroy']);
    Route::post('store-Course', [\App\Http\Controllers\Admin\CourseController::class, 'store']);
    Route::get('Course-edit/{id}', [\App\Http\Controllers\Admin\CourseController::class, 'edit']);
    Route::post('update-Course', [\App\Http\Controllers\Admin\CourseController::class, 'update']);
    Route::get('/add-button-Course', function () {
        return view('admin/Course/button');
    });

    //Lessons settings
    Route::get('Lessons/{id}', [\App\Http\Controllers\Admin\LessonsController::class, 'index'])->name('Lessons');
    Route::get('delete-Lesson', [\App\Http\Controllers\Admin\LessonsController::class, 'destroy']);
    Route::post('store-Lesson', [\App\Http\Controllers\Admin\LessonsController::class, 'store']);
    Route::get('Lesson-edit/{id}', [\App\Http\Controllers\Admin\LessonsController::class, 'edit']);
    Route::post('update-Lesson', [\App\Http\Controllers\Admin\LessonsController::class, 'update']);
    Route::get('/add-button-Lesson/{id}', function ($id) {
        return view('admin/Lesson/button',compact('id'));
    });


    //CareersCategories settings
    Route::get('CareersCategories', [\App\Http\Controllers\Admin\CareersCategoriesController::class, 'index']);
    Route::get('CareersCategories_datatable', [\App\Http\Controllers\Admin\CareersCategoriesController::class, 'datatable'])->name('CareersCategories.datatable.data');
    Route::get('delete-CareersCategories', [\App\Http\Controllers\Admin\CareersCategoriesController::class, 'destroy']);
    Route::post('store-CareersCategories', [\App\Http\Controllers\Admin\CareersCategoriesController::class, 'store']);
    Route::get('CareersCategories-edit/{id}', [\App\Http\Controllers\Admin\CareersCategoriesController::class, 'edit']);
    Route::post('update-CareersCategories', [\App\Http\Controllers\Admin\CareersCategoriesController::class, 'update']);
    Route::get('/add-button-CareersCategories', function () {
        return view('admin/CareersCategory/button');
    });


    //CareersCities settings
    Route::get('CareersCities', [\App\Http\Controllers\Admin\CareersCitiesController::class, 'index']);
    Route::get('CareersCities_datatable', [\App\Http\Controllers\Admin\CareersCitiesController::class, 'datatable'])->name('CareersCities.datatable.data');
    Route::get('delete-CareersCities', [\App\Http\Controllers\Admin\CareersCitiesController::class, 'destroy']);
    Route::post('store-CareersCities', [\App\Http\Controllers\Admin\CareersCitiesController::class, 'store']);
    Route::get('CareersCities-edit/{id}', [\App\Http\Controllers\Admin\CareersCitiesController::class, 'edit']);
    Route::post('update-CareersCities', [\App\Http\Controllers\Admin\CareersCitiesController::class, 'update']);
    Route::get('/add-button-CareersCities', function () {
        return view('admin/CareersCity/button');
    });

    //Careers settings
    Route::get('Careers_setting', [\App\Http\Controllers\Admin\CareersController::class, 'index']);
    Route::get('Careers_database', [\App\Http\Controllers\Admin\CareersController::class, 'datatable'])->name('Careers.datatable.data');
    Route::get('delete-Careers', [\App\Http\Controllers\Admin\CareersController::class, 'destroy']);
    Route::post('store-Careers', [\App\Http\Controllers\Admin\CareersController::class, 'store']);
    Route::get('Careers-edit/{id}', [\App\Http\Controllers\Admin\CareersController::class, 'edit']);
    Route::post('update-Careers', [\App\Http\Controllers\Admin\CareersController::class, 'update']);
    Route::get('/add-button-Careers', function () {
        return view('admin/Careers/button');
    });

    //Internship settings
    Route::get('Internship_setting', [\App\Http\Controllers\Admin\InternshipController::class, 'index']);
    Route::get('Internship_database', [\App\Http\Controllers\Admin\InternshipController::class, 'datatable'])->name('Internship.datatable.data');
    Route::get('delete-Internship', [\App\Http\Controllers\Admin\InternshipController::class, 'destroy']);
    Route::post('store-Internship', [\App\Http\Controllers\Admin\InternshipController::class, 'store']);
    Route::get('Internship-edit/{id}', [\App\Http\Controllers\Admin\InternshipController::class, 'edit']);
    Route::post('update-Internship', [\App\Http\Controllers\Admin\InternshipController::class, 'update']);
    Route::get('/add-button-Internship', function () {
        return view('admin/Internship/button');
    });


    Route::get('Questions_setting', [\App\Http\Controllers\Admin\QuestionsController::class, 'index']);
    Route::get('Questions_database', [\App\Http\Controllers\Admin\QuestionsController::class, 'datatable'])->name('Questions.datatable.data');
    Route::get('delete-Questions', [\App\Http\Controllers\Admin\QuestionsController::class, 'destroy']);
    Route::post('store-Questions', [\App\Http\Controllers\Admin\QuestionsController::class, 'store']);
    Route::get('Questions-edit/{id}', [\App\Http\Controllers\Admin\QuestionsController::class, 'edit']);
    Route::post('update-Questions', [\App\Http\Controllers\Admin\QuestionsController::class, 'update']);
    Route::get('/add-button-Questions', function () {
        return view('admin/Questions/button');
    });

    Route::get('Questions-Answers/{id}', [\App\Http\Controllers\Admin\AnswersController::class, 'index']);
    Route::get('Answers_database', [\App\Http\Controllers\Admin\AnswersController::class, 'datatable'])->name('Answers.datatable.data');
    Route::get('delete-Answers', [\App\Http\Controllers\Admin\AnswersController::class, 'destroy']);
    Route::get('Answers-edit/{id}', [\App\Http\Controllers\Admin\AnswersController::class, 'edit']);
    Route::post('update-Answers', [\App\Http\Controllers\Admin\AnswersController::class, 'update']);
    Route::get('/add-button-Answers', function () {
        return view('admin/Answers/button');
    });

});

Route::get('Course_datatable', [\App\Http\Controllers\Admin\CourseController::class, 'datatable'])->name('Course.datatable.data');
Route::get('Lesson_datatable', [\App\Http\Controllers\Admin\LessonsController::class, 'datatable'])->name('Lesson.datatable.data');

Route::get('paymentInstractor','paymentInstractor@index')->name('paymentInstractor');
Route::get('paymentInstractor2','paymentInstractor@index2')->name('paymentInstractor2');
Route::get('GetSubCategory/{id}', [\App\Http\Controllers\Admin\SubCategoryController::class, 'GetSubCategory']);
Route::get('GetSubCategorySearch/{id}', [\App\Http\Controllers\Admin\SubCategoryController::class, 'GetSubCategorySearch']);
