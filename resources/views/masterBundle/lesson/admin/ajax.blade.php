<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th><a data-field="id" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/LessonList') }}" class="has-sort" data-sort="DESC">{{ trans('public.id') }}</a></th>
            <th><a data-field="title" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/LessonList') }}"  class="has-sort" data-sort="DESC">{{ trans('public.title') }}</a></th>
            <th class="last-left">اکشن</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entity as $key=>$ent)
            <tr>
                <td>{{ $ent['id'] }}</td>
                <td>{{ $ent['title'] }}</td>
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