@if(count($entity) > 0)
    <div class="table-responsive">
        <div class="text-left">
            {{ $entity->links() }}
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                @foreach(ftArray(config('app.bundle'), lcfirst(config('app.controller')) , 'list') as $cnf)
                    @if(!@$cnf['show_page'])
                        <th><a @if(@$cnf['sort']) data-sort="DESC" class="has-sort" href="{{ url(getCurrentURL('controller').'/'.config('app.action')) }}" onclick="Admin.sort(event, this)" @endif data-field="{{ @$cnf['data-field']  }}">@if(@$cnf['trans'] == 'default' || !@$cnf['trans']) {{ trans(lcfirst(config('app.controller')).'.'.@$cnf['text']) }} @elseif(@$cnf['trans']) {{ trans(@$cnf['trans'] . '.' . @$cnf['text']) }} @else {{ trans('public' . '.' . @$cnf['text']) }} @endif</a></th>
                    @endif
                @endforeach
                <th class="last-left">{{ trans('public.Action') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($entity as $key => $value)
                <tr>
                    @foreach(ftArray(config('app.bundle'), lcfirst(config('app.controller')) , 'list') as $cnf)
                        @if(!@$cnf['show_page'])
                            @if(@$cnf['custom_value'] && !@$cnf['join'])
                                <td>{{ $cnf['custom_value'] }}</td>
                            @elseif(@$cnf['join'])
                                <td>{{ eval($cnf['custom_value']) }}</td>
                            @elseif(@$cnf['db_field'])
                                @if(@$cnf['type'] == 'date' && config('app.dir') == 'rtl')
                                    <td>{{ FarsiLib::g2jdate(@$value[$cnf['db_field']]) }}</td>
                                @elseif(@$cnf['type'] == 'text')
                                    <td>{{ str_limit(@$value[$cnf['db_field']], @$cnf['count'] ? @$cnf['count'] : 15 ) }}</td>
                                @else
                                    <td>{{ @$value[$cnf['db_field']] }}</td>
                                @endif
                            @else
                                <td><a onclick="Admin.changeEnum(this, event)" data-field="approve" data-status="{{ $value['approve'] }}" href="{{ url(getCurrentURL('controller').'/changeEnum/' . $value['id']) }}"><span class="fa @if($value['approve']) fa-check-circle text-success @else fa-minus-circle text-danger @endif"></span></a></td>
                            @endif
                        @endif
                    @endforeach
                    <td class="table-action">
{{--                        <a href="{{ url(getCurrentURL('controller').'/destroy/' . $value['id'] ) }}"  onclick="Admin.delete(this,event)"><span class="fa fa fa-trash-o"></span></a>--}}
                        <a href="{{ url(getCurrentURL('controller').'/show/' . $value['id'] ) }}"  onclick="Admin.show(this, event)"><span class="fa fa-tv"></span></a>
{{--                        <a href="{{ url(getCurrentURL('controller').'/edit/' . $value['id'] ) }}"><span class="fa fa-pencil"></span></a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {{ $entity->links() }}
        </div>
    </div>
@else
    <div class="alert alert-info">
        <p>{{ trans('public.Record Not Found') }}</p>
    </div>
@endif