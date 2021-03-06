@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/tools/jstree/dist/themes/proton/style.min.css') }}" />
@endsection
@section('javascript')
    @parent
    <script src="{{ asset('assets/tools/jstree/dist/jstree.min.js') }}"></script>
@endsection
@section('content')
    <div class="content">
        <div class="panel">
            <div class="panel-heading">
                <div class="pull-right">
                    <h4 class="panel-title">{{ trans('public.field collection') }}</h4>
                </div>
                <div class="pull-left">
                    <a href="{{ url(getCurrentURL('controller')).'/NewTree' }}"  class="btn-box-tool pull-left" onclick="Admin.newTree(this,event)"><i class="fa fa-plus-square"></i></a>
                    <a href="{{ url(getCurrentURL('controller').'/EditTree') }}"  class="btn-box-tool pull-left" onclick="Admin.treeEdit(this,event)"><i class="fa fa-pencil-square"></i></a>
                    <a href="{{ url(getCurrentURL('controller').'/DeleteTree') }}" class="btn-box-tool pull-left" onclick="Admin.treeRemove(this,event)"><i class="fa fa-trash"></i></a>
                    <a href="{{ url(getCurrentURL('controller').'/ListTree') }}" class="btn-box-tool pull-left" onclick="Admin.reload(event)"><i class="fa fa-refresh"></i></a>
                </div>
                <div class="row"></div>
            </div>
            <div class="panel-body">
                <div class="ajax-content">
                    @include('masterBundle.universityTree.admin.tree-ajax')
                </div>
                <img src="{{ asset('assets/admin/img/ajax-loader.gif') }}" class="ajax display-none"/>
                <div id="ajax-modal" class="display-none"></div>
            </div>
        </div>
    </div>
@endsection