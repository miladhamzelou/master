<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Auth\Model\UserCollection;
use App\Http\Controllers\Auth\Model\UserExtra;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralBundle\Model\City;
use App\Http\Controllers\GeneralBundle\Model\Neighbourhood;
use App\Http\Controllers\GeneralBundle\Model\Province;
use App\Http\Controllers\GeneralBundle\Model\Region;
use App\Http\Controllers\GeneralBundle\Model\Tag;
use App\Http\Controllers\RestaurantBundle\Model\Category;
use App\Http\Controllers\RestaurantBundle\Model\CityCollection;
use App\Http\Controllers\RestaurantBundle\Model\CityCollectionTag;
use App\Http\Controllers\RestaurantBundle\Model\Collection;
use App\Http\Controllers\RestaurantBundle\Model\Restaurant;
use App\Http\Controllers\RestaurantBundle\Model\RestaurantFilter;
use App\Http\Controllers\RestaurantBundle\Model\RestaurantGallery;
use App\Http\Controllers\RestaurantBundle\Model\RestaurantMenu;
use App\Http\Controllers\RestaurantBundle\Model\RestaurantTag;
use App\Http\Controllers\RestaurantBundle\Model\RestaurantType;
use App\Http\Controllers\ReviewBundle\Model\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;

class HomeController extends Controller
{
    public function index()
    {
//        for($i = 1 ; $i<= 22 ;$i++)
//        {
//            $id = Region::store(['city_id' => 118,'name' => 'منطقه '.$i]);
//            for($j= 1;$j<=8;$j++)
//                Neighbourhood::store(['region_id'=> $id,'name' => 'محله '.$j]);
//
//        }
        return redirect('/تهران');
        $this->layout->content = view('home.index');
        $this->layout->content->province = Province::orderBy('id','ASC')->get();
    }

    public function cityPage($title)
    {
        $city = City::with(['region' => function($q) {
            $q->orderBy('id','ASC');
        }])->where('name', str_replace('-',' ',$title))->first();
        $r_c = Restaurant::where('city_id',$city['id'])->get();
        foreach($r_c as $res) {
            $restaurant[] = ['<b>'.$res['title'].'</b><br><a style="color:red" href="/restaurant/'.$res['id'].'">برای مشاهده رستوران کلیک کنید.</a>',doubleval($res['lat']),doubleval($res['lng'])];
        }
        $this->layout->content = view('home.city');
        $this->layout->content->restaurant = @$restaurant ? json_encode($restaurant) : '';
        $this->layout->content->city = $city;
        $this->layout->content->types = Category::where('level',0)->get();
        $this->layout->content->collection =RestaurantFilter::orderBy('id','DESC')->limit(5)->get();
    }

    public function cityCollection($title,$media='HandPick')
    {
        $city = City::where('name', str_replace('-',' ',$title))->first();
        $this->layout->content = view('home.cityCollection');
        $this->layout->content->tpl = 'showCollections';
        switch($media) {
            case 'HandPick':
                $this->layout->content->tab = 'cityCollectionHandPick';
                $this->layout->content->collection = Collection::with(['place' => function($q) use($city){
                    $q->where('city_id',$city['id']);
                }])->where('approve',1)->get();
                break;
            case 'Suggest':
                $this->layout->content->tab = 'cityCollectionSuggest';
                $this->layout->content->tpl = 'cityCollectionSuggest';
                $this->layout->content->restaurantFilter = RestaurantFilter::orderBy('id','ASC')->get();
                break;
            case 'SaveCollection':
                $this->layout->content->tab = 'cityCollectionSaveCollection';
                $this->layout->content->collection = DB::table('collection')
                    ->leftJoin('user_collection','collection.id','=','user_collection.collection_id')
                    ->leftJoin('city_collection','city_collection.collection_id','=','collection.id')
                    ->where('user_collection.user_id',Auth::id())
                    ->where('collection.approve',1)
                    ->where('city_collection.city_id',$city['id'])
                    ->get();
                break;
            case 'MyCollection':
                $this->layout->content->tab = 'cityCollectionMyCollection';
                $this->layout->content->collection = Collection::with(['place' => function($q) use($city){
                    $q->where('city_id',$city['id']);
                }])->where('approve',1)->where('user_id',Auth::id())->get();
                break;
        }
        $this->layout->content->tag = Tag::all() ;
        $this->layout->content->city = $city;
    }

    public function cityCollectionItem($city_id,$collection_id)
    {
        $this->layout->content = view('home.cityCollectionItem');
        $this->layout->content->collection = Collection::with(['tag' => function($q){
            $q->with(['restaurant' => function($f){
                $f->groupBy('restaurant.id');
            }]);
        }])->find($collection_id);
        $this->layout->content->city = City::find($city_id);
        $check = UserCollection::where('collection_id',$collection_id)->where('user_id',Auth::id())->first();
        $this->layout->content->check = $check;
        if(count($check) > 0)
            $this->layout->content->collectionStatus = true;
    }

