<div>
    {{-- <a href="/brand/{{ $brand->nama_brand }}">
        <li class="radio">
            <label class="ui-check">
                <input type="radio" name="filter" onclick="window.location.assign('/brand/{{ $brand->nama_brand }}')"><i></i> {{ $brand->nama_brand }}
            </label>
        </li>
    </a> --}}
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
