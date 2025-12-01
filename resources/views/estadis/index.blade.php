@extends('layouts.app')

@section('title', 'Guia d\'Estadis')

@section('content')
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Guia d'Estadis</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
    @endif

    <p class="mb-4">
        <a href="{{ route('estadis.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">+ Nou estadi</a>
    </p>

    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-300 p-2">Nom</th>
                <th class="border border-gray-300 p-2">Ciutat</th>
                <th class="border border-gray-300 p-2">Aforament</th>
                <th class="border border-gray-300 p-2">Equip principal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($estadis as $key => $estadi)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 p-2">
                        <x-estadi
                            :nom="$estadi['nom']"
                            :ciutat="$estadi['ciutat']"
                            :aforament="$estadi['aforament']"
                            :equip="$estadi['equip']"
                        />
                    </td>
                    <td class="border border-gray-300 p-2">{{ $estadi['ciutat'] }}</td>
                    <td class="border border-gray-300 p-2">{{ $estadi['aforament'] }}</td>
                    <td class="border border-gray-300 p-2">{{ $estadi['equip'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="border border-gray-300 p-2 text-center">No hi ha estadis registrats.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection