@section('content')
    <div class="content">
        <div class="panel">
            <div class="panel-heading">
                <div class="pull-right">
                    <h4 class="panel-title">{{ trans('public.tree') }}</h4>
                </div>
                <div class="pull-left">
                    <a href=""><span class="fa fa-refresh"></span></a>
                    <a href=""><span class="fa fa-plus-square"></span> </a>
                </div>
                <div class="row"></div>
            </div>
            <div class="panel-body">
                {!! $tree !!}
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{ asset('assets/tools/jstree/dist/themes/proton/style.min.css') }}" />
    <script src="{{ asset('assets/tools/jstree/dist/jstree.min.js') }}"></script>
    <script>
        $('.tree').jstree({
            'core': {
                'themes': {
                    'name': 'proton',
                    'responsive': true
                }
            }
        });
        $('li[role=treeitem]').click(function(){
            alert($(this).attr('data-id'));
        });
    </script>
@endsection