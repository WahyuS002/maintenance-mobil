<div>
    <li class="radio" wire:click="allFilter">
        <label for="" class="ui-check">
            <input type="radio" name="filter" id=""><i></i>Semua
        </label>
    </li>
    @foreach ($brands as $brand)
    <li class="radio" wire:click="filter({{ $brand->id }})">
        <label for="" class="ui-check">
            <input type="radio" name="filter" id=""><i></i>{{ $brand->nama_brand }}
        </label>
    </li>
    @endforeach
</div>
