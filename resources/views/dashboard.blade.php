@extends('layouts.app')

@section('title', 'Painel Geral de Controle')

@section('header_actions')
    <a href="{{ route('fichas.create') }}" class="px-4 py-2 bg-brand-600 hover:bg-brand-500 text-white font-medium text-xs rounded-xl shadow-lg shadow-brand-600/30 flex items-center space-x-2 transition">
        <i class="fa-solid fa-plus"></i>
        <span>Nova Ficha de Móveis</span>
    </a>
@endsection

@section('content')

    <!-- Cards de Métricas Principais -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <div class="glass-card p-5 rounded-2xl glass-card-hover flex items-center justify-between">
            <div class="space-y-1">
                <span class="text-xs font-medium text-slate-400">Total de Montagens</span>
                <div class="text-3xl font-heading font-bold text-white">{{ $totalMontagens }}</div>
                <span class="text-xs text-emerald-400"><i class="fa-solid fa-layer-group mr-1"></i> Fichas registradas</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-clipboard-list"></i>
            </div>
        </div>

        <div class="glass-card p-5 rounded-2xl glass-card-hover flex items-center justify-between">
            <div class="space-y-1">
                <span class="text-xs font-medium text-slate-400">Montagens em Andamento</span>
                <div class="text-3xl font-heading font-bold text-amber-400">{{ $montagensEmAndamento }}</div>
                <span class="text-xs text-amber-400/80"><i class="fa-solid fa-clock mr-1"></i> {{ $montagensPendentes }} pendentes</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-500/10 border border-amber-500/20 text-amber-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-truck-ramp-box"></i>
            </div>
        </div>

        <div class="glass-card p-5 rounded-2xl glass-card-hover flex items-center justify-between">
            <div class="space-y-1">
                <span class="text-xs font-medium text-slate-400">Assistências Técnicas</span>
                <div class="text-3xl font-heading font-bold text-rose-400">{{ $assistenciasPendentes }}</div>
                <span class="text-xs text-rose-400/80"><i class="fa-solid fa-triangle-exclamation mr-1"></i> Aguardando atendimento</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-rose-500/10 border border-rose-500/20 text-rose-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-wrench"></i>
            </div>
        </div>

        <div class="glass-card p-5 rounded-2xl glass-card-hover flex items-center justify-between">
            <div class="space-y-1">
                <span class="text-xs font-medium text-slate-400">Rede de Lojas & Equipe</span>
                <div class="text-3xl font-heading font-bold text-cyan-400">{{ $totalLojas }} <span class="text-sm font-normal text-slate-400">lojas</span></div>
                <span class="text-xs text-cyan-400/80"><i class="fa-solid fa-user-gear mr-1"></i> {{ $totalMontadores }} montadores ativos</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-store"></i>
            </div>
        </div>

    </div>

    <!-- Seções de Atividades Recentes -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Fichas de Montagem Recentes -->
        <div class="glass-card rounded-2xl p-5 space-y-4">
            <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                <div class="flex items-center space-x-2">
                    <i class="fa-solid fa-clipboard-check text-brand-400"></i>
                    <h3 class="font-heading font-semibold text-white">Últimas Fichas de Montagem</h3>
                </div>
                <a href="{{ route('fichas.index') }}" class="text-xs text-brand-400 hover:underline">Ver Todas &rarr;</a>
            </div>

            <div class="space-y-3">
                @forelse($fichasRecentes as $ficha)
                    <div class="p-3.5 rounded-xl bg-slate-900/60 border border-slate-800/80 flex items-center justify-between">
                        <div>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold text-sm text-white">#{{ $ficha->numero_controle ?? $ficha->id }}</span>
                                <span class="text-xs px-2 py-0.5 rounded-md font-medium
                                    {{ $ficha->status === 'concluida' ? 'bg-emerald-500/20 text-emerald-400' : '' }}
                                    {{ $ficha->status === 'em_montagem' ? 'bg-amber-500/20 text-amber-400' : '' }}
                                    {{ $ficha->status === 'pendente' ? 'bg-blue-500/20 text-blue-400' : '' }}
                                ">
                                    {{ ucfirst(str_replace('_', ' ', $ficha->status)) }}
                                </span>
                            </div>
                            <div class="text-xs text-slate-400 mt-1">
                                <i class="fa-regular fa-user mr-1"></i> {{ $ficha->customer->nome ?? 'Cliente' }} &bull; 
                                <i class="fa-solid fa-store mr-1"></i> {{ $ficha->store->nome ?? 'Loja' }}
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-sm font-semibold text-white">R$ {{ number_format($ficha->valor_total, 2, ',', '.') }}</div>
                            <a href="{{ route('fichas.show', $ficha->id) }}" class="text-xs text-brand-400 hover:text-brand-300">Detalhes</a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-6 text-xs text-slate-500">Nenhuma ficha recente cadastrada.</div>
                @endforelse
            </div>
        </div>

        <!-- Assistências Técnicas Recentes -->
        <div class="glass-card rounded-2xl p-5 space-y-4">
            <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                <div class="flex items-center space-x-2">
                    <i class="fa-solid fa-screwdriver-wrench text-rose-400"></i>
                    <h3 class="font-heading font-semibold text-white">Assistências Pendentes</h3>
                </div>
                <a href="{{ route('assistencias.index') }}" class="text-xs text-rose-400 hover:underline">Ver Todas &rarr;</a>
            </div>

            <div class="space-y-3">
                @forelse($assistenciasRecentes as $assistencia)
                    <div class="p-3.5 rounded-xl bg-slate-900/60 border border-slate-800/80 flex items-center justify-between">
                        <div>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold text-sm text-white">{{ $assistencia->customer->nome ?? 'Cliente' }}</span>
                                <span class="text-xs px-2 py-0.5 rounded-md font-medium bg-rose-500/20 text-rose-400">
                                    {{ ucfirst($assistencia->status) }}
                                </span>
                            </div>
                            <div class="text-xs text-slate-400 mt-1 truncate max-w-xs">
                                Defeito: {{ $assistencia->defeito }}
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-xs text-slate-400"><i class="fa-solid fa-store mr-1"></i> {{ $assistencia->store->nome ?? '-' }}</div>
                            <a href="{{ route('assistencias.edit', $assistencia->id) }}" class="text-xs text-slate-300 hover:text-white">Editar</a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-6 text-xs text-slate-500">Nenhuma assistência pendente registrada.</div>
                @endforelse
            </div>
        </div>

    </div>

@endsection
