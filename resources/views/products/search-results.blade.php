<table style="width:100%" class="table table-hover non-hover">
    @if (isset($results) && count($results) > 0)
        @foreach( $results as $key => $product )
        <tr style='cursor: pointer; cursor: hand;' onclick="window.location='{{ route('viewSingleProduct', $product->slug) }}';">
            <td><a href="{{ route('viewSingleProduct', $product->slug) }}">{{ $product->name }}</a></td>
        </tr>
        @endforeach
    @else
        <tr>
            <td>No match found</td>
        </tr>
    @endif
</table>