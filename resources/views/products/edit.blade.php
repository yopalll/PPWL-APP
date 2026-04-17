@extends('layouts.app')

@section('title', 'Edit Product')

@section('page-title', 'Edit Product')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit Product</h2>

        @if ($errors->any())
            <div class="mb-4 rounded border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Product Name</label>
                <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ old('name', $product->name) }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Category</label>
                <input type="text" name="category" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ old('category', $product->category) }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Price</label>
                <input type="number" name="price" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ old('price', $product->price) }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Stock</label>
                <input type="number" name="stock" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ old('stock', $product->stock) }}" required>
            </div>
            <div class="flex justify-between">
                <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                    Back
                </a>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
