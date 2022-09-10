<div class="card d-none" id="editCard">
    <div class="card-header bg-default">
        <h5>Update Kateogri Product</h5>
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
                <label for="description">Deskripsi</label>
                <textarea type="text" id="description" name="description" class="form-control error-form description_error_form" placeholder="isi Deskripsi"></textarea>
                <span class="text-danger error-text" id="description_error"></span>
            </div>

            <button type="submit" class="btn btn-primary" id="editSubmit">
                <i class="ni ni-ui-04"></i>
                Update
            </button>

        </form>
    </div>
</div>
