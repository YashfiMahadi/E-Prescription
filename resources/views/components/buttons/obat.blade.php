@if ($stok !== '0.00')
<div class="border-checkbox-group border-checkbox-group-primary">
    <input class="border-checkbox" type="checkbox" id="checkbox{{ $id }}">
    <label class="border-checkbox-label" for="checkbox{{ $id }}">Pillih</label>
</div>
@else
<span class="bg-secondary rounded text-white px-2 py-1">
    Stok Habis
</span>
@endif
