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
            url: `/admin/kategori/${id}`,
            dataType: "JSON",
            success: function (response) {
                $('#createForm').trigger('reset');

                $('#id').val(id);

                $('#name').val(response.category.name);
                $('#description').val(response.category.description);

                $('#editCard').removeClass('d-none');
                $('#tableCard').addClass('d-none');

                swal.close();
            }
        });
    }

    const show = (id) => {
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
            url: `/admin/kategori/${id}`,
            dataType: "JSON",
            success: function (response) {

                $('#showData').modal('show');

                $('#nameTable').empty();
                $('#descriptionTable').empty();

                $('#nameTable').append(response.category.name);
                $('#descriptionTable').append(response.category.description);

                swal.close();
            }
        });
    }

    // SECTION hapus data
    const deleteData = (id) => {
        Swal.fire({
            title: 'Apa anda yakin untuk menghapus Data ini?',
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result)=>{
            if(result.value){
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
                    url: `/admin/kategori/delete`,
                    data: {
                        'id': id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        swal.close();

                        if(response.status) {
                            Swal.fire(
                                'Success!',
                                response.msg,
                                'success'
                            )

                            $('#table').DataTable().ajax.reload();
                        } else {
                            Swal.fire(
                                'Error!',
                                response.msg,
                                'warning'
                            )
                        }
                    }
                });
            }
        });
    }
    // !SECTION hapus data

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
            responsive: true,
            serverSide: true,
            pagingType: "full_numbers",
            ajax: {
                url: '/admin/kategori/table'
            },
            "saaSorting": [],
            "columns":
            [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
                { data: 'action', orderable: false, searchable: false },
            ],
        });
        // !SECTION Datatable

        $('#backCreate').click(function (e) {
            Swal.fire({
                    title: 'Please Wait!',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    willOpen: () => {
                        Swal.showLoading()
                    },
                });

            $('#tableCard').removeClass('d-none');
            $('#createCard').addClass('d-none');

            swal.close();
        });

        $('#import').click(function (e) {
            $('#excelData').modal('show');
        });

        $('#importSubmit').click(function (e) {
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
                type: "post",
                url: "/admin/kategori/import",
                data: formData,
                dataType: "JSON",
                cache:false,
                contentType: false,
                processData: false,
                success: function (response) {
                    swal.close();
                    if (data.status) {
                        $('#table').DataTable().ajax.reload();
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
                url: "/admin/kategori/export",
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

        $('#create').click(function (e) {
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
                url: "/admin/kategori/create",
                data: "",
                dataType: "JSON",
                success: function (response) {
                    $('#createForm').trigger('reset');

                    $('#createCard').removeClass('d-none');
                    $('#tableCard').addClass('d-none');

                    swal.close();
                }
            });
        });

        // SECTION add
        $('#createSubmit').click(function (e) {
            e.preventDefault();

            const formData  = new FormData($("#createForm")[0]);

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
                url: "/admin/kategori/store",
                data: formData,
                dataType: "JSON",
                cache:false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $(document).find('span.error-text').text('');
                    $(document).find('input.error-form').removeClass('is-invalid');
                },
                success: function (data) {
                    swal.close();
                    if (data.status == 0) {
                        $.each(data.error, function (prefix, val) {
                            $('span#'+prefix+'_error').text(val[0]);
                            $('.'+prefix+'_error_form').addClass('is-invalid');
                        });
                    } if (data.status) {
                        Swal.fire(
                            'Success!',
                            data.msg,
                            'success'
                        )

                        $('#tableCard').removeClass('d-none');
                        $('#createCard').addClass('d-none');

                        $('#table').DataTable().ajax.reload();
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
        // !SECTION add

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
                url: `/admin/kategori/${id}`,
                data: formData,
                dataType: "JSON",
                cache:false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $(document).find('span.error-text').text('');
                    $(document).find('input.error-form').removeClass('is-invalid');
                },
                success: function (data) {
                    swal.close();
                    if (data.status == 0) {
                        $.each(data.error, function (prefix, val) {
                            $('span#'+prefix+'_error').text(val[0]);
                            $('.'+prefix+'_error_form').addClass('is-invalid');
                        });
                    } if (data.status) {
                        Swal.fire(
                            'Success!',
                            data.msg,
                            'success'
                        )

                        $('#tableCard').removeClass('d-none');
                        $('#editCard').addClass('d-none');

                        $('#table').DataTable().ajax.reload();
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
