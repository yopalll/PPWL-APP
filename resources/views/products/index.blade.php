@extends('layouts.app')

@section('title', 'Products Management')

@section('page-title', 'Products Management')

@section('content')
    <div class="flex justify-between items-center mb-6 bg-gradient-to-r from-blue-500 to-indigo-500 text-white p-4 rounded-lg shadow">
        <h2 class="text-2xl font-bold">Products</h2>
        <div>
            <a href="{{ route('products.create') }}" class="bg-white text-blue-500 hover:bg-gray-200 px-4 py-2 rounded shadow font-semibold">
                <i class="fas fa-plus mr-2"></i> Add Product
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded border border-green-200 bg-green-50 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <!-- Products Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-4 bg-gradient-to-r from-gray-100 to-gray-300 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Product List</h3>
        </div>
        <div class="p-4 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Stock</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($products as $product)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $product->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $product->category ?: '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $product->stock }}</td>
                            <td class="px-6 py-4">
                                @if ($product->stock > 0)
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">In Stock</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Out of Stock</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm font-medium">
                                <a href="{{ route('products.edit', $product) }}" class="text-blue-600 hover:text-blue-800 mr-3">Edit</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-sm text-center text-gray-500">Belum ada data produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection