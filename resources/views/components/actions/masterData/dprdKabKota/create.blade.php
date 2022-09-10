<div class="card d-none" id="createCard">
    <div class="card-header bg-default">
        <h5>Create DPRD Kab / Kota</h5>
        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li>
                    <a href="javascript:void(0)" id="backCreate" data-toggle="tooltip" data-placement="top" title="Kembali">
                        <i class="fa fa-share-square text-info"  style="font-size: 1.8rem"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <form method="post" id="createForm">

            <div class="form-group">
                <label for="nameCreate">Nama</label>
                <input type="text" id="nameCreate" name="name" class="form-control error-form name_error_form" placeholder="isi name">
                <span class="text-danger error-text" id="name_error"></span>
            </div>

            <div class="form-group">
                <label for="provinceCreate">Province</label>
                <select id="provinceCreate" name="province_id" class="error-form province_error_form">
                    <option value="" disabled selected>--pillih provinsi--</option>
                </select>
                <span class="text-danger error-text" id="province_error"></span>
            </div>

            <div class="form-group">
                <label for="regencieCreate">regencie</label>
                <select id="regencieCreate" name="regency_id" class="error-form regencie_error_form">
                    <option value="" disabled selected>--pillih regencie--</option>
                </select>
                <span class="text-danger error-text" id="regencie_error"></span>
            </div>

            <div class="form-group">
                <label for="phoneCreate">No HP</label>
                <input type="number" id="phoneCreate" name="phone" class="form-control error-form phone_error_form" placeholder="isi No HP">
                <span class="text-danger error-text" id="phone_error"></span>
            </div>

            <div class="form-group">
                <label for="emailCreate">Email</label>
                <input type="email" id="emailCreate" name="email" class="form-control error-form email_error_form" placeholder="isi Email">
                <span class="text-danger error-text" id="email_error"></span>
            </div>

            <div class="form-group">
                <label for="gaji">Gaji</label>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Rp. </span>
                    <input type="number" id="gajiCreate" name="gaji" class="form-control error-form gaji_error_form" placeholder="isi Gaji">
                </div>
                <span class="text-danger error-text" id="gaji_error"></span>
            </div>

            <div class="form-group">
                <label for="periode">Periode</label>
                <input type="text" id="periodeCreate" name="periode" class="form-control error-form periode_error_form" placeholder="isi Periode">
                <span class="text-danger error-text" id="periode_error"></span>
            </div>

            <button type="submit" class="btn btn-primary" id="createSubmit">
                <i class="fa fa-plus"></i>
                Create
            </button>
        </form>
    </div>
</div>
