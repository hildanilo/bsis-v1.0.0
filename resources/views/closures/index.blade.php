@extends('layouts.app')

@section('title', 'Fechamentos de Montadores')

@section('header_actions')
    <a href="{{ route('fechamentos.create') }}" class="px-4 py-2 bg-brand-600 hover:bg-brand-500 text-white font-medium text-xs rounded-xl shadow-lg shadow-brand-600/30 flex items-center space-x-2 transition">
        <i class="fa-solid fa-plus"></i>
        <span>Novo Fechamento</span>
    </a>
@endsection

@section('content')

    <div class="glass-card rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900/80 border-b border-slate-800 text-slate-400 uppercase font-semibold">
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Loja</th>
                        <th class="p-4">Montador</th>
                        <th class="p-4">Período</th>
                        <th class="p-4">Valor Total</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($fechamentos as $f)
                        <tr class="hover:bg-slate-800/40 transition">
                            <td class="p-4 font-mono font-bold text-white">#{{ $f->id }}</td>
                            <td class="p-4 text-slate-300">{{ $f->store->nome ?? '-' }}</td>
                            <td class="p-4 font-semibold text-white">{{ $f->fitter->nome ?? '-' }}</td>
                            <td class="p-4 text-slate-400">
                                {{ $f->periodo_inicio ? $f->periodo_inicio->format('d/m/Y') : '' }} - {{ $f->periodo_fim ? $f->periodo_fim->format('d/m/Y') : '' }}
                            </td>
                            <td class="p-4 font-bold text-emerald-400">R$ {{ number_format($f->valor_total, 2, ',', '.') }}</td>
                            <td class="p-4">
                                <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                                    {{ ucfirst($f->status) }}
                                </span>
                            </td>
                            <td class="p-4 text-right space-x-1">
                                <a href="{{ route('fechamentos.print', $f->id) }}" target="_blank" title="Imprimir Fechamento" class="px-2.5 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg transition inline-block">
                                    <i class="fa-solid fa-print"></i>
                                </a>
                                <a href="{{ route('fechamentos.show', $f->id) }}" class="px-2.5 py-1.5 bg-brand-600/20 text-brand-400 hover:bg-brand-600 hover:text-white rounded-lg transition inline-block">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center p-8 text-slate-500">Nenhum fechamento registrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
