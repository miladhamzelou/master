<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th><a data-field="id" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/UsersList') }}" class="has-sort" data-sort="DESC">{{ trans('public.id') }}</a></th>
            <th><a data-field="username" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/UsersList') }}"  class="has-sort" data-sort="DESC">{{ trans('auth.username') }}</a></th>
            <th><a data-field="userInfo.name" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/UsersList') }}"  class="has-sort" data-sort="DESC">{{ trans('auth.name and family') }}</a></th>
            <th><a data-field="title" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/UsersList') }}"  class="has-sort" data-sort="DESC">{{ trans('auth.roles') }}</a></th>
            <th>{{ trans('auth.mobile') }}</th>
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
                <td class="table-action">
                    <a onclick="Admin.delete(this,event)" href="{{ url(getCurrentURL('controller').'/delete/'.$ent['id']) }}"><span class="fa fa fa-trash-o"></span></a>
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