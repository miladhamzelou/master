@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('myclass.create new class') }}
                <span class="fa fa-chevron-left pull-left"></span>
            </h3>
        </div>
        <div class="panel-body">
            <form method="post" action="{{ getCurrentURL('controller').'/Store' }}">
                <input type="hidden" value="{{ csrf_token() }}">
                <div class="form-group{{ $errors->has('frm.myclass.title') ? ' has-error' : '' }}">
                    <label>{{ trans('myclass.class name') }}:</label>
                    <input type="text" name="frm[myclass][title]" class="form-control" value="{{ old('frm.myclass.title') }}">
                </div>
                <div class="form-group{{ $errors->has('frm.myclass.term_id') ? ' has-error' : '' }}">
                    <label>{{ trans('myclass.term') }}:</label>
                    <select type="text" name="frm[myclass][term_id]" class="form-control">
                        <option value="">{{ trans('public.select') }}...</option>
                        @if(@$term)
                            @foreach(@$term as $term)
                                <option value="{{ $term['id'] }}">{{ $term['title'] }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                {{--<a id="add_row" class="fa fa-plus-square pull-left"></a>--}}
                {{--<a id='delete_row' class="pull-left fa fa-trash"></a>--}}
                            {{--<table class="table table-bordered table-hover" id="tab_logic">--}}
                                {{--<thead>--}}
                                {{--<tr >--}}
                                    {{--<th class="text-center">--}}
                                        {{--#--}}
                                    {{--</th>--}}
                                    {{--<th class="text-center">--}}
                                        {{--Name--}}
                                    {{--</th>--}}
                                    {{--<th class="text-center">--}}
                                        {{--Mail--}}
                                    {{--</th>--}}
                                    {{--<th class="text-center">--}}
                                        {{--Mobile--}}
                                    {{--</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--<tr id='addr0'>--}}
                                    {{--<td>--}}
                                        {{--1--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<input type="text" name='name0'  placeholder='Name' class="form-control"/>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<input type="text" name='mail0' placeholder='Mail' class="form-control"/>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<input type="text" name='mobile0' placeholder='Mobile' class="form-control"/>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr id='addr1'></tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}



                <button type="submit" class="btn btn-default pull-left">{{ trans('myclass.create class') }}</button>
            </form>
        </div>
    </div>
@endsection