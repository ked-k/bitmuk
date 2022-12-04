<div class="modal fade " tabindex="-1" role="dialog" id="languageDetailsUpdate" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Update Language Key and Value') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @include('backend.language.language_details.edit_fields')
                </div>
            </div>
        </div>
    </div>
</div>