    public function cityRestaurantFilterItems($city,$item)
    {

        $this->layout->content = view('home.cityRestaurantFilterItems');
        $this->layout->content->collection = RestaurantFilter::find($item);
        $city = $this->layout->content->city = City::where('name', str_replace('-',' ',$city))->first();
        switch($item) {
            case '1':
                $list = Restaurant::whereBetween('created_at',[date("Y-m-d", strtotime("-1 week")), date('Y-m-d')])->orderBy('rate','DESC')->limit(30)->get();
                break;
            case '2':
                $list = Restaurant::whereBetween('created_at',[date("Y-m-d", strtotime("-1 month")), date('Y-m-d')])->orderBy('rate','DESC')->limit(30)->get();
                break;
            case '3':
                $list = Restaurant::orderBy('id','DESC')->limit(30)->get();
                break;
            case '4':
                $list = DB::table('restaurant')
                    ->select('*',DB::raw('count(restaurant_id) as count'))
                    ->leftJoin('restaurant_menu','restaurant.id','=','restaurant_menu.restaurant_id')
                    ->groupBy('restaurant_id')
                    ->having('count','>',3)
                    ->get()
                ;
                break;
            case '5':
                $list = Restaurant::orderBy('viewer','DESC')->limit(30)->get();
                break;
            case '5':
                $list = Restaurant::orderBy('viewer','ASC')->limit(30)->get();
                break;
            case '7':
                $list = Restaurant::orderBy('rate','DESC')->limit(30)->get();
                break;
            case '8':
                $list = Restaurant::orderBy('rate','ASC')->limit(30)->get();
                break;
            case '9':
                $list = Restaurant::whereBetween('updated_at',[date("Y-m-d", strtotime("-1 week")), date('Y-m-d')])->orderBy('rate','DESC')->limit(30)->get();
                break;
            case '10':
                $list = Restaurant::whereBetween('updated_at',[date("Y-m-d", strtotime("-1 month")), date('Y-m-d')])->orderBy('rate','DESC')->limit(30)->get();
                break;


        }
        $this->layout->content->list = $list;

    }

    public function createCollection(Request $request)
    {
        $city = City::find(Input::get('city_id'));
        $title = Input::get('title');
        $desc = Input::get('desc');
        $tag = Input::get('tags');
        $city_id = Input::get('city_id');
        $image = Input::get('image');
        if($request->all()){
            $validator = Validator::make($request->all(), [
                'title' => 'min:10|required',
                'desc' => 'min:10|required',
                'tags' => 'required',
                'image' => 'mimes:jpeg,jpg',
            ],[
                'tags.required' => 'این فیلد الزامی است.',
                'title.min' => 'نامعتبر',
                'title.required' => 'ابن فیلد الزامی است.',
                'desc.min' => 'بیشتر تایپ کنید.',
                'desc.required' => 'ابن فیلد الزامی است.',
                'image.mimes' => 'فرمت عکس نامعتبر است.'
            ]);
            if ($validator->fails()) {
                return redirect('collections/'.$city['name'])
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $collection_id = Collection::store(['title' => $title,'desc' => $desc,'user_id' => Auth::id()]);
                if($request->file('image')) {
                    $imageName = $collection_id.'_'.time().'.'.$request->file('image')->getClientOriginalExtension();
                    $request->file('image')->move(
                        base_path() . '/public/images/collection/', $imageName);
                    Collection::store(['img' => $imageName],$collection_id);
                }
                $city_collection_id = CityCollection::store(['collection_id' => $collection_id,'city_id' => $city_id]);
                foreach($tag as $t) {
                    CityCollectionTag::store(['tag_id' => $t,'city_collection_id' => $city_collection_id]);
                }
                return redirect('collections/'.str_replace(' ','-',City::where('id',$city_id)->value('name')))->with('alert-danger', 'کالکشن شما ثبت و پس از تایید نمایش داده خواهد شد.');

            }
        }
    }

    public function createReview(Request $request){
        $rate = Input::get('rate');
        $content = Input::get('content');
        $res_id = Input::get('res_id');
        if($request->all()){
            $validator = Validator::make($request->all(), [
                'content' => 'min:140|required',

            ],[
                'content.required' => 'این فیلد الزامی است.',
                'content.min' => 'تعداد کاراکتر کافی نیست.',
            ]);
            if ($validator->fails()) {
                return redirect('/restaurant/'.$res_id.'/review')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $review_id = Review::store(['user_id' => Auth::id(),'content' => $content,'rate' => $rate,'restaurant_id' => $res_id]);
                if($request->file('image')) {
                    foreach($request->file('image') as $img){
                        $imageName = 'review_'.$review_id.'_'.mt_rand().'.'.$img->getClientOriginalExtension();
                        $img->move(
                            base_path() . '/public/images/restaurant/'.$res_id.'/', $imageName);
                        RestaurantGallery::store(['restaurant_id' => $res_id,'user_id' => Auth::id(),'review_id' => $review_id,'file' => $imageName]);
                    }
                }
                return redirect('/restaurant/'.$res_id)->with(['alert-success' => 'نقد شما ثبت و پس از تاییدنمایش داده خواهد شد.']);
            }
        }
    }

    public function uploadPhotoMenu(Request $request)
    {
        $res_id = Input::get('res_id');
        if($request->all()){
            $validator = Validator::make($request->all(), [
                'image' => 'required',

            ],[
                'image.required' => 'الزامی است.'
            ]);
            if ($validator->fails()) {
                return redirect('/restaurant/'.$res_id.'/menu')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $id = RestaurantMenu::store(['restaurant_id' => $res_id,'user_id' => Auth::id()]);
                foreach($request->file('image') as $img){
                    $imageName = 'menu_'.$id.'_'.mt_rand().'.'.$img->getClientOriginalExtension();
                    $img->move(
                        base_path() . '/public/images/restaurant/'.$res_id.'/', $imageName);
                    RestaurantGallery::store(['restaurant_id' => $res_id,'user_id' => Auth::id(),'menu_id' => $id,'file' => $imageName]);
                }
                return redirect('/restaurant/'.$res_id.'/menu')->with(['alert-success' => 'ثبت شد و پس از تایید نمایش داده میشود']);
            }

        }
    }
}
