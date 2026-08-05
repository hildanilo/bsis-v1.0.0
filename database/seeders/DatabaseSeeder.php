<?php

namespace Database\Seeders;

use App\Models\AssemblyOrder;
use App\Models\AssemblyOrderItem;
use App\Models\Customer;
use App\Models\Fitter;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Criar Lojas
        $lojas = [
            ['nome' => 'Guarulhos 1', 'cidade' => 'Guarulhos', 'endereco' => 'Av. Paulo Faccini, 100', 'telefone' => '(11) 2400-0001'],
            ['nome' => 'Guarulhos 2', 'cidade' => 'Guarulhos', 'endereco' => 'Rua Capitão Gabriel, 250', 'telefone' => '(11) 2400-0002'],
            ['nome' => 'São Bernardo', 'cidade' => 'São Bernardo do Campo', 'endereco' => 'Rua Marechal Deodoro, 500', 'telefone' => '(11) 4120-0003'],
            ['nome' => 'Mauá', 'cidade' => 'Mauá', 'endereco' => 'Av. Barão de Mauá, 300', 'telefone' => '(11) 4510-0004'],
            ['nome' => 'Santo André', 'cidade' => 'Santo André', 'endereco' => 'Rua Senador Fláquer, 150', 'telefone' => '(11) 4430-0005'],
            ['nome' => 'Penha', 'cidade' => 'São Paulo', 'endereco' => 'Rua Penha de França, 800', 'telefone' => '(11) 2090-0006'],
        ];

        $storeModels = [];
        foreach ($lojas as $lojaData) {
            $storeModels[] = Store::create($lojaData);
        }

        // 2. Criar Usuários Administrador e Atendentes
        $admin = User::create([
            'name' => 'Administrador BSIS',
            'email' => 'admin@bsis.com.br',
            'login' => 'admin',
            'password' => Hash::make('12345678'),
            'cargo' => 'admin',
            'status' => true,
            'loja_id' => $storeModels[0]->id,
        ]);

        User::create([
            'name' => 'Atendente Guarulhos',
            'email' => 'guarulhos@bsis.com.br',
            'login' => 'guarulhos',
            'password' => Hash::make('12345678'),
            'cargo' => 'atendente',
            'status' => true,
            'loja_id' => $storeModels[0]->id,
        ]);

        // 3. Criar Montadores
        $montadores = [
            ['nome' => 'Carlos Silva', 'telefone' => '(11) 98888-1111', 'percentual_comissao' => 10.00],
            ['nome' => 'Roberto Oliveira', 'telefone' => '(11) 97777-2222', 'percentual_comissao' => 12.00],
            ['nome' => 'Marcos Santos', 'telefone' => '(11) 96666-3333', 'percentual_comissao' => 10.00],
        ];

        $fitterModels = [];
        foreach ($montadores as $m) {
            $fitterModels[] = Fitter::create($m);
        }

        // 4. Criar Produtos de Exemplo
        $produtos = [
            ['codigo' => 'PROD-001', 'descricao' => 'Guarda-Roupa Casal 6 Portas', 'valor_padrao' => 1200.00, 'cor' => 'Branco'],
            ['codigo' => 'PROD-002', 'descricao' => 'Painel para TV até 65 Polegadas', 'valor_padrao' => 450.00, 'cor' => 'Off White/Freijó'],
            ['codigo' => 'PROD-003', 'descricao' => 'Mesa de Jantar 6 Cadeiras', 'valor_padrao' => 850.00, 'cor' => 'Imbuia'],
            ['codigo' => 'PROD-004', 'descricao' => 'Cama Box Casal Molas Ensacadas', 'valor_padrao' => 990.00, 'cor' => 'Cinza'],
            ['codigo' => 'PROD-005', 'descricao' => 'Armário de Cozinha Completo 4 Peças', 'valor_padrao' => 1350.00, 'cor' => 'Branco/Preto'],
        ];

        $productModels = [];
        foreach ($produtos as $p) {
            $productModels[] = Product::create($p);
        }

        // 5. Criar Clientes de Exemplo
        $cliente1 = Customer::create([
            'nome' => 'João da Silva',
            'cpf_cnpj' => '123.456.789-00',
            'telefone' => '(11) 95555-4444',
            'email' => 'joao@email.com',
            'endereco' => 'Rua das Flores',
            'numero' => '123',
            'bairro' => 'Centro',
            'cidade' => 'Guarulhos',
            'cep' => '07000-000',
        ]);

        $cliente2 = Customer::create([
            'nome' => 'Maria Fernandes',
            'cpf_cnpj' => '987.654.321-11',
            'telefone' => '(11) 94444-3333',
            'email' => 'maria@email.com',
            'endereco' => 'Av. Principal',
            'numero' => '456',
            'bairro' => 'Jardim América',
            'cidade' => 'São Paulo',
            'cep' => '08000-111',
        ]);

        // 6. Criar Ficha de Montagem de Teste
        $ficha = AssemblyOrder::create([
            'numero_controle' => '1001',
            'store_id' => $storeModels[0]->id,
            'customer_id' => $cliente1->id,
            'fitter_id' => $fitterModels[0]->id,
            'user_id' => $admin->id,
            'status' => 'em_montagem',
            'data_montagem' => now()->addDays(2),
            'valor_total' => 1650.00,
            'observacoes' => 'Entregar no período da manhã. Cuidado com piso flutuante.',
        ]);

        AssemblyOrderItem::create([
            'assembly_order_id' => $ficha->id,
            'product_id' => $productModels[0]->id,
            'descricao' => 'Guarda-Roupa Casal 6 Portas',
            'quantidade' => 1,
            'valor_unitario' => 1200.00,
            'cor' => 'Branco',
        ]);

        AssemblyOrderItem::create([
            'assembly_order_id' => $ficha->id,
            'product_id' => $productModels[1]->id,
            'descricao' => 'Painel para TV até 65 Polegadas',
            'quantidade' => 1,
            'valor_unitario' => 450.00,
            'cor' => 'Off White',
        ]);
    }
}
