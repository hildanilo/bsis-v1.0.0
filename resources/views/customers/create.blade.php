@extends('layouts.app')

@section('title', 'Novo Cliente')

@section('content')

    <form action="{{ route('clientes.store') }}" method="POST" class="max-w-2xl mx-auto space-y-6">
        @csrf

        <div class="glass-card p-6 rounded-2xl space-y-4">
            <h3 class="font-heading font-semibold text-lg text-white border-b border-slate-800 pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-user-plus text-brand-400"></i>
                <span>Dados do Cliente</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Nome Completo *</label>
                    <input type="text" name="nome" required value="{{ old('nome') }}" placeholder="Nome do cliente" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">CPF / CNPJ</label>
                    <input type="text" name="cpf_cnpj" value="{{ old('cpf_cnpj') }}" placeholder="000.000.000-00" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">E-mail</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="cliente@email.com" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Telefone Fixo</label>
                    <input type="text" name="telefone" value="{{ old('telefone') }}" placeholder="(11) 0000-0000" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Celular / WhatsApp</label>
                    <input type="text" name="celular" value="{{ old('celular') }}" placeholder="(11) 90000-0000" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Endereço (Rua/Av)</label>
                    <input type="text" name="endereco" value="{{ old('endereco') }}" placeholder="Rua..." class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Número</label>
                    <input type="text" name="numero" value="{{ old('numero') }}" placeholder="123" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Bairro</label>
                    <input type="text" name="bairro" value="{{ old('bairro') }}" placeholder="Bairro" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Cidade</label>
                    <input type="text" name="cidade" value="{{ old('cidade') }}" placeholder="Cidade" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">CEP</label>
                    <input type="text" name="cep" value="{{ old('cep') }}" placeholder="00000-000" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-3">
            <a href="{{ route('clientes.index') }}" class="px-5 py-2.5 bg-slate-900 hover:bg-slate-800 text-slate-400 font-medium text-xs rounded-xl border border-slate-800 transition">Cancelar</a>
            <button type="submit" class="px-6 py-2.5 bg-brand-600 hover:bg-brand-500 text-white font-semibold text-xs rounded-xl shadow-lg shadow-brand-600/30 transition">Salvar Cliente</button>
        </div>
    </form>

@endsection
