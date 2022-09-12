<script>
    $(function () {

        // SECTION Datatable
        $('#table').DataTable({
            order: [],
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            filter: true,
            processing: true,
            responsive: true,
            serverSide: true,
            pagingType: "full_numbers",
            ajax: {
                url: '/admin/obat/table'
            },
            "saaSorting": [],
            "columns":
            [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'obatalkes_kode', name: 'obatalkes_kode' },
                { data: 'obatalkes_nama', name: 'obatalkes_nama' },
                { data: 'stok', name: 'stok' },
                { data: 'created_date', name: 'created_date' },
                { data: 'action', orderable: false, searchable: false },
            ],
        });
        // !SECTION Datatable

        // SECTION set CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        // !SECTION set CSRF token

        // SECTION add Racikan
        $('#racikan').click(function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Please Wait!',
                showConfirmButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading()
                },
            });

            const formData  = new FormData($("#createForm")[0]);

            $.ajax({
                type: "POST",
                url: "/admin/obat/simpan-obat",
                data: formData,
                dataType: "JSON",
                cache:false,
                contentType: false,
                processData: false,
                success: function (data) {
                    swal.close();
                    if (data.status) {

                        $('#tableDataObat').empty();

                        $.each(data.pilih, function (index, value) {
                            $('#tableDataObat').append(`
                                <tr>
                                    <td>${value.obatalkes_kode}</td>
                                    <td>${value.obatalkes_nama}</td>
                                    <td>${value.created_date}</td>
                                </tr>
                            `);
                        });

                        $('#formDataObat').empty();

                        $('#formDataObat').append(`
                            <div class="form-group">
                                <label for="racikan">Nama obat Racikan</label>
                                <input type="text" name="racikan" class="form-control" id="racikan" placeholder="isi nama obat" required>
                            </div>
                        `);

                        $.each(data.pilih, function (index, value) {
                            $('#formDataObat').append(`
                                <div class="form-group">
                                    <label for="qty">jumlah obat ${value.obatalkes_nama} </label>
                                    <input type="hidden" name="id[]" id="id" value="${value.obatalkes_id}">
                                    <input type="number" name="qty[]" class="form-control" id="qty" placeholder="Jumlah" required>
                                </div>
                            `);
                        });

                        $('#formDataObat').append(`
                            <button type="button" class="btn btn-primary" id="tambahKeranjang">
                                <i class="zmdi zmdi-shopping-cart-plus" style="font-size: 1.2rem"></i>
                                Tambah Ke Keranjang
                            </button>
                        `);

                        $('#nonRacikan').modal('show');

                        // SECTION add Tambah Keranjang
                            $('#tambahKeranjang').click(function (e) {
                                e.preventDefault();

                                $('#nonRacikan').modal('hide');

                                Swal.fire({
                                    title: 'Please Wait!',
                                    showConfirmButton: false,
                                    allowOutsideClick: false,
                                    willOpen: () => {
                                        Swal.showLoading()
                                    },
                                })

                                const formData  = new FormData($("#formDataObat")[0]);

                                $.ajax({
                                    type: "POST",
                                    url: "/admin/obat/tambah-keranjang",
                                    data: formData,
                                    dataType: "JSON",
                                    cache:false,
                                    contentType: false,
                                    processData: false,
                                    success: function (data) {
                                        swal.close();
                                        if (data.status) {
                                            Swal.fire(
                                                'Success!',
                                                data.msg,
                                                'success'
                                            )

                                            window.location.href = "{{ URL::to('/admin/keranjang') }}";

                                        } else {
                                            Swal.fire(
                                                'Error!',
                                                data.msg,
                                                'warning'
                                            )
                                        }
                                    }
                                });

                            });
                            // !SECTION add Tambah Keranjang

                    } else {
                        Swal.fire(
                            'Error!',
                            data.msg,
                            'warning'
                        )
                    }
                }
            });

        });
        // !SECTION add Racikan

        // SECTION add Simpan Obat
        $('#simpanObat').click(function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Please Wait!',
                showConfirmButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading()
                },
            });

            const formData  = new FormData($("#createForm")[0]);

            $.ajax({
                type: "POST",
                url: "/admin/obat/simpan-obat",
                data: formData,
                dataType: "JSON",
                cache:false,
                contentType: false,
                processData: false,
                success: function (data) {
                    swal.close();
                    if (data.status) {

                        $('#tableDataObat').empty();

                        $.each(data.pilih, function (index, value) {
                            $('#tableDataObat').append(`
                                <tr>
                                    <td>${value.obatalkes_kode}</td>
                                    <td>${value.obatalkes_nama}</td>
                                    <td>${value.created_date}</td>
                                </tr>
                            `);
                        });

                        $('#formDataObat').empty();

                        $.each(data.pilih, function (index, value) {
                            $('#formDataObat').append(`
                                <div class="form-group">
                                    <label for="qty">jumlah obat ${value.obatalkes_nama} </label>
                                    <input type="hidden" name="id[]" id="id" value="${value.obatalkes_id}">
                                    <input type="number" name="qty[]" class="form-control" id="qty" placeholder="Jumlah" required>
                                </div>
                            `);
                        });

                        $('#formDataObat').append(`
                            <button type="button" class="btn btn-primary" id="tambahKeranjang">
                                <i class="zmdi zmdi-shopping-cart-plus" style="font-size: 1.2rem"></i>
                                Tambah Ke Keranjang
                            </button>
                        `);

                        $('#nonRacikan').modal('show');

                        // SECTION add Tambah Keranjang
                            $('#tambahKeranjang').click(function (e) {
                                e.preventDefault();

                                $('#nonRacikan').modal('hide');

                                Swal.fire({
                                    title: 'Please Wait!',
                                    showConfirmButton: false,
                                    allowOutsideClick: false,
                                    willOpen: () => {
                                        Swal.showLoading()
                                    },
                                })

                                const formData  = new FormData($("#formDataObat")[0]);

                                $.ajax({
                                    type: "POST",
                                    url: "/admin/obat/tambah-keranjang",
                                    data: formData,
                                    dataType: "JSON",
                                    cache:false,
                                    contentType: false,
                                    processData: false,
                                    success: function (data) {
                                        swal.close();
                                        if (data.status) {
                                            Swal.fire(
                                                'Success!',
                                                data.msg,
                                                'success'
                                            )

                                            window.location.href = "{{ URL::to('/admin/keranjang') }}";

                                        } else {
                                            Swal.fire(
                                                'Error!',
                                                data.msg,
                                                'warning'
                                            )
                                        }
                                    }
                                });

                            });
                            // !SECTION add Tambah Keranjang

                    } else {
                        Swal.fire(
                            'Error!',
                            data.msg,
                            'warning'
                        )
                    }
                }
            });

        });
        // !SECTION add Simpan Obat

    });
</script>
