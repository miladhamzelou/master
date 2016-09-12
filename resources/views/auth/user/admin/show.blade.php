<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a aria-hidden="true" data-dismiss="modal" class="close" type="button">×</a>
                <h4 class="modal-title">{{ trans('public.Show Record') }}</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                    @foreach(ftArray(config('app.bundle'), lcfirst(config('app.controller')) , 'list') as $cnf)
                        <tr>
                            <td width="20%"><b>@if(@$cnf['trans'] == 'default' || !@$cnf['trans']) {{ trans(lcfirst(config('app.controller')).'.'.@$cnf['text']) }} @elseif(@$cnf['trans']) {{ trans(@$cnf['trans'] . '.' . @$cnf['text']) }} @else {{ trans('public' . '.' . @$cnf['text']) }} @endif:</b></td>
                            <td>
                                @if(@$cnf['custom_value'] && !@$cnf['join'])
                                    {{ $cnf['custom_value'] }}
                                @elseif(@$cnf['join'])
                                    {{ eval($cnf['custom_value']) }}
                                @elseif(@$cnf['db_field'])
                                    @if(@$cnf['type'] == 'date' && config('app.dir') == 'rtl')
                                        {{ FarsiLib::g2jdate($value[$cnf['db_field']]) }}
                                    @elseif(@$cnf['type'] == 'text')
                                        <p style="text-align: justify">{{ @$value[$cnf['db_field']] }}</p>
                                    @else
                                        {{ @$value[$cnf['db_field']] }}
                                    @endif
                                @else
                                    <a onclick="Admin.changeEnum(this, event)" data-field="approve"  data-status="{{ $value['approve'] }}" href="{{ url(getCurrentURL('controller').'/changeEnum/' . $value['id']) }}"><span class="fa @if($value['approve']) fa-check-circle text-success @else fa-minus-circle text-danger @endif"></span></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
                @if($value['userInfo']['img'])
                    <img src="{{ asset('images/users/'.$value['userInfo']['img']) }}" class="img-thumbnail pull-left" height="200" width="200">
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('public.Close') }}</button>
            </div>
        </div>
    </div>
</div>