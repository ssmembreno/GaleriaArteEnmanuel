<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg">

            <!-- Header -->
            <div class="modal-header border-0 bg-light px-4 py-3">
                <h5 class="modal-title fw-bold" id="confirmModalLabel">
                    <i class="bi bi-question-circle-fill text-primary me-2"></i> {{ __('messages.CONFIRM_CHANGES_Modal') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('messages.CLOSE_Modal') }}"></button>
            </div>

            <!-- Body -->
            <div class="modal-body text-center px-4 py-3">
                <p class="fs-5 text-secondary mb-0">
                    {{ __('messages.CONFIRM_MESSAGE_Modal') }}
                </p>
            </div>

            <!-- Footer -->
            <div class="modal-footer border-0 justify-content-center px-4 pb-4">
                <button type="button" class="btn btn-outline-danger rounded-pill px-4" data-bs-dismiss="modal">
                    {{ __('messages.CANCEL_Modal') }}

                </button>
                <button type="submit" class="btn btn-primary rounded-pill px-4 ms-2" form="updateProfileForm">
                    {{ __('messages.YES_SAVE_Modal') }}
                </button>
            </div>

        </div>
    </div>
</div>
