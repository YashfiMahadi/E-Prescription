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
            url: `/admin/fungsionaris/${id}`,
            dataType: "JSON",
            success: function (response) {
                $('#createForm').trigger('reset');

                $('#id').val(id);

                $('#name').val(response.fungsionaris.name);
                $('#jabatan').val(response.fungsionaris.jabatan);
                $('#phone').val(response.fungsionaris.phone);
                $('#email').val(response.fungsionaris.email);
                $('#gaji').val(response.fungsionaris.gaji).trigger('change');
                $('#periode').val(response.fungsionaris.periode);

                $.each(response.province, function (index, value) {
                    $('#province').append(`
                        <option value="${value.id}">${value.name}</option>
                    `);
                });

                $.each(response.regencie, function (index, value) {
                    $('#regencie').append(`
                        <option value="${value.id}">${value.name}</option>
                    `);
                });

                $('#province').select2({
                    multiple: false,
                    ajax: {
                        url: "/admin/fungsionaris/ambil/province",
                        type: 'post',
                        dataType: "JSON",
                        delay: 250,
                        data: function (params){
                            return {
                                search: params.term
                            }
                        },
                        processResults: function(response){
                            return{
                                results: response
                            }
                        },
                        cache: true
                    }
                });

                $('#province').val(response.fungsionaris.province_id).trigger('change');

                $('#regencie').select2({
                    multiple: false,
                    ajax: {
                        url: "/admin/fungsionaris/ambil/regencie",
                        type: 'post',
                        dataType: "JSON",
                        delay: 250,
                        data: function (params){
                            return {
                                search: params.term
                            }
                        },
                        processResults: function(response){
                            return{
                                results: response
                            }
                        },
                        cache: true
                    }
                });

                $('#regencie').val(response.fungsionaris.regencie_id).trigger('change');

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
            url: `/admin/fungsionaris/${id}`,
            dataType: "JSON",
            success: function (response) {

                $('#showData').modal('show');

                $('#nameTable').empty();
                $('#jabatanTable').empty();
                $('#phoneTable').empty();
                $('#emailTable').empty();
                $('#gajiTable').empty();
                $('#periodeTable').empty();

                $('#nameTable').append(response.fungsionaris.name);
                $('#jabatanTable').append(response.fungsionaris.jabatan);
                $('#phoneTable').append(response.fungsionaris.phone);
                $('#emailTable').append(response.fungsionaris.email);
                $('#gajiTable').append(response.fungsionaris.gaji);
                $('#periodeTable').append(response.fungsionaris.periode);

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
                    url: `/admin/fungsionaris/delete`,
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
                url: '/admin/fungsionaris/table'
            },
            "saaSorting": [],
            "columns":
            [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'jabatan', name: 'jabatan' },
                { data: 'province', name: 'province' },
                { data: 'regencie', name: 'regencie' },
                { data: 'gaji', name: 'gaji' },
                { data: 'periode', name: 'periode' },
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
                url: "/admin/fungsionaris/import",
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
                url: "/admin/fungsionaris/export",
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
                url: "/admin/fungsionaris/create",
                data: "",
                dataType: "JSON",
                success: function (response) {
                    $('#createForm').trigger('reset');

                    $('#provinceCreate').select2({
                        multiple: false,
                        ajax: {
                            url: "/admin/fungsionaris/ambil/province",
                            type: 'post',
                            dataType: "JSON",
                            delay: 250,
                            data: function (params){
                                return {
                                    search: params.term
                                }
                            },
                            processResults: function(response){
                                return{
                                    results: response
                                }
                            },
                            cache: true
                        }
                    });

                    $('#regencieCreate').select2({
                        multiple: false,
                        ajax: {
                            url: "/admin/fungsionaris/ambil/regencie",
                            type: 'post',
                            dataType: "JSON",
                            delay: 250,
                            data: function (params){
                                return {
                                    search: params.term
                                }
                            },
                            processResults: function(response){
                                return{
                                    results: response
                                }
                            },
                            cache: true
                        }
                    });

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
                url: "/admin/fungsionaris/store",
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
                url: `/admin/fungsionaris/${id}`,
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
