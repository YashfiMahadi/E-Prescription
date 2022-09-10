<div class="card d-none" id="createCard">
    <div class="card-header bg-default">
        <h5>Create Kateogri Product</h5>
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
                <label for="descriptionCreate">Deskripsi</label>
                <textarea id="descriptionCreate" name="description" class="form-control error-form description_error_form" placeholder="isi Deskripsi"></textarea>
                <span class="text-danger error-text" id="description_error"></span>
            </div>

            <button type="submit" class="btn btn-primary" id="createSubmit">
                <i class="fa fa-plus"></i>
                Create
            </button>
        </form>
    </div>
</div>
