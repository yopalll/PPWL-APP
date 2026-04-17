@extends('layouts.app')

@section('title', 'Users Management')

@section('page-title', 'Users Management')

@section('content')
    <div class="flex justify-between items-center mb-6 bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded-lg shadow">
        <h2 class="text-2xl font-bold">Users</h2>
        <div>
            <a href="{{ route('users.create') }}" class="bg-white text-purple-500 hover:bg-gray-200 px-4 py-2 rounded shadow font-semibold">
                <i class="fas fa-plus mr-2"></i> Add User
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded border border-green-200 bg-green-50 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <!-- Users Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-4 bg-gradient-to-r from-gray-100 to-gray-300 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">User List</h3>
        </div>
        <div class="p-4 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Created At</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ optional($user->created_at)->format('d M Y H:i') }}</td>
                            <td class="px-6 py-4 text-sm font-medium">
                                <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:text-blue-800 mr-3">Edit</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-sm text-center text-gray-500">Belum ada data user.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection