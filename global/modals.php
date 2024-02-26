<!-- CHANGE PASS MODAL -->
<div id="mdlchangepass" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="mb-0">Change Password</h6>
            </div>
            <div class="modal-body">
                <form id="frmmdlchangepass">
                    <div class="row">
                        <div class="col-12">
                            <label>Password</label>
                            <input id="incpcurrpass" autocomplete="new-password" class="form-control form-control-sm" type="password" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <label>New Password</label>
                            <input id="incpnewpass" autocomplete="new-password" class="form-control form-control-sm" type="password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label>Confirm Password</label>
                            <input id="incpconfirmpass" autocomplete="new-password" class="form-control form-control-sm" type="password" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer py-0">
                <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="frmmdlchangepass" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

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

<!-- DOWNLOAD REPORT TO EXCEL -->
<div id="modal-export" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="mb-0">Download Report</h6>
            </div>
            <div class="modal-body">
                <form id="frm-export">
                    <input type="hidden" id="export-tblID" value="#odrs table[name='odr']">
                    <input type="hidden" id="export-filename_init">
                    <input type="hidden" id="export-name" value="List of Unbilled Items">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label>Filename: (.xls)</label>
                            <input type="text" class="form-control" required="" id="export-filename">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer py-2">
                <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="frm-export" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>