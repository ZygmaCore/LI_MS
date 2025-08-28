@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-6">Edit Lab</h1>

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-50 text-red-800 px-4 py-3">
                <p class="font-semibold mb-1">Please fix the following:</p>
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('labs.update', $lab) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="nama_lab" class="block text-sm font-medium text-gray-700">Lab Name</label>
                <input type="text" id="nama_lab" name="nama_lab" value="{{ old('nama_lab', $lab->nama_lab) }}"
                       class="mt-1 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                       required maxlength="255">
            </div>

            <div>
                <label for="lokasi" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $lab->lokasi) }}"
                       class="mt-1 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                       required maxlength="255">
            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                    Update
                </button>
                <a href="{{ route('labs.index') }}" class="px-4 py-2 rounded-lg border hover:bg-gray-50">Cancel</a>
            </div>
        </form>
    </div>
@endsection
