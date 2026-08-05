@extends('layouts.app')

@section('title', 'Montadores')

@section('header_actions')
    <a href="{{ route('montadores.create') }}" class="px-4 py-2 bg-brand-600 hover:bg-brand-500 text-white font-medium text-xs rounded-xl shadow-lg shadow-brand-600/30 flex items-center space-x-2 transition">
        <i class="fa-solid fa-user-gear"></i>
        <span>Novo Montador</span>
    </a>
@endsection

@section('content')

    <div class="glass-card rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900/80 border-b border-slate-800 text-slate-400 uppercase font-semibold">
                    <tr>
                        <th class="p-4">Nome do Montador</th>
                        <th class="p-4">Telefone</th>
                        <th class="p-4">CPF</th>
                        <th class="p-4">Comissão (%)</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($montadores as $montador)
                        <tr class="hover:bg-slate-800/40 transition">
                            <td class="p-4 font-semibold text-white">{{ $montador->nome }}</td>
                            <td class="p-4 text-slate-300">{{ $montador->telefone ?? '-' }}</td>
                            <td class="p-4 text-slate-400 font-mono">{{ $montador->cpf ?? '-' }}</td>
                            <td class="p-4 font-bold text-cyan-400">{{ number_format($montador->percentual_comissao, 2, ',', '.') }}%</td>
                            <td class="p-4">
                                <span class="px-2 py-0.5 rounded text-[11px] font-semibold {{ $montador->status ? 'bg-emerald-500/20 text-emerald-400' : 'bg-slate-800 text-slate-500' }}">
                                    {{ $montador->status ? 'Ativo' : 'Inativo' }}
                                </span>
                            </td>
                            <td class="p-4 text-right space-x-1">
                                <a href="{{ route('montadores.edit', $montador->id) }}" class="px-2.5 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg transition inline-block">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center p-8 text-slate-500">Nenhum montador cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
