@extends('layouts.app')

@section('title', 'Assistências Técnicas')

@section('header_actions')
    <a href="{{ route('assistencias.create') }}" class="px-4 py-2 bg-rose-600 hover:bg-rose-500 text-white font-medium text-xs rounded-xl shadow-lg shadow-rose-600/30 flex items-center space-x-2 transition">
        <i class="fa-solid fa-plus"></i>
        <span>Nova Assistência</span>
    </a>
@endsection

@section('content')

    <div class="glass-card rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900/80 border-b border-slate-800 text-slate-400 uppercase font-semibold">
                    <tr>
                        <th class="p-4">Loja</th>
                        <th class="p-4">Cliente</th>
                        <th class="p-4">Defeito Reclamado</th>
                        <th class="p-4">Montador</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($assistencias as $item)
                        <tr class="hover:bg-slate-800/40 transition">
                            <td class="p-4 text-slate-300 font-medium">{{ $item->store->nome ?? '-' }}</td>
                            <td class="p-4 font-semibold text-white">{{ $item->customer->nome ?? '-' }}</td>
                            <td class="p-4 text-slate-300 max-w-xs truncate">{{ $item->defeito }}</td>
                            <td class="p-4 text-slate-400">{{ $item->fitter->nome ?? 'Não atribuído' }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-md text-[11px] font-medium bg-rose-500/20 text-rose-400 border border-rose-500/30">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="p-4 text-right space-x-1">
                                <a href="{{ route('assistencias.edit', $item->id) }}" class="px-2.5 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg transition inline-block">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center p-8 text-slate-500">Nenhuma assistência técnica cadastrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
