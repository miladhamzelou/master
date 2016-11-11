<div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>{{ trans('master.grade') }}</th>
                <th width="30%">{{ trans('master.field and trend') }}</th>
                <th width="20%">{{ trans('master.university') }}</th>
                <th width="11%">{{ trans('master.year of graduation') }}</th>
                <th width="10%">{{ trans('public.action') }}</th>
            </tr>
            </thead>
            <tbody>
            @php $var=1; @endphp
            @if(count($education) > 0)
                @foreach($education as $key=>$edu)
                    <tr>
                        <td>
                            <select required title="{{ trans('validate.please fill in this field') }}" class="form-control" name="frm[education][education_{!! $var !!}][grade_id]">
                                <option value="">{{ trans('public.select') }}...</option>
                                @foreach($grade as $gd)
                                    <option @if($edu['grade_id'] == $gd['id']) selected @endif value="{{ $gd['id'] }}">{{ $gd['title'] }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input required title="{{ trans('validate.please fill in this field') }}"  value="{{ $edu['field_trend'] }}" type="text" class="form-control" name="frm[education][education_{!! $var !!}][field_trend]">
                        </td>
                        <td>
                            <input required title="{{ trans('validate.please fill in this field') }}" value="{{ $edu['university'] }}" type="text" class="form-control" name="frm[education][education_{!! $var !!}][university]">
                        </td>
                        <td>
                            <input required title="{{ trans('validate.required') }}" maxlength="4" minlength="4" data-msg-minlength="{{ trans('validate.enter as models') }}"  data-msg-maxlength="{{ trans('validate.enter as models') }}"  value="{{ $edu['year'] }}" type="text" class="form-control text-center" name="frm[education][education_{!! $var !!}][year]" placeholder="1395">
                        </td>
                        <td class="display-flex" style="height: 51px;font-size: 18px">
                            <a href="#"onclick="Admin.duplicateRow(this, event)" @if(count($education) != $var) style="display: none" @endif>
                                <span class="fa fa-plus-square-o fa-margin"></span>
                            </a>
                            <a href="#"onclick="Admin.deleteRow(this, event)" @if(count($education) == 1) style="display: none" @endif><span class="fa fa-trash-o"></span></a>
                        </td>
                    </tr>
                    @php $var++; @endphp
                @endforeach
            @else
                <tr>
                    <td>
                        <select required title="{{ trans('validate.please fill in this field') }}" class="form-control" name="frm[education][education_{!! $var !!}][grade_id]">
                            <option value="">{{ trans('public.select') }}...</option>
                            @foreach($grade as $gd)
                                <option value="{{ $gd['id'] }}">{{ $gd['title'] }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input required title="{{ trans('validate.please fill in this field') }}"  value="" type="text" class="form-control" name="frm[education][education_{!! $var !!}][field_trend]">
                    </td>
                    <td>
                        <input required title="{{ trans('validate.please fill in this field') }}" value="" type="text" class="form-control" name="frm[education][education_{!! $var !!}][university]">
                    </td>
                    <td>
                        <input required title="{{ trans('validate.required') }}" maxlength="4" minlength="4" data-msg-minlength="{{ trans('validate.enter as models') }}"  data-msg-maxlength="{{ trans('validate.enter as models') }}"  value="" type="text" class="form-control text-center" name="frm[education][education_{!! $var !!}][year]" placeholder="1395">
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