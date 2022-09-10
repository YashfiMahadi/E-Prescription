<div class="card d-none" id="editCard">
    <div class="card-header bg-default">
        <h5>Update Pembayaran</h5>
        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li>
                    <a href="javascript:void(0)" id="backEdit" data-toggle="tooltip" data-placement="top" title="Kembali">
                        <i class="fa fa-share-square text-info"  style="font-size: 1.8rem"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <form method="post" id="editForm">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="hidden" name="id" id="id">
                <input type="text" id="name" name="name" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="transaction_status_id">Status</label>
                <select id="transaction_status_id" name="transaction_status_id" class="form-control">
                    <option value="1">TIDAK TERHUBUNG</option>
                    <option value="2">TERHUBUNG</option>
                    <option value="3">TIDAK MERESPON</option>
                    <option value="4">MERESPON</option>
                    <option value="5">BELUM BAYAR</option>
                    <option value="6">SUDAH BAYAR</option>
                </select>
            </div>
            <div class="form-group">
                <label for="zakat">Zakat</label>
                <input type="text" id="zakat" name="zakat" class="form-control price">
            </div>
            <div class="form-group">
                <label for="infaq">Infaq</label>
                <input type="text" id="infaq" name="infaq" class="form-control price">
            </div>
            <div class="form-group">
                <label for="shodaqoh">Shodaqoh</label>
                <input type="text" id="shodaqoh" name="shodaqoh" class="form-control price">
            </div>
            <button type="submit" class="btn btn-primary float-right" id="editSubmit">
                <i class="ni ni-ui-04"></i>
                Update
            </button>

        </form>
    </div>
</div>
