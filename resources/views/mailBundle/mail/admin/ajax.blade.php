<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th><a data-field="id" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/MailList') }}" class="has-sort" data-sort="DESC">{{ trans('public.id') }}</a></th>
            <th><a data-field="subject" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/MailList') }}"  class="has-sort" data-sort="DESC">{{ trans('mail.subject') }}</a></th>
            <th><a data-field="message" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/MailList') }}"  class="has-sort" data-sort="DESC">{{ trans('mail.message') }}</a></th>
            <th><a data-field="created_at" onclick="Admin.sort(event, this)" href="{{ url(getCurrentURL('controller').'/MailList') }}"  class="has-sort" data-sort="DESC">{{ trans('public.date') }}</a></th>
            <th class="last-left">{{ trans('public.action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entity as $key=>$ent)
            <tr>
                <td>{{ $ent['id'] }}</td>
                <td>{{ $ent['subject'] }}</td>
                <td>{{ str_limit($ent['message'], 70) }}</td>
                <td>{{ \App\Facades\FarsiFacade::g2jdate($ent['created_at']) }}</td>
                <td class="table-action">
                    <a data-toggle="tooltip" data-placement="top" title="{{ trans('public.delete') }}" onclick="Admin.delete(this,event)" href="{{ url(getCurrentURL('controller').'/delete/'.$ent['id']) }}"><span class="fa fa fa-trash-o"></span></a>
                    <a data-toggle="tooltip" data-placement="top" title="{{ trans('public.show') }}" onclick="Admin.show(this, event)" href="{{ url(getCurrentURL('controller').'/Show/'.$ent['id']) }}"><span class="fa fa-tv"></span></a>
                    <a  data-toggle="tooltip" data-placement="top" title="{{ trans('mail.send again') }}" href="{{ url(getCurrentURL('controller').'/SendAgain/'.$ent['id']) }}"><span class="fa fa fa-mail-forward"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $entity->links() }}
    </div>
</div>