@extends('layouts.app')

@section('title', 'Afegir nou partit')

@section('content')
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Afegir nou partit</h1>

    <form method="POST" action="{{ route('partits.store') }}">
        @csrf

        <div class="mb-4">
            <label for="equip_local" class="block text-sm font-medium text-gray-700">Equip local</label>
            <input type="text" id="equip_local" name="equip_local" value="{{ old('equip_local') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('equip_local')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="equip_visitant" class="block text-sm font-medium text-gray-700">Equip visitant</label>
            <input type="text" id="equip_visitant" name="equip_visitant" value="{{ old('equip_visitant') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('equip_visitant')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="data" class="block text-sm font-medium text-gray-700">Data</label>
            <input type="date" id="data" name="data"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('data')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="resultat" class="block text-sm font-medium text-gray-700">Resultat (opcional, format: 2-1)</label>
            <input type="text" id="resultat" name="resultat" value="{{ old('resultat') }}"
                   placeholder="Ex: 2-1"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('resultat')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Guardar
            </button>
            <a href="{{ route('partits.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Cancel·lar
            </a>
        </div>
    </form>
@endsection