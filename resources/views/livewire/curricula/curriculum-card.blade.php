<div class="border p-4 rounded mb-4">
    <h4 class="text-lg font-bold">{{ $curriculum->title }}</h4>
    <p class="text-sm text-gray-600 mb-2">{{ $curriculum->description }}</p>

    @if ($curriculum->file_path)
        <a href="{{ asset('storage/' . $curriculum->file_path) }}" target="_blank"
            class="inline-flex items-center px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            View PDF
        </a>
    @endif

    <p class="text-xs text-gray-400 mt-2">
        Submitted by {{ $curriculum->user->name ?? 'Unknown' }} on {{ $curriculum->created_at->format('M d, Y') }}
    </p>
</div>