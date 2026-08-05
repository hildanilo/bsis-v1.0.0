@extends('layouts.app')

@section('title', 'Gestão de Clientes')

@section('header_actions')
    <a href="{{ route('clientes.create') }}" class="px-4 py-2 bg-brand-600 hover:bg-brand-500 text-white font-medium text-xs rounded-xl shadow-lg shadow-brand-600/30 flex items-center space-x-2 transition">
        <i class="fa-solid fa-user-plus"></i>
        <span>Novo Cliente</span>
    </a>
@endsection

@section('content')

    <div class="glass-card p-4 rounded-2xl mb-4">
        <form action="{{ route('clientes.index') }}" method="GET" class="flex gap-3">
            <input type="text" name="busca" value="{{ request('busca') }}" placeholder="Nome, CPF/CNPJ, telefone ou e-mail..." class="flex-1 px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-brand-500">
            <button type="submit" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white font-medium text-xs rounded-xl border border-slate-700 transition">Buscar</button>
        </form>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900/80 border-b border-slate-800 text-slate-400 uppercase font-semibold">
                    <tr>
                        <th class="p-4">Nome</th>
                        <th class="p-4">CPF/CNPJ</th>
                        <th class="p-4">Telefone</th>
                        <th class="p-4">E-mail</th>
                        <th class="p-4">Cidade / Bairro</th>
                        <th class="p-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($clientes as $cliente)
                        <tr class="hover:bg-slate-800/40 transition">
                            <td class="p-4 font-semibold text-white">{{ $cliente->nome }}</td>
                            <td class="p-4 text-slate-400 font-mono">{{ $cliente->cpf_cnpj ?? '-' }}</td>
                            <td class="p-4 text-slate-300">{{ $cliente->telefone ?? $cliente->celular ?? '-' }}</td>
                            <td class="p-4 text-slate-400">{{ $cliente->email ?? '-' }}</td>
                            <td class="p-4 text-slate-300">{{ $cliente->cidade ?? '-' }} {{ $cliente->bairro ? '('.$cliente->bairro.')' : '' }}</td>
                            <td class="p-4 text-right space-x-1">
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="px-2.5 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg transition inline-block">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center p-8 text-slate-500">Nenhum cliente cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($clientes->hasPages())
            <div class="p-4 border-t border-slate-800">
                {{ $clientes->links() }}
            </div>
        @endif
    </div>

@endsection
