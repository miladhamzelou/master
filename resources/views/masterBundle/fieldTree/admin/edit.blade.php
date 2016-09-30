<div style="display: none" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a aria-hidden="true" data-dismiss="modal" class="close" type="button">×</a>
                <h4 class="modal-title">{{ @$modal_title }}
                    <img src="{{ asset('assets/admin/img/loader.gif') }}" class="ajax-loader-180 display-none"/>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="frm-form">@include('masterBundle.universityTree.admin.edit-frm')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>