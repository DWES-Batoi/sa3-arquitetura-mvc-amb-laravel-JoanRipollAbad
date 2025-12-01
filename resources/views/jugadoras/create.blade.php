@extends('layouts.app')

@section('title', 'Afegir nova jugadora')

@section('content')
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Afegir nova jugadora</h1>

    <form method="POST" action="{{ route('jugadoras.store') }}">
        @csrf

        <div class="mb-4">
            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('nom')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="equip" class="block text-sm font-medium text-gray-700">Equip</label>
            <input type="text" id="equip" name="equip" value="{{ old('equip') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('equip')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="posicio" class="block text-sm font-medium text-gray-700">Posició</label>
            <select id="posicio" name="posicio"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Selecciona una posició</option>
                <option value="Portera" {{ old('posicio') === 'Portera' ? 'selected' : '' }}>Portera</option>
                <option value="Defensa" {{ old('posicio') === 'Defensa' ? 'selected' : '' }}>Defensa</option>
                <option value="Migcampista" {{ old('posicio') === 'Migcampista' ? 'selected' : '' }}>Migcampista</option>
                <option value="Davantera" {{ old('posicio') === 'Davantera' ? 'selected' : '' }}>Davantera</option>
            </select>
            @error('posicio')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Guardar
            </button>
            <a href="{{ route('jugadoras.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Cancel·lar
            </a>
        </div>
    </form>
@endsection