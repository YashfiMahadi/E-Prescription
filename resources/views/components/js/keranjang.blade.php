<script>
     // SECTION hapus data
     const deleteData = (id) => {
        Swal.fire({
            title: 'Apa anda yakin untuk Remove ini?',
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
                    url: `/admin/keranjang/${id}/delete`,
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
                url: '/admin/keranjang/table'
            },
            "saaSorting": [],
            "columns":
            [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'status', name: 'status' },
                { data: 'qty', name: 'qty' },
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

        // SECTION add
        $('#simpanResep').click(function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Please Wait!',
                showConfirmButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading()
                },
            });

            const formData  = new FormData($("#formObatTransaksi")[0]);

            $.ajax({
                type: "POST",
                url: "/admin/keranjang/simpan-resep",
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

    });
</script>
