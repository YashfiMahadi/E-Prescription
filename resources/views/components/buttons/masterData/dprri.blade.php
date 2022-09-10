<a href="javascript:void(0)" class="mx-1" onClick="show({{ $id }})" data-toggle="tooltip" data-placement="top" title="Lihat Data">
    <i class="fa fa-eye text-primary" style="font-size: 1.7rem"></i>
</a>

<a href="javascript:void(0)" class="mx-1" onClick="edit({{ $id }})" data-toggle="tooltip" data-placement="top" title="Ubah Data">
    <i class="fa fa-pencil text-warning" style="font-size: 1.7rem"></i>
</a>

@if($canDelete == 0)
    <a href="javascript:void(0)" class="mx-1" onClick="deleteData({{ $id }})" data-toggle="tooltip" data-placement="top" title="Hapus Data">
        <i class="fa fa-trash text-danger" style="font-size: 1.7rem"></i>
    </a>
@endif
