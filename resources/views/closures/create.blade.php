@extends('layouts.app')

@section('title', 'Novo Fechamento de Montador')

@section('content')

    <form action="{{ route('fechamentos.store') }}" method="POST" class="max-w-2xl mx-auto space-y-6">
        @csrf

        <div class="glass-card p-6 rounded-2xl space-y-4">
            <h3 class="font-heading font-semibold text-lg text-white border-b border-slate-800 pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-calculator text-emerald-400"></i>
                <span>Gerar Fechamento Financeiro</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Loja *</label>
                    <select name="store_id" required class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                        <option value="">Selecione a Loja...</option>
                        @foreach($lojas as $loja)
                            <option value="{{ $loja->id }}">{{ $loja->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Montador *</label>
                    <select name="fitter_id" required class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                        <option value="">Selecione o Montador...</option>
                        @foreach($montadores as $montador)
                            <option value="{{ $montador->id }}">{{ $montador->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Data Início do Período *</label>
                    <input type="date" name="periodo_inicio" required value="{{ date('Y-m-01') }}" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Data Fim do Período *</label>
                    <input type="date" name="periodo_fim" required value="{{ date('Y-m-t') }}" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-3">
            <a href="{{ route('fechamentos.index') }}" class="px-5 py-2.5 bg-slate-900 hover:bg-slate-800 text-slate-400 font-medium text-xs rounded-xl border border-slate-800 transition">Cancelar</a>
            <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-xs rounded-xl shadow-lg shadow-emerald-600/30 transition">Processar Fechamento</button>
        </div>
    </form>

@endsection
