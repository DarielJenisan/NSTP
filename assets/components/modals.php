<!-- CONFIRM MODAL -->
<div id="mdlconfirm" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p id="pmdlconfirmtext" class="mb-0"></p>
            </div>
            <div class="modal-footer py-0">
                <button id="btnconfirmmdlcancel" type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal">Cancel</button>
                <button id="btnconfirmmdlokay" type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>

<!-- TOAST MODAL -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 10000;">
    <div id="gbltoast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            Success
        </div>
    </div>
</div>

<!-- LOADING MODAL -->
<div class="modal fade" id="mdlloading" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none; z-index: 10000;" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog" style="margin-top: 250px;">
        <div class="modal-body loader" style="position: relative; left: 45%;">

        </div>
    </div>
</div>