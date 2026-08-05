@extends('layouts.app')

@section('title', 'Detalhes do Fechamento #' . $fechamento->id)

@section('header_actions')
    <a href="{{ route('fechamentos.print', $fechamento->id) }}" target="_blank" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white font-medium text-xs rounded-xl border border-slate-700 transition flex items-center space-x-2">
        <i class="fa-solid fa-print"></i>
        <span>Imprimir Relatório</span>
    </a>
@endsection

@section('content')

    <div class="max-w-4xl mx-auto space-y-6">

        <div class="glass-card p-6 rounded-2xl flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-heading font-bold text-white">Fechamento #{{ $fechamento->id }}</h2>
                <div class="text-xs text-slate-400 mt-1">
                    Loja: <strong class="text-slate-200">{{ $fechamento->store->nome ?? '-' }}</strong> &bull; 
                    Montador: <strong class="text-slate-200">{{ $fechamento->fitter->nome ?? '-' }}</strong>
                </div>
                <div class="text-xs text-slate-400 mt-0.5">
                    Período: {{ $fechamento->periodo_inicio ? $fechamento->periodo_inicio->format('d/m/Y') : '' }} até {{ $fechamento->periodo_fim ? $fechamento->periodo_fim->format('d/m/Y') : '' }}
                </div>
            </div>

            <div class="bg-slate-900/80 p-3.5 rounded-xl border border-slate-800 text-right">
                <span class="text-xs font-medium text-slate-400 uppercase">Valor Total do Fechamento</span>
                <div class="text-2xl font-heading font-bold text-emerald-400">R$ {{ number_format($fechamento->valor_total, 2, ',', '.') }}</div>
            </div>
        </div>

        <div class="glass-card p-6 rounded-2xl space-y-4">
            <h3 class="font-heading font-semibold text-lg text-white border-b border-slate-800 pb-3">Fichas Incluídas neste Fechamento</h3>

            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900 border-b border-slate-800 text-slate-400 uppercase">
                    <tr>
                        <th class="p-3">Nº Controle</th>
                        <th class="p-3">Cliente</th>
                        <th class="p-3">Data</th>
                        <th class="p-3 text-right">Valor</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @forelse($fechamento->assemblyOrders as $ficha)
                        <tr>
                            <td class="p-3 font-mono font-bold text-white">#{{ $ficha->numero_controle ?? $ficha->id }}</td>
                            <td class="p-3 text-slate-200">{{ $ficha->customer->nome ?? '-' }}</td>
                            <td class="p-3 text-slate-400">{{ $ficha->created_at->format('d/m/Y') }}</td>
                            <td class="p-3 text-right font-semibold text-emerald-400">R$ {{ number_format($ficha->valor_total, 2, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-6 text-slate-500">Nenhuma ficha vinculada a este fechamento.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

@endsection
