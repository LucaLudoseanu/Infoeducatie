@extends('layouts.app')

@section('title', 'Edit Event')

@section('content_header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Event') }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="rounded-container">
            <div class="p-6 text-gray-900">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-md">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('events.update', $event) }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                            :value="old('title', $event->title)" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    {{-- Description --}}
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description" rows="6"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            required>{{ old('description', $event->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    {{-- Time --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="start_time" :value="__('Start Time')" />
                            <x-text-input id="start_time" name="start_time" type="datetime-local"
                                class="mt-1 block w-full"
                                :value="old('start_time', $event->start_time->format('Y-m-d\TH:i'))" required />
                            <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="end_time" :value="__('End Time')" />
                            <x-text-input id="end_time" name="end_time" type="datetime-local"
                                class="mt-1 block w-full"
                                :value="old('end_time', $event->end_time->format('Y-m-d\TH:i'))" required />
                            <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
                        </div>
                    </div>

                    {{-- Tags --}}
                    <div>
                        <x-input-label for="tags" :value="__('Tags')" />
                        <select id="tags" name="tags[]" multiple
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" {{ in_array($tag->id, $eventTags) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                        <p class="mt-1 text-xs text-gray-500">Hold Ctrl (Cmd on Mac) to select/deselect multiple tags</p>
                        <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                    </div>

                    {{-- Curriculum --}}
                    <div class="border-t pt-6">
                        <h3 class="text-lg font-semibold mb-4">Curriculum (optional)</h3>

                        <div class="mb-4">
                            <x-input-label for="curriculum_title" :value="__('Curriculum Title')" />
                            <x-text-input id="curriculum_title" name="curriculum_title" type="text"
                                class="mt-1 block w-full"
                                :value="old('curriculum_title', $event->curriculum->title ?? '')" />
                            <x-input-error :messages="$errors->get('curriculum_title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="curriculum_description" :value="__('Curriculum Description')" />
                            <textarea id="curriculum_description" name="curriculum_description" rows="3"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('curriculum_description', $event->curriculum->description ?? '') }}</textarea>
                            <x-input-error :messages="$errors->get('curriculum_description')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="curriculum_file" :value="__('Upload New PDF (optional)')" />
                            <input type="file" name="curriculum_file" id="curriculum_file" accept="application/pdf"
                                class="mt-1">
                            <x-input-error :messages="$errors->get('curriculum_file')" class="mt-2" />

                            @if($event->curriculum && $event->curriculum->file_path)
                                <p class="text-sm text-gray-600 mt-2">
                                    Current file:
                                    <a href="{{ asset('storage/' . $event->curriculum->file_path) }}"
                                        class="text-blue-600 underline" target="_blank">View PDF</a>
                                </p>

                                <div class="mt-3">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="remove_curriculum" value="1"
                                            class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                        <span class="ml-2 text-sm text-red-600 font-medium">Delete uploaded curriculum</span>
                                    </label>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="flex items-center justify-end gap-4">
                        <a href="{{ route('events.show', $event) }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-400">
                            Cancel
                        </a>

                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                            Update Event
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
