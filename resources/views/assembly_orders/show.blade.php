@extends('layouts.app')

@section('title', 'Detalhes da Ficha de Montagem #' . ($ficha->numero_controle ?? $ficha->id))

@section('header_actions')
    <div class="flex items-center space-x-2">
        <a href="{{ route('fichas.print', $ficha->id) }}" target="_blank" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white font-medium text-xs rounded-xl border border-slate-700 transition flex items-center space-x-2">
            <i class="fa-solid fa-print"></i>
            <span>Imprimir Ficha PDF</span>
        </a>
        <a href="{{ route('fichas.edit', $ficha->id) }}" class="px-4 py-2 bg-brand-600 hover:bg-brand-500 text-white font-medium text-xs rounded-xl shadow-lg shadow-brand-600/30 transition flex items-center space-x-2">
            <i class="fa-solid fa-pen"></i>
            <span>Editar Ficha</span>
        </a>
    </div>
@endsection

@section('content')

    <div class="max-w-4xl mx-auto space-y-6">
        
        <!-- Status & Cabeçalho -->
        <div class="glass-card p-6 rounded-2xl flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center space-x-3">
                    <h2 class="text-2xl font-heading font-bold text-white">Ficha #{{ $ficha->numero_controle ?? $ficha->id }}</h2>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                        {{ $ficha->status === 'concluida' ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30' : '' }}
                        {{ $ficha->status === 'em_montagem' ? 'bg-amber-500/20 text-amber-400 border border-amber-500/30' : '' }}
                        {{ $ficha->status === 'pendente' ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30' : '' }}
                    ">
                        {{ ucfirst(str_replace('_', ' ', $ficha->status)) }}
                    </span>
                </div>
                <p class="text-xs text-slate-400 mt-1">Registrado por {{ $ficha->user->name ?? 'Sistema' }} em {{ $ficha->created_at->format('d/m/Y H:i') }}</p>
            </div>

            <div class="text-left md:text-right bg-slate-900/80 p-3.5 rounded-xl border border-slate-800">
                <span class="text-xs font-medium text-slate-400 uppercase">Valor Total</span>
                <div class="text-2xl font-heading font-bold text-emerald-400">R$ {{ number_format($ficha->valor_total, 2, ',', '.') }}</div>
            </div>
        </div>

        <!-- Dados do Cliente e Loja -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="glass-card p-5 rounded-2xl space-y-3">
                <h3 class="font-heading font-semibold text-white border-b border-slate-800 pb-2 flex items-center space-x-2">
                    <i class="fa-solid fa-user text-brand-400"></i>
                    <span>Dados do Cliente</span>
                </h3>
                <div class="text-xs space-y-1.5 text-slate-300">
                    <div><strong class="text-slate-400">Nome:</strong> {{ $ficha->customer->nome ?? '-' }}</div>
                    <div><strong class="text-slate-400">CPF/CNPJ:</strong> {{ $ficha->customer->cpf_cnpj ?? '-' }}</div>
                    <div><strong class="text-slate-400">Telefone / Celular:</strong> {{ $ficha->customer->telefone ?? '-' }} {{ $ficha->customer->celular ? '/ '.$ficha->customer->celular : '' }}</div>
                    <div><strong class="text-slate-400">Endereço:</strong> {{ $ficha->customer->endereco ?? '-' }}, {{ $ficha->customer->numero ?? 'S/N' }} - {{ $ficha->customer->bairro ?? '-' }} ({{ $ficha->customer->cidade ?? '-' }})</div>
                </div>
            </div>

            <div class="glass-card p-5 rounded-2xl space-y-3">
                <h3 class="font-heading font-semibold text-white border-b border-slate-800 pb-2 flex items-center space-x-2">
                    <i class="fa-solid fa-store text-cyan-400"></i>
                    <span>Loja & Montagem</span>
                </h3>
                <div class="text-xs space-y-1.5 text-slate-300">
                    <div><strong class="text-slate-400">Loja de Origem:</strong> {{ $ficha->store->nome ?? '-' }}</div>
                    <div><strong class="text-slate-400">Montador Designado:</strong> {{ $ficha->fitter->nome ?? 'Pendente de Atribuição' }}</div>
                    <div><strong class="text-slate-400">Data Prevista de Montagem:</strong> {{ $ficha->data_montagem ? $ficha->data_montagem->format('d/m/Y') : 'Não informada' }}</div>
                    <div><strong class="text-slate-400">Observações:</strong> {{ $ficha->observacoes ?? 'Nenhuma observação informada.' }}</div>
                </div>
            </div>

        </div>

        <!-- Tabela de Itens -->
        <div class="glass-card p-6 rounded-2xl space-y-4">
            <h3 class="font-heading font-semibold text-lg text-white border-b border-slate-800 pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-boxes-stacked text-amber-400"></i>
                <span>Itens da Ficha</span>
            </h3>

            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900 border-b border-slate-800 text-slate-400 font-semibold uppercase">
                    <tr>
                        <th class="p-3">Descrição do Produto</th>
                        <th class="p-3">Cor</th>
                        <th class="p-3 text-center">Quantidade</th>
                        <th class="p-3 text-right">Valor Unitário</th>
                        <th class="p-3 text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @foreach($ficha->items as $item)
                        <tr>
                            <td class="p-3 font-medium text-white">{{ $item->descricao }}</td>
                            <td class="p-3 text-slate-400">{{ $item->cor ?? '-' }}</td>
                            <td class="p-3 text-center font-bold text-white">{{ $item->quantidade }}</td>
                            <td class="p-3 text-right text-slate-300">R$ {{ number_format($item->valor_unitario, 2, ',', '.') }}</td>
                            <td class="p-3 text-right font-semibold text-emerald-400">R$ {{ number_format($item->quantidade * $item->valor_unitario, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection
