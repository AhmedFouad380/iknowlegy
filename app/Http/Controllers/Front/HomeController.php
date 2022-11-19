<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Page;
use App\Models\PromoCode;
use App\Models\PromoCodeRelation;
use App\Models\Questions;
use App\Models\SubCategory;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Auth;
use Owenoj\LaravelGetId3\GetId3;

class HomeController extends Controller
{
    public function Category($slug){
        $Cat = SubCategory::where('slug',$slug)->firstOrFail();
        $courses = Course::where('sub_category_id',$Cat->id)->get();

        return view('front.Courses',compact('Cat','courses'));
    }


    public function SubCategory($slug){
        $Cat = Category::where('slug',$slug)->firstOrFail();
        $subCat =      SubCategory::where('category_id',$Cat->id)->get();

        return view('front.categories',compact('Cat','subCat'));
    }

    public function search(Request $request){
        $data = Course::where('is_active','active');
        if(isset($request->search)){
        $data->where('ar_title','like','%'.$request->search.'%')->
        Orwhere('en_title','like','%'.$request->search.'%');
        }
        if(isset($request->category_id) && $request->category_id != 0){
            $data->where('main_category_id',$request->category_id);
        }
        if(isset($request->subcategory_id) && $request->subcategory_id != 0){
            $data->where('sub_category_id',$request->subcategory_id);
        }
        if(isset($request->sort) && $request->sort != 0){
            if($request->sort == 'low_price'){
                $data->OrdarBy('price','asc');
            }
            if($request->sort == 'high_price'){
                $data->OrdarBy('price','desc');
            }

        }
        $courses = $data->paginate(10);

        return view('front.Search',compact('courses'));

    }
    public function Course($slug){
        $Course = Course::where('slug',$slug)->firstOrFail();

        return view('front.course-details',compact('Course'));
    }

    public function CourseLessons($id){
        $Lesson = Lesson::findOrFail($id);

        $Course = Course::where('id',$Lesson->course_id)->firstOrFail();
        $Lessons = Lesson::OrderBy('sort','asc')->where('course_id',$Course->id)->get();
        return view('front.lesson',compact('Course','Lessons','Lesson'));

    }


    public function addCart(Request $request){
        $request->validate([
            'id' => 'required|exists:courses,id',
        ]);
        if($count = Cart::where('user_id',Auth::guard('web')->id())->where('course_id',$request->id)->count() >0 ){

        }else{
            $data = new Cart();
            $data->user_id = Auth::guard('web')->id();
            $data->course_id=$request->id;
            $data->save();
        }

        $count = Cart::where('user_id',Auth::guard('web')->id())->where('course_id',$request->id)->count();
            return response($count);

    }
    public function RemoveCart(Request $request){
        $request->validate([
            'id' => 'required|exists:carts,id',
        ]);
        Cart::findOrFail($request->id)->delete();

        return response()->json(['message'=>'Success']);

    }

    public function cart(){
        $data = Cart::where('user_id',Auth::guard('web')->id())->get();
        return view('front.cart',compact('data'));
    }

    public function Page($slug){
        $data = Page::where('slug',$slug)->firstOrFail();
        return view('front.about',compact('data'));
    }

    public function activePromoCode(Request $request){
        if(PromoCode::where('code',$request->code)->count() > 0){
            $promo = PromoCode::where('code',$request->code)->first();
            if(PromoCodeRelation::where('promo_id',$promo->id)->where('user_id',Auth::guard('web')->id())->count() > 0){
                return back()->with('messageError',__('lang.promoIsUsed'));
            }

                if(\Carbon\Carbon::now()->format('Y-m-d') < $promo->end){
                $data = new PromoCodeRelation();
                $data->user_id=Auth::guard('web')->id();
                $data->promo_id=$promo->id;
                $data->save();
                return back()->with('messageSuccess','Success');

            }else{
                return back()->with('messageError',__('lang.promoEnded'));
            }
        }
        return back()->with('messageError',__('lang.invalidPromo'));

    }

    public function MyCourses(){
        $user = Auth::guard('web')->user();

        $Enrollments = Enrollment::where('user_id',$user->id)->get();

        return view('front.MyCourses',compact('Enrollments'));

    }

    public function faq(){

        return view('front.faq');
    }

    public function Careers(){

        return view('front.Careers');
    }
    public function internships(){

        return view('front.internships');
    }
    public function IDISCUSS(Request $request){

        $query = Questions::where('is_active','active')->OrderBy('id','desc');
        if($request->search){
            $query->where('title','like','%'.$request->search.'%');
        }
        $data = $query->paginate(10);

        return view('front.Discuss',compact('data'));
    }

    public function storeQuestion(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = new Questions();
        $data->title=$request->title;
        $data->description=$request->description;
        $data->user_id= Auth::guard('web')->id();
        $data->is_active='inactive';
        $data->save();

        return back()->with('messageSuccess',__('lang.QuestionPending'));

    }
    public function storeAnswer(Request $request){

        $request->validate([
            'description' => 'required',
            'question_id' => 'required|exists:questions,id',
        ]);

        $data = new Answer();
        $data->question_id=$request->question_id;
        $data->description=$request->description;
        $data->user_id= Auth::guard('web')->id();
        $data->is_active='active';
        $data->save();

        return back()->with('messageSuccess','Success');

    }
    public function QuestionDetails($id){

        $data = Questions::where('id',$id)->where('is_active','active')->firstOrFail();
        $Answers = Answer::where('question_id',$id)->paginate(10);
        return view('front.QuestionDetails',compact('data','Answers'));
    }

    public function addWishList(Request $request){

        if(Wishlist::where('user_id',Auth::guard('web')->id())->where('course_id',$request->id)->count() > 0){
            Wishlist::where('user_id',Auth::guard('web')->id())->where('course_id',$request->id)->delete();
        }else{
            if(Auth::guard('web')->check()){
            $data = new Wishlist();
            $data->user_id=Auth::guard('web')->id();
            $data->course_id=$request->id;
            $data->save();
             }
        }
        return response()->json(['message'=>'success']);
    }
}
