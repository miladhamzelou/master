<div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>{{ trans('public.title') }}</th>
                <th width="20%">{{ trans('master.university or place') }}</th>
                <th width="11%">{{ trans('master.year of award') }}</th>
                <th width="10%">{{ trans('public.action') }}</th>
            </tr>
            </thead>
            <tbody>
            @php $var=1; @endphp
            @if(count($awards) > 0)
                @foreach($awards as $key=>$awa)
                    <tr>
                        <td>
                            <input required title="{{ trans('validate.please fill in this field') }}"  value="{{ $awa['title'] }}" type="text" class="form-control" name="frm[awards][awards_{!! $var !!}][title]">
                        </td>
                        <td>
                            <input required title="{{ trans('validate.please fill in this field') }}" value="{{ $awa['place'] }}" type="text" class="form-control" name="frm[awards][awards_{!! $var !!}][place]">
                        </td>
                        <td>
                            <input required title="{{ trans('validate.required') }}" maxlength="4" minlength="4" data-msg-minlength="{{ trans('validate.enter as models') }}"  data-msg-maxlength="{{ trans('validate.enter as models') }}"  value="{{ $awa['year'] }}" type="text" class="form-control text-center" name="frm[awards][awards_{!! $var !!}][year]" placeholder="1395">
                        </td>
                        <td class="display-flex" style="height: 51px;font-size: 18px">
                            <a href="#"onclick="Admin.duplicateRow(this, event)" @if(count($awards) != $var) style="display: none" @endif>
                                <span class="fa fa-plus-square-o fa-margin"></span>
                            </a>
                            <a href="#"onclick="Admin.deleteRow(this, event)" @if(count($awards) == 1) style="display: none" @endif><span class="fa fa-trash-o"></span></a>
                        </td>
                    </tr>
                    @php $var++; @endphp
                @endforeach
            @else
                <tr>
                    <td>
                        <input required title="{{ trans('validate.please fill in this field') }}"  value="" type="text" class="form-control" name="frm[awards][awards_{!! $var !!}][title]">
                    </td>
                    <td>
                        <input required title="{{ trans('validate.please fill in this field') }}" value="" type="text" class="form-control" name="frm[awards][awards_{!! $var !!}][place]">
                    </td>
                    <td>
                        <input required title="{{ trans('validate.required') }}" maxlength="4" minlength="4" data-msg-minlength="{{ trans('validate.enter as models') }}"  data-msg-maxlength="{{ trans('validate.enter as models') }}"  value="" type="text" class="form-control text-center" name="frm[awards][awards_{!! $var !!}][year]" placeholder="1395">
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