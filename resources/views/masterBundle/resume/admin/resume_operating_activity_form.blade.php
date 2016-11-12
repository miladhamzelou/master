<div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>{{ trans('public.title') }}</th>
                <th width="20%">{{ trans('public.from date') }}</th>
                <th width="20%">{{ trans('public.to date') }}</th>
                <th width="10%">{{ trans('public.action') }}</th>
            </tr>
            </thead>
            <tbody>
            @php $var=1; @endphp
            @if(count($operating_activity) > 0)
                @foreach($operating_activity as $key=>$awa)
                    <tr>
                        <td>
                            <input required title="{{ trans('validate.please fill in this field') }}"  value="{{ $awa['title'] }}" type="text" class="form-control" name="frm[operating_activity][operating_activity_{!! $var !!}][title]">
                        </td>
                        <td>
                            <input data-datepicker='data-datepicker' value="{{ \App\Facades\FarsiFacade::g2jdate($awa['from_date']) }}" type="text" class="form-control text-center" name="frm[operating_activity][operating_activity_{!! $var !!}][from_date]">
                        </td>
                        <td>
                            <input data-datepicker='data-datepicker' value="{{ \App\Facades\FarsiFacade::g2jdate($awa['to_date']) }}" type="text" class="form-control text-center" name="frm[operating_activity][operating_activity_{!! $var !!}][to_date]">
                        </td>
                        <td class="display-flex" style="height: 51px;font-size: 18px">
                            <a href="#"onclick="Admin.duplicateRow(this, event)" @if(count($operating_activity) != $var) style="display: none" @endif>
                                <span class="fa fa-plus-square-o fa-margin"></span>
                            </a>
                            <a href="#"onclick="Admin.deleteRow(this, event)" @if(count($operating_activity) == 1) style="display: none" @endif><span class="fa fa-trash-o"></span></a>
                        </td>
                    </tr>
                    @php $var++; @endphp
                @endforeach
            @else
                <tr>
                    <td>
                        <input required title="{{ trans('validate.please fill in this field') }}"  value="" type="text" class="form-control" name="frm[operating_activity][operating_activity_{!! $var !!}][title]">
                    </td>
                    <td>
                        <input data-datepicker='data-datepicker' type="text" class="form-control text-center" name="frm[operating_activity][operating_activity_{!! $var !!}][from_date]">
                    </td>
                    <td>
                        <input data-datepicker='data-datepicker' type="text" class="form-control text-center" name="frm[operating_activity][operating_activity_{!! $var !!}][to_date]">
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