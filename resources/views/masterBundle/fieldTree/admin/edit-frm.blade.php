<form name="tree-from" method="post" action="{{ url(getCurrentURL('controller').'/Update/'.$entity['id']) }}" novalidate>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group{{ $errors->has('frm.name') ? ' has-error' : '' }}">
        <label>{{ trans('public.name') }}:</label>
        <input name="frm[name]" type="text" class="form-control text-right" value="{{ $entity['name'] }}">
    </div>
    <div class="form-group">
        <button type="submit" onclick="Admin.updateTree(this,event)" class="btn btn-primary">{{ trans('tree.edit node') }}</button>
    </div>
</form>