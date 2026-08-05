@extends('layouts.app')

@section('title', 'Nova Ficha de Móveis')

@section('content')

    <form action="{{ route('fichas.store') }}" method="POST" class="space-y-6 max-w-4xl mx-auto">
        @csrf

        <div class="glass-card p-6 rounded-2xl space-y-4">
            <h3 class="font-heading font-semibold text-lg text-white border-b border-slate-800 pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-file-signature text-brand-400"></i>
                <span>Informações Gerais da Ficha</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Nº de Controle</label>
                    <input type="text" name="numero_controle" value="{{ old('numero_controle') }}" placeholder="Ex: 1052" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Loja *</label>
                    <select name="store_id" required class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                        <option value="">Selecione a Loja...</option>
                        @foreach($lojas as $loja)
                            <option value="{{ $loja->id }}" {{ old('store_id') == $loja->id ? 'selected' : '' }}>{{ $loja->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Cliente *</label>
                    <select name="customer_id" required class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                        <option value="">Selecione o Cliente...</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ old('customer_id') == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }} ({{ $cliente->cpf_cnpj ?? 'Sem CPF' }})</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Montador Responsável</label>
                    <select name="fitter_id" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                        <option value="">Nenhum / A definir</option>
                        @foreach($montadores as $montador)
                            <option value="{{ $montador->id }}" {{ old('fitter_id') == $montador->id ? 'selected' : '' }}>{{ $montador->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Data Prevista da Montagem</label>
                    <input type="date" name="data_montagem" value="{{ old('data_montagem') }}" class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Status Inicial *</label>
                    <select name="status" required class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                        <option value="pendente">Pendente</option>
                        <option value="em_montagem">Em Montagem</option>
                        <option value="concluida">Concluída</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Observações / Instruções de Entrega</label>
                <textarea name="observacoes" rows="2" placeholder="Digite detalhes relevantes..." class="w-full px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-brand-500">{{ old('observacoes') }}</textarea>
            </div>
        </div>

        <!-- Itens da Ficha -->
        <div class="glass-card p-6 rounded-2xl space-y-4">
            <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                <h3 class="font-heading font-semibold text-lg text-white flex items-center space-x-2">
                    <i class="fa-solid fa-boxes-packing text-cyan-400"></i>
                    <span>Itens / Produtos da Ficha</span>
                </h3>
                <button type="button" onclick="adicionarItem()" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-700 text-white font-medium text-xs rounded-lg transition border border-slate-700">
                    <i class="fa-solid fa-plus mr-1"></i> Adicionar Item
                </button>
            </div>

            <div id="container-itens" class="space-y-3">
                <div class="item-linha grid grid-cols-12 gap-2 bg-slate-950/60 p-3 rounded-xl border border-slate-800/80 items-center">
                    <div class="col-span-5">
                        <label class="block text-[10px] font-semibold uppercase text-slate-500 mb-0.5">Descrição do Produto *</label>
                        <input type="text" name="itens[0][descricao]" required placeholder="Ex: Guarda Roupa Casal 6 Portas" class="w-full px-3 py-1.5 bg-slate-900 border border-slate-800 rounded-lg text-xs text-white">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-[10px] font-semibold uppercase text-slate-500 mb-0.5">Qtd *</label>
                        <input type="number" name="itens[0][quantidade]" min="1" value="1" required class="w-full px-3 py-1.5 bg-slate-900 border border-slate-800 rounded-lg text-xs text-white">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-[10px] font-semibold uppercase text-slate-500 mb-0.5">Valor Unit. (R$) *</label>
                        <input type="number" step="0.01" name="itens[0][valor_unitario]" min="0" value="0.00" required class="w-full px-3 py-1.5 bg-slate-900 border border-slate-800 rounded-lg text-xs text-white">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-[10px] font-semibold uppercase text-slate-500 mb-0.5">Cor</label>
                        <input type="text" name="itens[0][cor]" placeholder="Branco" class="w-full px-3 py-1.5 bg-slate-900 border border-slate-800 rounded-lg text-xs text-white">
                    </div>
                    <div class="col-span-1 text-right pt-4">
                        <button type="button" onclick="this.closest('.item-linha').remove()" class="text-slate-500 hover:text-rose-400 transition p-1">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-3">
            <a href="{{ route('fichas.index') }}" class="px-5 py-2.5 bg-slate-900 hover:bg-slate-800 text-slate-400 hover:text-white font-medium text-xs rounded-xl border border-slate-800 transition">
                Cancelar
            </a>
            <button type="submit" class="px-6 py-2.5 bg-brand-600 hover:bg-brand-500 text-white font-semibold text-xs rounded-xl shadow-lg shadow-brand-600/30 transition">
                Salvar Ficha de Móveis
            </button>
        </div>
    </form>

    <script>
        let itemIndex = 1;
        function adicionarItem() {
            const container = document.getElementById('container-itens');
            const newRow = document.createElement('div');
            newRow.className = 'item-linha grid grid-cols-12 gap-2 bg-slate-950/60 p-3 rounded-xl border border-slate-800/80 items-center';
            newRow.innerHTML = `
                <div class="col-span-5">
                    <input type="text" name="itens[${itemIndex}][descricao]" required placeholder="Descrição do produto" class="w-full px-3 py-1.5 bg-slate-900 border border-slate-800 rounded-lg text-xs text-white">
                </div>
                <div class="col-span-2">
                    <input type="number" name="itens[${itemIndex}][quantidade]" min="1" value="1" required class="w-full px-3 py-1.5 bg-slate-900 border border-slate-800 rounded-lg text-xs text-white">
                </div>
                <div class="col-span-2">
                    <input type="number" step="0.01" name="itens[${itemIndex}][valor_unitario]" min="0" value="0.00" required class="w-full px-3 py-1.5 bg-slate-900 border border-slate-800 rounded-lg text-xs text-white">
                </div>
                <div class="col-span-2">
                    <input type="text" name="itens[${itemIndex}][cor]" placeholder="Cor" class="w-full px-3 py-1.5 bg-slate-900 border border-slate-800 rounded-lg text-xs text-white">
                </div>
                <div class="col-span-1 text-right">
                    <button type="button" onclick="this.closest('.item-linha').remove()" class="text-slate-500 hover:text-rose-400 transition p-1">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            `;
            container.appendChild(newRow);
            itemIndex++;
        }
    </script>

@endsection
