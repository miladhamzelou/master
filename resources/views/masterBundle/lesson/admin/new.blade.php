@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/tools/jstree/dist/themes/proton/style.min.css') }}" />
@endsection
@section('javascript')
    @parent
    <script src="{{ asset('assets/tools/jstree/dist/jstree.min.js') }}"></script>
@endsection
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('master.lesson administrator') }}</h4>
            </div>
            <div class="pull-left">
                <a href=""><span class="fa fa-search"></span></a>
                <a href=""><span class="fa fa-refresh"></span></a>
                <a href="{{ url(getCurrentURL('controller').'/NewLesson') }}"><span class="fa fa-plus-square"></span></a>
            </div>
            <div class="row"></div>
        </div>
        <div class="panel-body">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <div class="row">
                        <div class="col-md-12">
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        </div>
                    </div>
                @endif
            @endforeach
            <form name="tree-from" method="post" action="{{ url(getCurrentURL('controller').'/Store') }}" novalidate>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if(old('fieldTree'))
                    @foreach(old('fieldTree') as $item)
                        <input type="hidden" name="fieldTree[]" class="fieldTree" value="{{ $item }}">
                    @endforeach
                @endif
                <div class="form-group{{ $errors->has('frm.title') ? ' has-error' : '' }}">
                    <label>{{ trans('public.title') }}:</label>
                    <input name="frm[title]" type="text" class="form-control text-right" value="{{ old('frm.title') }}">
                </div>
                {!! $tree !!}
                <p class="has-error">@foreach ($errors->get('fieldTree') as $message) {{ $message }} @endforeach</p>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-left">{{ trans('master.create new lesson') }}</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('.tree-checkbox').on('changed.jstree', function (e, data) {
            $('.fieldTree').remove();
            var i, j;
            for(i = 0, j = data.selected.length; i < j; i++) {
                $('form').append('<input type="hidden" name="fieldTree['+i+']" class="fieldTree" value="'+$('.tree-checkbox').jstree(true).get_selected('text')[i].li_attr['data-id'] + '">');
            }
        });
        $(window).load(function() {
            $('.fieldTree').each(function(){
                $(".tree-checkbox").jstree('open_node', '#node_'+$(this).val(), function(e) {
                    console.log(e);
                    if(e.parents.length > 1){
                        $(".tree-checkbox").jstree('open_node', e.parent).jstree('select_node', e.id);
                    } else {
                        $(".tree-checkbox").jstree('select_node', e.id);
                    }
                });
            })
        });
    </script>
@endsection