<div class="modal fade " tabindex="-1" role="dialog" id="languageDetailsCreate" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Create Language Key and Value') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @include('backend.language.language_details.fields')
                </div>
            </div>
        </div>
    </div>
</div>
