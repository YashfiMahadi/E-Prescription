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
            url: `/admin/dprd-kab-kota/${id}`,
            dataType: "JSON",
            success: function (response) {
                $('#createForm').trigger('reset');

                $('#id').val(id);

                $('#name').val(response.dprdKabKota.name);
                $('#phone').val(response.dprdKabKota.phone);
                $('#email').val(response.dprdKabKota.email);
                $('#gaji').val(response.dprdKabKota.gaji).trigger('change');
                $('#periode').val(response.dprdKabKota.periode);

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
                        url: "/admin/dprd-kab-kota/ambil/province",
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

                $('#province').val(response.dprdKabKota.province_id).trigger('change');

                $('#regencie').select2({
                    multiple: false,
                    ajax: {
                        url: "/admin/dprd-kab-kota/ambil/regencie",
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

                $('#regencie').val(response.dprdKabKota.regency_id).trigger('change');

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
            url: `/admin/dprd-kab-kota/${id}`,
            dataType: "JSON",
            success: function (response) {

                $('#showData').modal('show');

                $('#nameTable').empty();
                $('#tingkatTable').empty();
                $('#provinceTable').empty();
                $('#regencieTable').empty();
                $('#phoneTable').empty();
                $('#emailTable').empty();
                $('#gajiTable').empty();
                $('#periodeTable').empty();

                $('#nameTable').append(response.dprdKabKota.name);
                $('#tingkatTable').append(response.dprdKabKota.member_level);
                $('#provinceTable').append(response.dprdKabKota.province);
                $('#regencieTable').append(response.dprdKabKota.regencie);
                $('#phoneTable').append(response.dprdKabKota.phone);
                $('#emailTable').append(response.dprdKabKota.email);
                $('#gajiTable').append(response.dprdKabKota.gaji);
                $('#periodeTable').append(response.dprdKabKota.periode);

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
                    url: `/admin/dprd-kab-kota/delete`,
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
                url: '/admin/dprd-kab-kota/table'
            },
            "saaSorting": [],
            "columns":
            [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'member_level', name: 'member_levels.name' },
                { data: 'province', name: 'provinces.name' },
                { data: 'regencie', name: 'regencies.name' },
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
                url: "/admin/dprd-kab-kota/export",
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
                url: "/admin/dprd-kab-kota/create",
                data: "",
                dataType: "JSON",
                success: function (response) {
                    $('#createForm').trigger('reset');

                    $('#provinceCreate').select2({
                        multiple: false,
                        ajax: {
                            url: "/admin/dprd-kab-kota/ambil/province",
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
                            url: "/admin/dprd-kab-kota/ambil/regencie",
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
                url: "/admin/dprd-kab-kota/store",
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
                url: `/admin/dprd-kab-kota/${id}`,
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
