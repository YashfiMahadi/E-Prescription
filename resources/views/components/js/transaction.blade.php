<script>
    const edit = (id) => {
        Swal.fire({
            title: 'Please Wait!',
            showConfirmButton: false,
            allowOutsideClick: false,
            willOpen: () => {
                Swal.showLoading()
            },
        });

        $.ajax({
            type: "GET",
            url: `/admin/progress-pembayaran/${id}`,
            dataType: "JSON",
            success: function (response) {
                $('#createForm').trigger('reset');

                $('#id').val(id);

                $('#name').val(response.name);
                $('#transaction_status_id').val(response.transaction_status_id);
                $('#zakat').val(response.zakat);
                $('#infaq').val(response.infaq);
                $('#shodaqoh').val(response.shodaqoh);

                $('#editCard').removeClass('d-none');
                $('#tableCard').addClass('d-none');

                swal.close();
            }
        });
    }

    $(function () {
        // SECTION set CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        // !SECTION set CSRF token

        // SECTION Datatable
        $('#table').DataTable({
            order: [],
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            filter: true,
            processing: true,
            // responsive: true,
            serverSide: true,
            pagingType: "full_numbers",
            ajax: {
                url: '/admin/progress-pembayaran/table',
                data: function(data) {
                    data.month              = $('#month').val();
                    data.year               = $('#year').val();
                    data.member_level_id    = $('#member_level_id').val();
                },
            },
            "saaSorting": [],
            "columns":
            [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'member_level', name: 'member_levels.name' },
                { data: 'province', name: 'provinces.name' },
                { data: 'regency', orderable: false, searchable: false },
                { data: 'terhubung', orderable: false, searchable: false },
                { data: 'respon', orderable: false, searchable: false },
                { data: 'transfer', orderable: false, searchable: false },
                { data: 'zakat', orderable: false, searchable: false },
                { data: 'infaq', orderable: false, searchable: false },
                { data: 'sedekah', orderable: false, searchable: false },
                { data: 'total', orderable: false, searchable: false },
                { data: 'action', orderable: false, searchable: false },
            ],
        });
        // !SECTION Datatable

        $('.price').keyup(function(event) {
            if(event.which >= 37 && event.which <= 40) return;

            $(this).val(function(index, value) {
                return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });
        });

        $('#export').click(function (e) {
            Swal.fire({
                    title: 'Please Wait!',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    willOpen: () => {
                        Swal.showLoading()
                    },
                });
            $.ajax({
                type: "get",
                url: "/admin/dprd-prov/export",
                dataType: "JSON",
                success: function (response) {
                    swal.close();
                    if (data.status) {
                        Swal.fire(
                            'Success!',
                            data.msg,
                            'success'
                        )
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

        $('.filter').change(function (e) {
            e.preventDefault();

            $('#table').DataTable().ajax.reload(false);
        });

        $('#backEdit').click(function (e) {
            Swal.fire({
                    title: 'Please Wait!',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    willOpen: () => {
                        Swal.showLoading()
                    },
                });

            $('#tableCard').removeClass('d-none');
            $('#editCard').addClass('d-none');

            swal.close();
        });

        // SECTION update
        $('#editSubmit').click(function (e) {
            e.preventDefault();

            const formData  = new FormData($("#editForm")[0]);

            const id = $('#id').val();

            Swal.fire({
                title: 'Please Wait!',
                showConfirmButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading()
                },
            });

            $.ajax({
                type: "POST",
                url: `/admin/progress-pembayaran/${id}/update`,
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

                        $('#tableCard').removeClass('d-none');
                        $('#editCard').addClass('d-none');

                        $('#id').val('');

                        $('#table').DataTable().ajax.reload(false);
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
        // !SECTION update
    });
</script>
