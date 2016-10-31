<div class="table-responsive">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th><a data-field="xid" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/UsersList') }}" class="has-sort" data-sort="DESC">{{ trans('public.id') }}</a></th>
                <th><a data-field="username" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/UsersList') }}"  class="has-sort" data-sort="DESC">{{ trans('auth.username') }}</a></th>
                <th><a data-field="name" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/UsersList') }}"  class="has-sort" data-sort="DESC">{{ trans('auth.name and family') }}</a></th>
                <th><a data-field="roles" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/UsersList') }}"  class="has-sort" data-sort="DESC">{{ trans('auth.roles') }}</a></th>
                <th><a data-field="mobile" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/UsersList') }}"  class="has-sort" data-sort="DESC">{{ trans('auth.mobile') }}</a></th>
                <th><a data-field="is_active" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/UsersList') }}"  class="has-sort" data-sort="DESC">{{ trans('auth.active') }}</a></th>
                <th class="last-left">{{ trans('public.action') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($entity as $key=>$ent)
                <tr>
                    <td>{{ $ent['xid'] }}</td>
                    <td>{{ $ent['username'] }}</td>
                    <td>@if($ent['name'] || $ent['family']){{ $ent['name'] . ' ' . $ent['family'] }}@else - @endif</td>
                    <td>@if($ent['roles'])@foreach(explode(',', $ent['roles']) as $role) <span class="label label-info">{{ trans("auth.".$role) }}</span> @endforeach @endif</td>
                    <td>@if($ent['mobile']){{ $ent['mobile'] }}@else - @endif</td>
                    <td data-field="is_active"><a href="{{ url(getCurrentURL('controller').'/ChangeEnum/'.$ent['xid']) }}" data-field="is_active" data-status="{{ $ent['is_active'] }}" onclick="Admin.changeEnum(this, event)">@if($ent['is_active'] == 1)<span class="fa fa-check text-success"></span>@else<span class="fa fa-minus text-danger"></span>@endif</a></td>
                    <td class="table-action">
                        <a onclick="Admin.delete(this,event)" href="{{ url(getCurrentURL('controller').'/Delete/'.$ent['xid']) }}"><span class="fa fa fa-trash-o"></span></a>
                        <a onclick="Admin.show(this, event)" href="{{ url(getCurrentURL('controller').'/Show/'.$ent['xid']) }}"><span class="fa fa-tv"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">
        {{ $entity->links() }}
    </div>
</div>