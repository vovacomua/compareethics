<html>
<body>

<form action="{{ route('search') }}" method="GET">
    <input type="text" name="search" required/>
    <button type="submit">Search</button>
</form>

@if($products->isNotEmpty())
    <table border="1px">
        <tr>
            <th>Name</th><th>Type</th><th>Tags</th>
        </tr>
    @foreach ($products as $product)
        <tr>
            <td>
                {{ $product->name }}
            </td>
                <td>
                    @if($product->type)
                        <div>
                            {{ $product->type->name }}
                        </div>
                    @endif
                </td>
                <td>
                    @if($product->tags->isNotEmpty())
                        <ul>
                        @foreach ($product->tags as $tag)
                            <li>{{ $tag->name }}</li>
                        @endforeach
                        </ul>
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

</body>
</html>
