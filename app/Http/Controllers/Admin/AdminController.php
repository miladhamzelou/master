<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\GeneralBundle\Model\Calendar;
use App\Http\Controllers\GeneralBundle\Model\FieldTrendCategory;
use App\Services\Farsi;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   public function index()
   {
//       $parent = new FieldTrendCategory([
//           'name' => 'دانشگاه ملی ملایر'
//       ]);
//       $parent->makeRoot()->save();
//       $college = [
//           ['name' => 'دانشکده فنی مهندسی'],
//           ['name' => 'دانشکده عمران معماری'],
//           ['name' => 'دانشکده منابع طبیعی'],
//           ['name' => 'دانشکده علوم انسانی'],
//           ['name' => 'دانشکده علوم پایه'],
//           ['name' => 'ساختمان IT'],
//           ['name' => 'گلخانه'],
//           ['name' => 'سالن ورزشی'],
//       ];
//       foreach($college as $c) {
//           $node = new FieldTrendCategory([
//               'name' => $c['name']
//           ]);
//           $parent->appendNode($node);
//       }
//       $node = new FieldTrendCategory([
//               'name' => 'کارگاه کامپیوتر'
//           ]);
//           $node->appendToNode(FieldTrendCategory::find(3))->save();

       $this->layout->content = view('admin.index');
   }
}
