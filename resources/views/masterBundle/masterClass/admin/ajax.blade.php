<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th><a data-field="id" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/ClassList') }}" class="has-sort" data-sort="DESC">{{ trans('public.id') }}</a></th>
            <th><a data-field="lesson_id" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/ClassList') }}"  class="has-sort" data-sort="DESC">{{ trans('master.lesson') }}</a></th>
            <th><a data-field="group" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/ClassList') }}"  class="has-sort" data-sort="DESC">{{ trans('master.group') }}</a></th>
            <th><a data-field="university_tree_id" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/ClassList') }}"  class="has-sort" data-sort="DESC">{{ trans('master.university') }}</a></th>
            <th><a data-field="term_id" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/ClassList') }}"  class="has-sort" data-sort="DESC">{{ trans('master.term') }}</a></th>
            <th class="last-left">اکشن</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entity as $key=>$ent)
            <tr>
                <td>{{ $ent['id'] }}</td>
                <td>{{ $ent['lesson']['title'] }}</td>
                <td>{{ $ent['group'] }}</td>
                <td>{{ $ent['universityCollection']['name'] }}</td>
                <td>{{ $ent['term']['title'] }}</td>
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