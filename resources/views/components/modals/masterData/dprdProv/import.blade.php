<form action="{{ URL::to('/admin/dprd-prov/import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="excelData" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail DPRD provinsi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="file" name="file" id="file" class="form-control" required>
                    <a href="{{ URL::to('/assets/templates/template_dprd_prov.xlsx') }}">Download template</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
