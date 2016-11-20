<aside id="sidebar">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel">
            <div class="panel-heading" role="tab" id="headingZiro">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseZiro" aria-expanded="true" aria-controls="collapseZiro">
                        {{ trans('master.basic definitions') }}
                    </a>
                    <span class="fa fa-angle-right pull-left"></span>
                </h4>
            </div>
            <div id="collapseZiro" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingZiro">
                <div class="list-group">
                    <a href="{{ getCurrentURL('prefix').'/MasterBundle/FieldTree/TreeList' }}" class="list-group-item">{{ trans('master.field and trend') }}</a>
                    <a href="{{ getCurrentURL('prefix').'/MasterBundle/UniversityTree/TreeList' }}" class="list-group-item">{{ trans('master.university and educational centers') }}</a>
                    <a href="{{ getCurrentURL('prefix').'/MasterBundle/Lesson/LessonList' }}" class="list-group-item">{{ trans('master.teaching courses') }}</a>
                    <a href="{{ getCurrentURL('prefix').'/MasterBundle/Term/TermList' }}" class="list-group-item">{{ trans('master.training course') }}</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('master.master bundle') }}
                    </a>
                    <span class="fa fa-angle-right pull-left"></span>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="list-group">
                        <a href="{{ getCurrentURL('prefix').'/MasterBundle/MasterClass/ClassList' }}" class="list-group-item">{{ trans('master.class') }}</a>
                        <a href="{{ getCurrentURL('prefix').'/MasterBundle/Lesson/LessonList' }}" class="list-group-item">ارزیابی استاد</a>
                    </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading" role="tab" id="headingSix">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                        {{ trans('master.master resume') }}
                    </a>
                    <span class="fa fa-angle-right pull-left"></span>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                <div class="list-group">
                    <a href="{{ getCurrentURL('prefix').'/MasterBundle/Resume/Resume' }}" class="list-group-item">{{ trans('master.master resume full option') }}</a>
                    <a href="{{ getCurrentURL('prefix').'/MasterBundle/Resume/PersonalInfo' }}" class="list-group-item">{{ trans('master.personal info') }}</a>
                    <a href="{{ getCurrentURL('prefix').'/MasterBundle/Resume/Education' }}" class="list-group-item">{{ trans('master.master education') }}</a>
                    <a href="{{ getCurrentURL('prefix').'/MasterBundle/Resume/Awards' }}" class="list-group-item">{{ trans('master.awards and honors') }}</a>
                    <a href="{{ getCurrentURL('prefix').'/MasterBundle/Resume/Conferences' }}" class="list-group-item">{{ trans('master.conferences') }}</a>
                    <a href="{{ getCurrentURL('prefix').'/MasterBundle/Resume/Articles' }}" class="list-group-item">{{ trans('master.articles') }}</a>
                    <a href="{{ getCurrentURL('prefix').'/MasterBundle/Resume/BookCompilation' }}" class="list-group-item">{{ trans('master.books compilation') }}</a>
                    <a href="{{ getCurrentURL('prefix').'/MasterBundle/Resume/TranslatedBook' }}" class="list-group-item">{{ trans('master.translated books') }}</a>
                    <a href="{{ getCurrentURL('prefix').'/MasterBundle/Resume/DissertationGuide' }}" class="list-group-item">{{ trans('master.dissertation guide') }}</a>
                    <a href="{{ getCurrentURL('prefix').'/MasterBundle/Resume/OperatingActivity' }}" class="list-group-item">{{ trans('master.operating activity') }}</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading" role="tab" id="headingeight">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseeight" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('public.messenger') }}
                    </a>
                    <span class="fa fa-angle-right pull-left"></span>
                </h4>
            </div>
            <div id="collapseeight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingeight">
                <div class="list-group">
                    <a href="{{ url(getCurrentURL('prefix').'/MailBundle/Mail/MailList') }}" class="list-group-item">{{ trans('mail.send mail') }}</a>
                    <a href="{{ url(getCurrentURL('prefix').'/SMSPanelBundle/SMSPanel/SMSList') }}" class="list-group-item">{{ trans('sms.send sms') }}</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('auth.users') }}
                    </a>
                    <span class="fa fa-angle-right pull-left"></span>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="list-group">
                    <a href="{{ url(getCurrentURL('prefix').'/Auth/User/UsersList') }}" class="list-group-item">{{ trans('auth.users list') }}</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading" role="tab" id="headingTree">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTree" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('auth.user setting') }}
                    </a>
                    <span class="fa fa-angle-right pull-left"></span>
                </h4>
            </div>
            <div id="collapseTree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTree">
                <div class="list-group">
                    <a href="{{ url(getCurrentURL('prefix').'/GeneralBundle/Public/EditProfile') }}" class="list-group-item">{{ trans('auth.change profile') }}</a>
                    <a href="{{ url(getCurrentURL('prefix').'/GeneralBundle/Public/ChangePassword') }}" class="list-group-item">{{ trans('auth.change password') }}</a>
                    <a href="{{ url(getCurrentURL('prefix').'/GeneralBundle/Public/ChangeSetting') }}" class="list-group-item">{{ trans('public.site setting') }}</a>
                    <a href="{{ url(getCurrentURL('localization').'/Auth/logout') }}" class="list-group-item">{{ trans('auth.logout') }}</a>
                </div>
            </div>
        </div>

        {{--<div class="panel">--}}
            {{--<div class="panel-heading" role="tab" id="headingTwo">--}}
                {{--<h4 class="panel-title">--}}
                    {{--<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">--}}
                        {{--پیام رسان--}}
                    {{--</a>--}}
                    {{--<span class="fa fa-angle-right pull-left"></span>--}}
                {{--</h4>--}}
            {{--</div>--}}
            {{--<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">--}}
                {{--<div class="list-group">--}}
                    {{--<a href="{{ url(getCurrentURL('prefix').'/Auth/User/UsersList') }}" class="list-group-item">{{ trans('auth.users list') }}</a>--}}
                    {{--<a href="{{ url(getCurrentURL('prefix').'/Auth/User/UsersList') }}" class="list-group-item">{{ trans('master.student list') }}</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<div class="panel">--}}
            {{--<div class="panel-heading" role="tab" id="headingTree">--}}
                {{--<h4 class="panel-title">--}}
                    {{--<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTree" aria-expanded="true" aria-controls="collapseOne">--}}
                        {{--تنظیمات سایت--}}
                    {{--</a>--}}
                    {{--<span class="fa fa-angle-right pull-left"></span>--}}
                {{--</h4>--}}
            {{--</div>--}}
            {{--<div id="collapseTree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTree">--}}
                {{--<div class="list-group">--}}
                    {{--<a href="{{ url(getCurrentURL('prefix').'/Auth/ChangeProfile') }}" class="list-group-item">{{ trans('auth.change profile') }}</a>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</aside>