<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a aria-hidden="true" data-dismiss="modal" class="close" type="button">×</a>
                <h4 class="modal-title">{{ trans('public.show record') }}</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td style="width: 20%"><b>{{ trans('public.title') }}:</b></td>
                        <td>{{ $entity['subject'] }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%"><b>{{ trans('mail.message') }}:</b></td>
                        <td>{{ $entity['message'] }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%"><b>{{ trans('public.date') }}:</b></td>
                        <td>{{ \App\Facades\FarsiFacade::g2jDate($entity['created_at']) }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%"><b>{{ trans('mail.receiver') }}:</b></td>
                        <td>@if(count($entity['mailTo']) == $group_count && count($entity['mailTo']) > 10 ) <span class="label-info label">{{ trans('mail.send group mail') }}</span> @else @foreach($entity['mailTo'] as $item) <span class="label-info label">{{ $item['mail_address'] }}</span> @endforeach @endif</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('public.close window') }}</button>
            </div>
        </div>
    </div>
</div>