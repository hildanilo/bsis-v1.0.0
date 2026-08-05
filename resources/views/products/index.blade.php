@extends('layouts.app')

@section('title', 'Catálogo de Produtos')

@section('header_actions')
    <a href="{{ route('produtos.create') }}" class="px-4 py-2 bg-brand-600 hover:bg-brand-500 text-white font-medium text-xs rounded-xl shadow-lg shadow-brand-600/30 flex items-center space-x-2 transition">
        <i class="fa-solid fa-plus"></i>
        <span>Novo Produto</span>
    </a>
@endsection

@section('content')

    <div class="glass-card rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900/80 border-b border-slate-800 text-slate-400 uppercase font-semibold">
                    <tr>
                        <th class="p-4">Código</th>
                        <th class="p-4">Descrição</th>
                        <th class="p-4">Cor Padrão</th>
                        <th class="p-4">Valor Padrão</th>
                        <th class="p-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($produtos as $produto)
                        <tr class="hover:bg-slate-800/40 transition">
                            <td class="p-4 font-mono text-slate-400 font-bold">{{ $produto->codigo ?? '-' }}</td>
                            <td class="p-4 font-semibold text-white">{{ $produto->descricao }}</td>
                            <td class="p-4 text-slate-300">{{ $produto->cor ?? '-' }}</td>
                            <td class="p-4 font-semibold text-emerald-400">R$ {{ number_format($produto->valor_padrao, 2, ',', '.') }}</td>
                            <td class="p-4 text-right space-x-1">
                                <a href="{{ route('produtos.edit', $produto->id) }}" class="px-2.5 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg transition inline-block">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-8 text-slate-500">Nenhum produto cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
