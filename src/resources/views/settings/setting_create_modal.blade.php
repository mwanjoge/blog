<div class="modal" id="setting-create-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Value Chain Setup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('settings.store')}}" method="post">
                <div class="modal-body text-start">
                    @csrf
                    <div class="mb-3">
                        <label>Setting Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Setting Value</label>
                        <input type="text" name="val" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
