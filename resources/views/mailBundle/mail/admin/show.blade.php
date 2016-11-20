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
                        <td>{{ $entity['title'] }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%"><b>{{ trans('master.term code') }}:</b></td>
                        <td>{{ $entity['code'] }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%"><b>{{ trans('master.start date') }}:</b></td>
                        <td>{{ \App\Facades\FarsiFacade::g2jdate($entity['from_date']) }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%"><b>{{ trans('master.end date') }}:</b></td>
                        <td>{{ \App\Facades\FarsiFacade::g2jdate($entity['to_date']) }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('public.close window') }}</button>
            </div>
        </div>
    </div>
</div>