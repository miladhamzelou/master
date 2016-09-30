<form name="tree-from" method="post" action="{{ url(getCurrentURL('controller').'/CreateTree') }}" novalidate>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @if(@$item_selected)
        @foreach(@$item_selected as $item)
            <input type="hidden" name="item[]" value="{{ $item }}">
        @endforeach
    @endif
    <div class="form-group{{ $errors->has('frm.name') ? ' has-error' : '' }}">
        <label>{{ trans('public.name') }}:</label>
        <input name="frm[name]" type="text" class="form-control text-right" value="">
    </div>
    <div class="form-group">
        <button type="submit" onclick="Admin.updateTree(this,event)" class="btn btn-primary">{{ trans('tree.create new node') }}</button>
    </div>
</form>