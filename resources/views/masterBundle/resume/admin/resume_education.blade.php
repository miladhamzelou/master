@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('master.master education') }}</h4>
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
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th width="19%">{{ trans('master.grade') }}</th>
                                    <th>{{ trans('master.field and trend') }}</th>
                                    <th width="20%">{{ trans('master.university') }}</th>
                                    <th width="11%">{{ trans('master.year of graduation') }}</th>
                                    <th>{{ trans('public.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $var=1; @endphp
                                @foreach($education as $key=>$edu)
                                <tr>
                                    <td>
                                        <select required title="{{ trans('validate.please fill in this field') }}" class="form-control" name="frm[education_{!! $var !!}][grade_id]">
                                            <option value="">{{ trans('public.select') }}...</option>
                                            @foreach($grade as $gd)
                                                <option @if($edu['grade_id'] == $gd['id']) selected @endif value="{{ $gd['id'] }}">{{ $gd['title'] }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input required title="{{ trans('validate.please fill in this field') }}"  value="{{ $edu['field_trend'] }}" type="text" class="form-control" name="frm[education_{!! $var !!}][field_trend]">
                                    </td>
                                    <td>
                                        <input required title="{{ trans('validate.please fill in this field') }}" value="{{ $edu['university'] }}" type="text" class="form-control" name="frm[education_{!! $var !!}][university]">
                                    </td>
                                    <td>
                                        <input required title="{{ trans('validate.please fill in this field') }}" maxlength="4" minlength="4" data-msg-minlength="{{ trans('validate.enter as models') }}"  data-msg-maxlength="{{ trans('validate.enter as models') }}"  value="{{ $edu['year'] }}" type="text" class="form-control text-center" name="frm[education_{!! $var !!}][year]" placeholder="1395">
                                    </td>
                                    <td>
                                        @if(count($education) == $var || $var == 1)
                                        <a href="#"onclick="Admin.duplicateRow(this, event)"><span class="fa fa-plus-square"></span></a> |
                                        @else
                                        <a href="#"onclick="Admin.duplicateRow(this, event)"><span class="fa fa-trash"></span></a>
                                        @endif
                                    </td>
                                </tr>
                                @php $var++; @endphp
                                @endforeach
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