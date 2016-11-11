<div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>{{ trans('public.title') }}</th>
                <th>{{ trans('public.period') }}</th>
                <th width="20%">{{ trans('master.university or place') }}</th>
                <th width="11%">{{ trans('public.year') }}</th>
                <th width="10%">{{ trans('public.action') }}</th>
            </tr>
            </thead>
            <tbody>
            @php $var=1; @endphp
            @if(count($conferences) > 0)
                @foreach($conferences as $key=>$con)
                    <tr>
                        <td>
                            <input required title="{{ trans('validate.please fill in this field') }}"  value="{{ $con['title'] }}" type="text" class="form-control" name="frm[conferences][conferences_{!! $var !!}][title]">
                        </td>
                        <td>
                            <input value="{{ $con['period'] }}" type="text" class="form-control" name="frm[conferences][conferences_{!! $var !!}][period]">
                        </td>
                        <td>
                            <input required title="{{ trans('validate.please fill in this field') }}"  value="{{ $con['place'] }}" type="text" class="form-control" name="frm[conferences][conferences_{!! $var !!}][place]">
                        </td>
                        <td>
                            <input required title="{{ trans('validate.required') }}" maxlength="4" minlength="4" data-msg-minlength="{{ trans('validate.enter as models') }}"  data-msg-maxlength="{{ trans('validate.enter as models') }}"  value="{{ $con['year'] }}" type="text" class="form-control text-center" name="frm[conferences][conferences_{!! $var !!}][year]" placeholder="1395">
                        </td>
                        <td class="display-flex" style="height: 51px;font-size: 18px">
                            <a href="#"onclick="Admin.duplicateRow(this, event)" @if(count($conferences) != $var) style="display: none" @endif>
                                <span class="fa fa-plus-square-o fa-margin"></span>
                            </a>
                            <a href="#"onclick="Admin.deleteRow(this, event)" @if(count($conferences) == 1) style="display: none" @endif><span class="fa fa-trash-o"></span></a>
                        </td>
                    </tr>
                    @php $var++; @endphp
                @endforeach
            @else
                <tr>
                    <td>
                        <input required title="{{ trans('validate.please fill in this field') }}"  value="" type="text" class="form-control" name="frm[conferences][conferences_{!! $var !!}][title]">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="frm[conferences][conferences_{!! $var !!}][period]">
                    </td>
                    <td>
                        <input required title="{{ trans('validate.please fill in this field') }}" value="" type="text" class="form-control" name="frm[conferences][conferences_{!! $var !!}][place]">
                    </td>
                    <td>
                        <input required title="{{ trans('validate.required') }}" maxlength="4" minlength="4" data-msg-minlength="{{ trans('validate.enter as models') }}"  data-msg-maxlength="{{ trans('validate.enter as models') }}"  value="" type="text" class="form-control text-center" name="frm[conferences][conferences_{!! $var !!}][year]" placeholder="1395">
                    </td>
                    <td class="display-flex" style="height: 51px;font-size: 18px">
                        <a href="#"onclick="Admin.duplicateRow(this, event)">
                            <span class="fa fa-plus-square-o fa-margin"></span>
                        </a>
                        <a href="#"onclick="Admin.deleteRow(this, event)" style="display: none"><span class="fa fa-trash-o"></span></a>
                    </td>
                </tr>
                @php $var++; @endphp
            @endif
            </tbody>
        </table>
    </div>