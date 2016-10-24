<div class="row">
    <form method="POST" action="{{ url(getCurrentURL('controller').'/UsersList') }}" accept-charset="UTF-8" novalidate="novalidate">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <div class="form-group col-md-3">
            <label for="title" class="control-label">{{ trans('auth.name') }}:</label>
            <input class="form-control" name="userInfo[name]" type="text" id="title">
        </div>
        {{--<div class="form-group col-md-3">--}}
            {{--<label for="title" class="control-label">{{ trans('auth.family') }}:</label>--}}
            {{--<input class="form-control" name="search[title][string]" type="text" id="title">--}}
        {{--</div>--}}
        {{--<div class="form-group col-md-3">--}}
            {{--<label for="title" class="control-label">{{ trans('auth.mobile') }}:</label>--}}
            {{--<input class="form-control" name="search[title][string]" type="text" id="title">--}}
        {{--</div>--}}
        {{--<div class="form-group col-md-3">--}}
            {{--<label for="title" class="control-label">{{ trans('auth.email') }}:</label>--}}
            {{--<input class="form-control" name="search[title][string]" type="text" id="title">--}}
        {{--</div>--}}
        <div class="form-group col-md-12">
            <button class="searchBtn btn btn-default pull-left" type="submit">جستجو در لیست</button>
        </div>
    </form>
</div>