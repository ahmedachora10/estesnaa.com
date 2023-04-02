<div>
    <x-dashboard.tables.table1 title="sidebar.products" :action="route('products.create')" :columns="['name', 'description', 'image', 'actions']">
        <tr>
            @forelse ($products as $product)
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                {{-- <td><img src="{{ $product->image }}" alt="{{ $product->name }}" srcset="{{ $product->image }}"></td> --}}
            @empty
                <td>{{ trans('table.empty') }}</td>
            @endforelse
        </tr>
    </x-dashboard.tables.table1>
</div>
