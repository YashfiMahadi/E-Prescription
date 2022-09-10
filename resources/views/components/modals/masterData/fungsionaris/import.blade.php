<form method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="excelData" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail DPR RI</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="file" name="file" id="file" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light " id="importSubmit">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
