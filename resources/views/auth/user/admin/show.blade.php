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
                        <td style="width: 20%"><b>{{ trans('auth.name and family') }}:</b></td>
                        <td>@if($entity['userInfo']['name']){{ $entity['userInfo']['name'] . ' ' . $entity['userInfo']['family'] }} @else - @endif</td>
                    </tr>
                    <tr>
                        <td style="width: 20%"><b>{{ trans('auth.roles') }}:</b></td>
                        <td>@if(count($entity['role']) > 0)@foreach($entity['role'] as $role) <label class="label label-info">{{ trans('auth.'.$role['title']) }}</label> @endforeach @else - @endif</td>
                    </tr>
                    <tr>
                        <td style="width: 20%"><b>{{ trans('auth.username') }}:</b></td>
                        <td>{{ $entity['username'] }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%"><b>{{ trans('auth.mobile') }}:</b></td>
                        <td>@if($entity['userInfo']['mobile']){{ $entity['userInfo']['mobile'] }}@else - @endif</td>
                    </tr>
                    <tr>
                        <td style="width: 20%"><b>{{ trans('auth.email') }}:</b></td>
                        <td>{{ $entity['email'] }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('public.close window') }}</button>
            </div>
        </div>
    </div>
</div>