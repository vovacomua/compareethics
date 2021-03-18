<form action="{{ route('search') }}" method="GET">
    <input type="text" name="search" required/>
    <button type="submit">Search</button>
</form>

@if($products->isNotEmpty())
    <table>
    @foreach ($products as $product)
        <tr>
            <td>
                <p>{{ $product->name }}</p>
            </td>
                <td>
                    @if($product->type)
                        <div>
                            <p>{{ $product->type->name }}</p>
                        </div>
                    @endif
                </td>
                <td>
                    @if($product->tags->isNotEmpty())
                        @foreach ($product->tags as $tag)
                            <div>
                                <p>{{ $tag->name }}</p>
                            </div>
                        @endforeach
                    @endif
                </td>
        </tr>
    @endforeach
    </table>
@else
    <div>
        <h3>No products found</h3>
    </div>
@endif
