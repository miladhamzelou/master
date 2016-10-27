<div class="row">
    <form method="POST" action="{{ url(getCurrentURL('controller').'/UsersList') }}" accept-charset="UTF-8" novalidate="novalidate">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <div class="form-group col-md-3">
            <label for="title" class="control-label">{{ trans('auth.name') }}:</label>
            <input class="form-control" name="search[name][string]" type="text" id="title">
        </div>
        <div class="form-group col-md-3">
            <label for="title" class="control-label">{{ trans('auth.family') }}:</label>
            <input class="form-control" name="search[family][string]" type="text" id="title">
        </div>
        <div class="form-group col-md-3">
            <label for="title" class="control-label">{{ trans('auth.mobile') }}:</label>
            <input class="form-control" name="search[mobile][string]" type="text" id="title">
        </div>
        <div class="form-group col-md-3">
            <label for="title" class="control-label">{{ trans('auth.email') }}:</label>
            <input class="form-control" name="search[email][string]" type="text" id="title">
        </div>
        <div class="form-group col-md-3">
            <label for="title" class="control-label">{{ trans('auth.role') }}:</label>
            <select name="search[roles][string]" class="form-control">
                <option value="">{{ trans('public.select') }}...</option>
                @foreach($roles as $role)
                    <option value="{{ $role['title'] }}">{{ trans('auth.'.$role['title']) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="title"  class="control-label">{{ trans('auth.gender') }}:</label>
            <select name="search[gender][string]" class="form-control">
                <option value="">{{ trans('public.select') }}...</option>
                <option value="male">{{ trans('auth.male') }}</option>
                <option value="famale">{{ trans('auth.famale') }}</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="title" class="control-label">{{ trans('public.status') }}:</label>
            <select name="search[is_active][integer]" class="form-control">
                <option value="">{{ trans('public.select') }}...</option>
                <option value="1">{{ trans('auth.active') }}</option>
                <option value="0">{{ trans('auth.deactive') }}</option>
            </select>
        </div>
        <div class="form-group col-md-12">
            <button class="searchBtn btn btn-default pull-left" type="submit">جستجو در لیست</button>
        </div>
    </form>
</div>