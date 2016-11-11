<?php

namespace App\Http\Controllers\MasterBundle\Admin;

use App\Facades\FarsiFacade;
use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\MasterBundle\Model\ResumeArticles;
use App\Http\Controllers\MasterBundle\Model\ResumeAwards;
use App\Http\Controllers\MasterBundle\Model\ResumeBookCompilation;
use App\Http\Controllers\MasterBundle\Model\ResumeConferences;
use App\Http\Controllers\MasterBundle\Model\ResumeDissertationGuide;
use App\Http\Controllers\MasterBundle\Model\ResumeEducaion;
use App\Http\Controllers\MasterBundle\Model\Grade;
use App\Http\Controllers\MasterBundle\Model\ResumeEducationCourses;
use App\Http\Controllers\MasterBundle\Model\ResumeOperatingActivity;
use App\Http\Controllers\MasterBundle\Model\ResumePersonalInfo;
use App\Http\Controllers\MasterBundle\Model\ResumeResearchProjects;
use App\Http\Controllers\MasterBundle\Model\ResumeTranslatedBook;
use App\Http\Controllers\MasterBundle\Model\ScienceRanking;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Request;
use Validator;

class ResumeController extends Controller
{
    public function resume()
    {
        $this->layout->content = view('masterBundle.resume.admin.resume');
        $this->layout->content->science_ranking = ScienceRanking::all();
        $this->layout->content->personal_info = ResumePersonalInfo::first();
        $this->layout->content->articles = ResumeArticles::get();
        $this->layout->content->education = ResumeEducaion::get();
        $this->layout->content->grade = Grade::all();
        $this->layout->content->awards = ResumeAwards::get();
        $this->layout->content->conferences = ResumeConferences::get();
        $this->layout->content->book_compilation = ResumeBookCompilation::get();
        $this->layout->content->translated_book = ResumeTranslatedBook::get();
        $this->layout->content->dissertation_guide = ResumeDissertationGuide::get();
        $this->layout->content->operating_activity = ResumeOperatingActivity::get();
    }

