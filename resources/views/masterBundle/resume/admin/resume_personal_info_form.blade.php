<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label>{{ trans('auth.name') }}:</label>
            <input required title="{{ trans('validate.please fill in this field') }}" value="{{ @$personal_info['name'] }}"  type="text" class="form-control" name="frm[personal_info][name]">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}">
            <label>{{ trans('auth.family') }}:</label>
            <input required title="{{ trans('validate.please fill in this field') }}" value="{{ @$personal_info['family'] }}" type="text" class="form-control" name="frm[personal_info][family]">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('science_ranking_id') ? ' has-error' : '' }}">
            <label>{{ trans('master.science ranking') }}:</label>
            <select required title="{{ trans('validate.please fill in this field') }}" class="form-control" name="frm[personal_info][science_ranking_id]">
                <option value="">{{ trans('public.select') }}...</option>
                @foreach($science_ranking as $item)
                    <option @if(@$personal_info['science_ranking_id'] == $item['id']) selected @endif value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>{{ trans('master.personal interest') }}:</label>
            <input value="{{ @$personal_info['personal_interest'] }}" type="text" class="form-control" name="frm[personal_info][personal_interest]">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>{{ trans('auth.bio') }}:</label>
            <textarea  type="text" class="form-control" name="frm[personal_info][bio]">{{ @$personal_info['bio'] }}</textarea>
        </div>
    </div>
</div>