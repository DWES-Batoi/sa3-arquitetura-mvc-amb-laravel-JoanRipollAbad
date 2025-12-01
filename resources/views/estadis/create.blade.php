@extends('layouts.app')

@section('title', 'Afegir nou estadi')

@section('content')
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Afegir nou estadi</h1>

    <form method="POST" action="{{ route('estadis.store') }}">
        @csrf

        <div class="mb-4">
            <label for="nom" class="block text-sm font-medium text-gray-700">Nom de l'estadi</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('nom')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="ciutat" class="block text-sm font-medium text-gray-700">Ciutat</label>
            <input type="text" id="ciutat" name="ciutat" value="{{ old('ciutat') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('ciutat')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="aforament" class="block text-sm font-medium text-gray-700">Aforament</label>
            <input type="number" id="aforament" name="aforament" value="{{ old('aforament') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" min="0">
            @error('aforament')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="equip" class="block text-sm font-medium text-gray-700">Equip principal</label>
            <input type="text" id="equip" name="equip" value="{{ old('equip') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('equip')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Guardar
            </button>
            <a href="{{ route('estadis.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Cancel·lar
            </a>
        </div>
    </form>
@endsection