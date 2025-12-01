@extends('layouts.app')

@section('title', 'Guia de Partits')

@section('content')
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Guia de Partits</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
    @endif

    <p class="mb-4">
        <a href="{{ route('partits.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">+ Nou partit</a>
    </p>

    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-300 p-2">Local</th>
                <th class="border border-gray-300 p-2">Visitant</th>
                <th class="border border-gray-300 p-2">Data</th>
                <th class="border border-gray-300 p-2">Resultat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($partits as $partit)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 p-2">
                        <x-equip-mini :nom="$partit['equip_local']" />
                    </td>
                    <td class="border border-gray-300 p-2">
                        <x-equip-mini :nom="$partit['equip_visitant']" />
                    </td>
                    <td class="border border-gray-300 p-2">{{ $partit['data'] }}</td>
                    <td class="border border-gray-300 p-2">
                        @if($partit['gols_local'] !== null && $partit['gols_visitant'] !== null)
                            {{ $partit['gols_local'] }} - {{ $partit['gols_visitant'] }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="border border-gray-300 p-2 text-center">No hi ha partits registrats.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection