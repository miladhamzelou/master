<div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>{{ trans('public.title') }}</th>
                <th width="20%">{{ trans('master.publisher') }}</th>
                <th width="11%">{{ trans('public.year') }}</th>
                <th width="10%">{{ trans('public.action') }}</th>
            </tr>
            </thead>
            <tbody>
            @php $var=1; @endphp
            @if(count($translated_book) > 0)
                @foreach($translated_book as $key=>$tb)
                    <tr>
                        <td>
                            <input required title="{{ trans('validate.please fill in this field') }}"  value="{{ $tb['title'] }}" type="text" class="form-control" name="frm[translated_book][translated_book_{!! $var !!}][title]">
                        </td>
                        <td>
                            <input  value="{{ $tb['publisher'] }}" type="text" class="form-control" name="frm[translated_book][translated_book_{!! $var !!}][publisher]">
                        </td>
                        <td>
                            <input required title="{{ trans('validate.required') }}" maxlength="4" minlength="4" data-msg-minlength="{{ trans('validate.enter as models') }}"  data-msg-maxlength="{{ trans('validate.enter as models') }}"  value="{{ $tb['year'] }}" type="text" class="form-control text-center" name="frm[translated_book][translated_book_{!! $var !!}][year]" placeholder="1395">
                        </td>
                        <td class="display-flex" style="height: 51px;font-size: 18px">
                            <a href="#"onclick="Admin.duplicateRow(this, event)" @if(count($translated_book) != $var) style="display: none" @endif>
                                <span class="fa fa-plus-square-o fa-margin"></span>
                            </a>
                            <a href="#"onclick="Admin.deleteRow(this, event)" @if(count($translated_book) == 1) style="display: none" @endif><span class="fa fa-trash-o"></span></a>
                        </td>
                    </tr>
                    @php $var++; @endphp
                @endforeach
            @else
                <tr>
                    <td>
                        <input required title="{{ trans('validate.please fill in this field') }}"  value="" type="text" class="form-control" name="frm[translated_book][translated_book_{!! $var !!}][title]">
                    </td>
                    <td>
                        <input  type="text" class="form-control" name="frm[translated_book][translated_book_{!! $var !!}][publisher]">
                    </td>
                    <td>
                        <input required title="{{ trans('validate.required') }}" maxlength="4" minlength="4" data-msg-minlength="{{ trans('validate.enter as models') }}"  data-msg-maxlength="{{ trans('validate.enter as models') }}"  value="" type="text" class="form-control text-center" name="frm[translated_book][translated_book_{!! $var !!}][year]" placeholder="1395">
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