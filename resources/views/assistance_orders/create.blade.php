@extends('layouts.app')

@section('title', 'Nova Assistência Técnica')

@section('content')

    <form action="{{ route('assistencias.store') }}" method="POST" class="max-w-2xl mx-auto space-y-6">
        @csrf

        <div class="glass-card p-6 rounded-2xl space-y-4">
            <h3 class="font-heading font-semibold text-lg text-white border-b border-slate-800 pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-wrench text-rose-400"></i>
                <span>Registrar Assistência Técnica</span>
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
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Cliente *</label>
                    <select name="customer_id" required class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                        <option value="">Selecione o Cliente...</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Montador Designado</label>
                    <select name="fitter_id" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                        <option value="">A definir</option>
                        @foreach($montadores as $montador)
                            <option value="{{ $montador->id }}">{{ $montador->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Status *</label>
                    <select name="status" required class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                        <option value="pendente">Pendente</option>
                        <option value="em_atendimento">Em Atendimento</option>
                        <option value="concluida">Concluída</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Defeito Reclamado / Problema *</label>
                <textarea name="defeito" rows="3" required placeholder="Descreva a peça danificada ou defeito..." class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500"></textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Solução Aplicada (Opcional)</label>
                <textarea name="solucao" rows="2" placeholder="Observações de troca ou reparo..." class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500"></textarea>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-3">
            <a href="{{ route('assistencias.index') }}" class="px-5 py-2.5 bg-slate-900 hover:bg-slate-800 text-slate-400 font-medium text-xs rounded-xl border border-slate-800 transition">Cancelar</a>
            <button type="submit" class="px-6 py-2.5 bg-rose-600 hover:bg-rose-500 text-white font-semibold text-xs rounded-xl shadow-lg shadow-rose-600/30 transition">Salvar Assistência</button>
        </div>
    </form>

@endsection
