<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg">

            <!-- Header -->
            <div class="modal-header border-0 bg-light px-4 py-3">
                <h5 class="modal-title fw-bold" id="confirmModalLabel">
                    <i class="bi bi-question-circle-fill text-primary me-2"></i> Confirmar cambios
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <!-- Body -->
            <div class="modal-body text-center px-4 py-3">
                <p class="fs-5 text-secondary mb-0">
                    ¿Estás seguro de que deseas <strong>guardar los cambios</strong> en tu perfil?
                </p>
            </div>

            <!-- Footer -->
            <div class="modal-footer border-0 justify-content-center px-4 pb-4">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button type="submit" class="btn btn-success rounded-pill px-4 ms-2" form="updateProfileForm">
                    Sí, guardar
                </button>
            </div>

        </div>
    </div>
</div>
