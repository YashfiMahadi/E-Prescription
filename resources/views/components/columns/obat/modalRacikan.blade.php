<div class="modal fade" id="showData" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail DPR RI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody id="tableDataObat">
                    </tbody>
                </table>

                <div>
                    <form method="post" id="formDataObat">
                        <div class="form-group">
                            <label for="signa">Pilih Signa</label>
                            <select name="signa" id="signa">
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary" id="tambahKeranjang">
                            <i class="zmdi zmdi-shopping-cart-plus" style="font-size: 1.2rem"></i>
                            Tambah Ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
