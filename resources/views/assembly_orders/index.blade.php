@extends('layouts.app')

@section('title', 'Fichas de Montagem')

@section('header_actions')
    <a href="{{ route('fichas.create') }}" class="px-4 py-2 bg-brand-600 hover:bg-brand-500 text-white font-medium text-xs rounded-xl shadow-lg shadow-brand-600/30 flex items-center space-x-2 transition">
        <i class="fa-solid fa-plus"></i>
        <span>Nova Ficha</span>
    </a>
@endsection

@section('content')

    <!-- Filtros de Busca -->
    <div class="glass-card p-4 rounded-2xl">
        <form action="{{ route('fichas.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-4 gap-4">
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Buscar</label>
                <input type="text" name="busca" value="{{ request('busca') }}" placeholder="Controle, cliente ou CPF..." class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-brand-500">
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Loja</label>
                <select name="store_id" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                    <option value="">Todas as Lojas</option>
                    @foreach($lojas as $loja)
                        <option value="{{ $loja->id }}" {{ request('store_id') == $loja->id ? 'selected' : '' }}>{{ $loja->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Status</label>
                <select name="status" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                    <option value="">Todos os Status</option>
                    <option value="pendente" {{ request('status') === 'pendente' ? 'selected' : '' }}>Pendente</option>
                    <option value="em_montagem" {{ request('status') === 'em_montagem' ? 'selected' : '' }}>Em Montagem</option>
                    <option value="concluida" {{ request('status') === 'concluida' ? 'selected' : '' }}>Concluída</option>
                    <option value="cancelada" {{ request('status') === 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>

            <div class="flex items-end space-x-2">
                <button type="submit" class="w-full py-2 bg-slate-800 hover:bg-slate-700 text-white font-medium text-xs rounded-xl border border-slate-700 transition">
                    <i class="fa-solid fa-filter mr-1"></i> Filtrar
                </button>
                <a href="{{ route('fichas.index') }}" class="py-2 px-3 bg-slate-900 hover:bg-slate-800 text-slate-400 hover:text-white font-medium text-xs rounded-xl border border-slate-800 transition">
                    Limpar
                </a>
            </div>
        </form>
    </div>

    <!-- Tabela de Fichas -->
    <div class="glass-card rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900/80 border-b border-slate-800 text-slate-400 uppercase font-semibold">
                    <tr>
                        <th class="p-4">Nº Controle</th>
                        <th class="p-4">Loja</th>
                        <th class="p-4">Cliente</th>
                        <th class="p-4">Montador</th>
                        <th class="p-4">Data Montagem</th>
                        <th class="p-4">Valor Total</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($fichas as $ficha)
                        <tr class="hover:bg-slate-800/40 transition">
                            <td class="p-4 font-mono font-bold text-white">#{{ $ficha->numero_controle ?? $ficha->id }}</td>
                            <td class="p-4 text-slate-300">{{ $ficha->store->nome ?? '-' }}</td>
                            <td class="p-4 font-medium text-white">{{ $ficha->customer->nome ?? '-' }}</td>
                            <td class="p-4 text-slate-300">{{ $ficha->fitter->nome ?? 'Não atribuído' }}</td>
                            <td class="p-4 text-slate-400">{{ $ficha->data_montagem ? $ficha->data_montagem->format('d/m/Y') : '-' }}</td>
                            <td class="p-4 font-semibold text-white">R$ {{ number_format($ficha->valor_total, 2, ',', '.') }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-md text-[11px] font-medium
                                    {{ $ficha->status === 'concluida' ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30' : '' }}
                                    {{ $ficha->status === 'em_montagem' ? 'bg-amber-500/20 text-amber-400 border border-amber-500/30' : '' }}
                                    {{ $ficha->status === 'pendente' ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30' : '' }}
                                    {{ $ficha->status === 'cancelada' ? 'bg-rose-500/20 text-rose-400 border border-rose-500/30' : '' }}
                                ">
                                    {{ ucfirst(str_replace('_', ' ', $ficha->status)) }}
                                </span>
                            </td>
                            <td class="p-4 text-right space-x-1.5">
                                <a href="{{ route('fichas.print', $ficha->id) }}" target="_blank" title="Imprimir Ficha" class="px-2.5 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg transition inline-block">
                                    <i class="fa-solid fa-print"></i>
                                </a>
                                <a href="{{ route('fichas.show', $ficha->id) }}" title="Visualizar" class="px-2.5 py-1.5 bg-brand-600/20 text-brand-400 hover:bg-brand-600 hover:text-white rounded-lg transition inline-block">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('fichas.edit', $ficha->id) }}" title="Editar" class="px-2.5 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg transition inline-block">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center p-8 text-slate-500">Nenhuma ficha de montagem encontrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($fichas->hasPages())
            <div class="p-4 border-t border-slate-800">
                {{ $fichas->links() }}
            </div>
        @endif
    </div>

@endsection
