@extends('layouts.app')

@section('title', 'Rede de Lojas')

@section('header_actions')
    <a href="{{ route('lojas.create') }}" class="px-4 py-2 bg-brand-600 hover:bg-brand-500 text-white font-medium text-xs rounded-xl shadow-lg shadow-brand-600/30 flex items-center space-x-2 transition">
        <i class="fa-solid fa-store"></i>
        <span>Nova Loja</span>
    </a>
@endsection

@section('content')

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($lojas as $loja)
            <div class="glass-card p-5 rounded-2xl space-y-3 glass-card-hover">
                <div class="flex items-center justify-between">
                    <h3 class="font-heading font-bold text-lg text-white">{{ $loja->nome }}</h3>
                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold uppercase {{ $loja->status ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30' : 'bg-slate-800 text-slate-500' }}">
                        {{ $loja->status ? 'Ativa' : 'Inativa' }}
                    </span>
                </div>
                <div class="text-xs space-y-1 text-slate-300">
                    <div><i class="fa-solid fa-location-dot w-4 text-brand-400"></i> {{ $loja->cidade ?? 'Cidade não cadastrada' }}</div>
                    <div><i class="fa-solid fa-map-pin w-4 text-slate-400"></i> {{ $loja->endereco ?? 'Sem endereço' }}</div>
                    <div><i class="fa-solid fa-phone w-4 text-slate-400"></i> {{ $loja->telefone ?? 'Sem telefone' }}</div>
                </div>
                <div class="pt-3 border-t border-slate-800 flex justify-end">
                    <a href="{{ route('lojas.edit', $loja->id) }}" class="text-xs text-brand-400 hover:underline">Editar Dados &rarr;</a>
                </div>
            </div>
        @empty
            <div class="col-span-full glass-card p-8 text-center text-slate-500 text-xs">Nenhuma loja cadastrada.</div>
        @endforelse
    </div>

@endsection
