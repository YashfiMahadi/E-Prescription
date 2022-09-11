<script>
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

    });
</script>
