@if ($paginator->hasPages())
<ul class="pagination">

    <!-- BEGIN PREV -->
    @if ($paginator->onFirstPage())
    <li>
        <a href aria-label="Previous" style="cursor: auto;">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>
    @else
    <li wire:click.prevent="previousPage">
        <a href aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>
    @endif
    <!-- END PREV -->

    <!-- BEGIN NUMBERS -->
    @foreach ($elements as $element)
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li wire:click.prevent="gotoPage({{ $page }})" class="active"><a>{{ $page }}</a></li>
                @else
                    <li wire:click.prevent="gotoPage({{ $page }})"><a>{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    <!--END NUMBERS -->

    <!-- BEGIN NEXT -->
    @if ($paginator->hasMorePages())
    <li wire:click.prevent="nextPage">
        <a href aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
    @else
    <li>
        <a href aria-label="Next" style="cursor: auto;">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
    @endif
    <!-- END NEXT -->

</ul>
@endif