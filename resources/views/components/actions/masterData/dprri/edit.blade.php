<div class="card d-none" id="editCard">
    <div class="card-header bg-default">
        <h5>Update DPR RI</h5>
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
                <input type="text" id="name" name="name" class="form-control error-form name_error_form" placeholder="isi name">
                <span class="text-danger error-text" id="name_error"></span>
            </div>

            <div class="form-group">
                <label for="province">Province</label>
                <select id="province" name="province_id" class="error-form province_error_form">
                </select>
                <span class="text-danger error-text" id="province_error"></span>
            </div>

            <div class="form-group">
                <label for="phone">No HP</label>
                <input type="number" id="phone" name="phone" class="form-control error-form phone_error_form" placeholder="isi No HP">
                <span class="text-danger error-text" id="phone_error"></span>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control error-form email_error_form" placeholder="isi Email">
                <span class="text-danger error-text" id="email_error"></span>
            </div>

            <div class="form-group">
                <label for="gaji">Gaji</label>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Rp. </span>
                    <input type="number" id="gaji" name="gaji" class="form-control error-form gaji_error_form" placeholder="isi Gaji">
                </div>
                <span class="text-danger error-text" id="gaji_error"></span>
            </div>

            <div class="form-group">
                <label for="periode">Periode</label>
                <input type="text" id="periode" name="periode" class="form-control error-form periode_error_form" placeholder="isi Periode">
                <span class="text-danger error-text" id="periode_error"></span>
            </div>

            <button type="submit" class="btn btn-primary" id="editSubmit">
                <i class="ni ni-ui-04"></i>
                Update
            </button>

        </form>
    </div>
</div>
