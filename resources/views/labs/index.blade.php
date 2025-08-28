@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold">Labs</h1>
            <a href="{{ route('labs.create') }}"
               class="inline-flex items-center px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                + New Lab
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 rounded-lg bg-green-50 text-green-800 px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        @if($labs->isEmpty())
            <div class="rounded-lg border border-dashed p-10 text-center text-gray-600">
                No labs yet. Click <span class="font-semibold">New Lab</span> to create one.
            </div>
        @else
            <div class="overflow-x-auto rounded-lg border">
                <table class="min-w-full divide-y">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">#</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Lab Name</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Location</th>
                        <th class="px-4 py-3 text-right text-sm font-medium text-gray-600">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y">
                    @foreach ($labs as $lab)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $lab->id }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900 font-medium">{{ $lab->nama_lab }}</td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $lab->lokasi }}</td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('labs.edit', $lab) }}"
                                       class="px-3 py-1.5 rounded-md border text-gray-700 hover:bg-gray-100">
                                        Edit
                                    </a>
                                    <form action="{{ route('labs.destroy', $lab) }}" method="POST"
                                          onsubmit="return confirm('Delete this lab? This cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1.5 rounded-md bg-red-600 text-white hover:bg-red-700">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
