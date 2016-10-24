<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th><a data-field="id" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/UsersList') }}" class="has-sort" data-sort="DESC">{{ trans('public.id') }}</a></th>
            <th><a data-field="username" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/UsersList') }}"  class="has-sort" data-sort="DESC">{{ trans('auth.username') }}</a></th>
            <th>{{ trans('auth.name and family') }}</th>
            <th>{{ trans('auth.roles') }}</th>
            <th>{{ trans('auth.mobile') }}</th>
            <th><a data-field="is_active" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/UsersList') }}"  class="has-sort" data-sort="DESC">{{ trans('auth.active') }}</a></th>
            <th class="last-left">{{ trans('public.action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entity as $key=>$ent)
            <tr>
                <td>{{ $ent['id'] }}</td>
                <td>{{ $ent['username'] }}</td>
                <td>@if($ent['userInfo']['name'] || $ent['userInfo']['family']){{ $ent['userInfo']['name'] . ' ' . $ent['userInfo']['family'] }}@else - @endif</td>
                <td>@if(count($ent['role']) > 0)@foreach($ent['role'] as $role) <label class="label label-info">{{ trans('auth.'.$role['title']) }}</label> @endforeach @else - @endif</td>
                <td>@if($ent['userInfo']['mobile']){{ $ent['userInfo']['mobile'] }}@else - @endif</td>
                <td data-field="is_active"><a href="" data-status="0" onclick="Admin.changeEnum(this, event)">@if($ent['is_active'] == 1)<span class="fa fa-check text-success"></span>@else<span class="fa fa-minus text-danger"></span>@endif</a></td>
                <td class="table-action">
{{--                    <a onclick="Admin.delete(this,event)" href="{{ url(getCurrentURL('controller').'/delete/'.$ent['id']) }}"><span class="fa fa fa-trash-o"></span></a>--}}
                    <a href="{{ url(getCurrentURL('controller').'/edit/'.$ent['id']) }}"><span class="fa fa fa-pencil"></span></a>
                    <a onclick="Admin.show(this, event)" href="{{ url(getCurrentURL('controller').'/Show/'.$ent['id']) }}"><span class="fa fa-tv"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $entity->links() }}
    </div>
</div>