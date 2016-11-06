@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('master.education') }}</h4>
            </div>
            <div class="row"></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <form action="{{ url(getCurrentURL('controller').'/Education') }}" novalidate="novalidate" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>{{ trans('master.grade') }}</th>
                                    <th>{{ trans('master.field and trend') }}</th>
                                    <th>{{ trans('master.university') }}</th>
                                    <th width="10%">سال اخذ</th>
                                    <th>{{ trans('public.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $var=1; @endphp
                                <tr>
                                    <td>
                                        <select class="form-control" name="frm[education_{!! $var !!}][grade_id]">
                                            <option value="">{{ trans('public.select') }}...</option>
                                            @foreach($grade as $grade)
                                                <option value="{{ $grade['id'] }}">{{ $grade['title'] }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input required type="text" class="form-control" name="frm[education_{!! $var !!}][field_trend]">
                                    </td>
                                    <td>
                                        <input required title="" type="text" class="form-control" name="frm[education_{!! $var !!}][university]">
                                    </td>
                                    <td>
                                        <input required title="" type="text" class="form-control" name="frm[education_{!! $var !!}][year]" placeholder="1395">
                                    </td>
                                    <td>
                                        <a class=""><span class="fa fa-plus-square"></span></a>
                                    </td>
                                </tr>
                                @php $var++; @endphp
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary pull-left">{{ trans('public.send request') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(window).load(function() {
            $('form').validate({
            });
        });
    </script>
@endsection