    public function personalInfo()
    {
        $personal_info = ResumePersonalInfo::first();
        $this->layout->content = view('masterBundle.resume.admin.resume_personal_info');
        $this->layout->content->personal_info = $personal_info;
        $this->layout->content->science_ranking = ScienceRanking::all();
        $frm = Input::get('frm');
        if($frm) {
            $validator = Validator::make($frm['personal_info'], [
                'name' => 'required',
                'family' => 'required',
                'science_ranking_id' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            DB::table('resume_personal_info')->delete();
            ResumePersonalInfo::store($frm['personal_info']);
            return redirect()->back()->with(['alert-success' => trans('validate.done successfully')]);
        }
    }

    public function education()
    {
        $frm = Input::get('frm')['education'];
        if($frm) {
            DB::table('resume_education')->delete();
            foreach($frm as $item) {
                ResumeEducaion::store($item);
            }
            return redirect()->back()->with(['alert-success' => trans('validate.done successfully') ]);
        }
        if(Request::ajax()){
            $this->layout = view('masterBundle.resume.admin.resume_education_ajax');
            $this->layout->education = ResumeEducaion::get();
            $this->layout->grade = Grade::all();
            die($this->layout);
        }
        $this->layout->content = view('masterBundle.resume.admin.resume_education');
        $this->layout->content->education = ResumeEducaion::get();
        $this->layout->content->grade = Grade::all();
    }

    public function awards()
    {
        $frm = Input::get('frm')['awards'];
        if($frm) {
            DB::table('resume_awards')->delete();
            foreach($frm as $item) {
                ResumeAwards::store($item);
            }
            return redirect()->back()->with(['alert-success' => trans('validate.done successfully') ]);
        }
        if(Request::ajax()){
            $this->layout = view('masterBundle.resume.admin.resume_awards_ajax');
            $this->layout->awards = ResumeAwards::get();
            die($this->layout);
        }
        $this->layout->content = view('masterBundle.resume.admin.resume_awards');
        $this->layout->content->awards = ResumeAwards::get();
    }

    public function articles()
    {
        $frm = Input::get('frm')['articles'];
        if($frm) {
            DB::table('resume_articles')->delete();
            foreach($frm as $item) {
                ResumeArticles::store($item);
            }
            return redirect()->back()->with(['alert-success' => trans('validate.done successfully') ]);
        }
        if(Request::ajax()){
            $this->layout = view('masterBundle.resume.admin.resume_articles_ajax');
            $this->layout->articles = ResumeArticles::get();
            die($this->layout);
        }
        $this->layout->content = view('masterBundle.resume.admin.resume_articles');
        $this->layout->content->articles = ResumeArticles::get();
    }

    public function conferences()
    {
        $frm = Input::get('frm')['conferences'];
        if($frm) {
            DB::table('resume_conferences')->delete();
            foreach($frm as $item) {
                ResumeConferences::store($item);
            }
            return redirect()->back()->with(['alert-success' => trans('validate.done successfully') ]);
        }
        if(Request::ajax()){
            $this->layout = view('masterBundle.resume.admin.resume_conferences_ajax');
            $this->layout->conferences = ResumeConferences::get();
            die($this->layout);
        }
        $this->layout->content = view('masterBundle.resume.admin.resume_conferences');
        $this->layout->content->conferences = ResumeConferences::get();
    }

    public function bookCompilation()
    {
        $frm = Input::get('frm')['book_compilation'];
        if($frm) {
            DB::table('resume_book_compilation')->delete();
            foreach($frm as $item) {
                ResumeBookCompilation::store($item);
            }
            return redirect()->back()->with(['alert-success' => trans('validate.done successfully') ]);
        }
        if(Request::ajax()){
            $this->layout = view('masterBundle.resume.admin.resume_book_compilation_ajax');
            $this->layout->book_compilation = ResumeBookCompilation::get();
            die($this->layout);
        }
        $this->layout->content = view('masterBundle.resume.admin.resume_book_compilation');
        $this->layout->content->book_compilation = ResumeBookCompilation::get();
    }

    public function translatedBook()
    {
        $frm = Input::get('frm')['translated_book'];
        if($frm) {
            DB::table('resume_translated_book')->delete();
            foreach($frm as $item) {
                ResumeTranslatedBook::store($item);
            }
            return redirect()->back()->with(['alert-success' => trans('validate.done successfully') ]);
        }
        if(Request::ajax()){
            $this->layout = view('masterBundle.resume.admin.resume_translated_book_ajax');
            $this->layout->translated_book = ResumeTranslatedBook::get();
            die($this->layout);
        }
        $this->layout->content = view('masterBundle.resume.admin.resume_translated_book');
        $this->layout->content->translated_book = ResumeTranslatedBook::get();
    }

    public function dissertationGuide()
    {
        $frm = Input::get('frm')['dg'];
        if($frm) {
            DB::table('resume_dissertation_guide')->delete();
            foreach($frm as $item) {
                ResumeDissertationGuide::store($item);
            }
            return redirect()->back()->with(['alert-success' => trans('validate.done successfully') ]);
        }
        if(Request::ajax()){
            $this->layout = view('masterBundle.resume.admin.resume_dissertation_guide_ajax');
            $this->layout->dissertation_guide = ResumeDissertationGuide::get();
            die($this->layout);
        }
        $this->layout->content = view('masterBundle.resume.admin.resume_dissertation_guide');
        $this->layout->content->dissertation_guide = ResumeDissertationGuide::get();
    }

    public function operatingActivity()
    {
        $frm = Input::get('frm')['operation_activity'];
        if($frm) {
            DB::table('resume_operating_activity')->delete();
            foreach($frm as $item) {
                $item['from_date'] = FarsiFacade::j2gDate($item['from_date']);
                $item['to_date'] = FarsiFacade::j2gDate($item['to_date']);
                ResumeOperatingActivity::store($item);
            }
            return redirect()->back()->with(['alert-success' => trans('validate.done successfully') ]);
        }
        if(Request::ajax()){
            $this->layout = view('masterBundle.resume.admin.resume_operation_activity_ajax');
            $this->layout->operating_activity = ResumeOperatingActivity::get();
            die($this->layout);
        }
        $this->layout->content = view('masterBundle.resume.admin.resume_operating_activity');
        $this->layout->content->operating_activity = ResumeOperatingActivity::get();
    }

    public function deleteAll($table=null)
    {
        if(!$table) {
            DB::table('resume_personal_info')->delete();
            DB::table('resume_articles')->delete();
            DB::table('resume_conferences')->delete();
            DB::table('resume_book_compilation')->delete();
            DB::table('resume_translated_book')->delete();
            DB::table('resume_operating_activity')->delete();
            DB::table('resume_education')->delete();
            DB::table('resume_dissertation_guide')->delete();
        } else
            DB::table('resume_'.$table)->delete();
        return redirect()->back()->with(['alert-success' => trans('validate.done successfully')]);
    }
}
