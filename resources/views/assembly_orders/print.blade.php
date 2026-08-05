<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Ficha de Montagem #{{ $ficha->numero_controle ?? $ficha->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #111;
            margin: 20px;
        }
        .header {
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        .header table {
            width: 100%;
        }
        .title {
            font-size: 18px;
            font-weight: bold;
        }
        .section {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .section-title {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 11px;
            margin-bottom: 8px;
            border-bottom: 1px solid #eee;
            padding-bottom: 4px;
        }
        table.items {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table.items th, table.items td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
        }
        table.items th {
            background-color: #f2f2f2;
        }
        .signatures {
            margin-top: 40px;
            width: 100%;
        }
        .signature-box {
            width: 45%;
            float: left;
            border-top: 1px solid #000;
            text-align: center;
            padding-top: 5px;
        }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="no-print" style="margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; font-size: 14px; cursor: pointer;">🖨️ Imprimir Ficha</button>
    </div>

    <div class="header">
        <table>
            <tr>
                <td>
                    <div class="title">BSIS - FICHA DE MONTAGEM DE MÓVEIS</div>
                    <div>Loja: <strong>{{ $ficha->store->nome ?? 'Loja' }}</strong></div>
                </td>
                <td style="text-align: right;">
                    <div class="title">Nº {{ $ficha->numero_controle ?? $ficha->id }}</div>
                    <div>Data: {{ date('d/m/Y') }}</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Dados do Cliente</div>
        <table style="width: 100%;">
            <tr>
                <td><strong>Cliente:</strong> {{ $ficha->customer->nome ?? '-' }}</td>
                <td><strong>CPF/CNPJ:</strong> {{ $ficha->customer->cpf_cnpj ?? '-' }}</td>
            </tr>
            <tr>
                <td><strong>Telefone:</strong> {{ $ficha->customer->telefone ?? '-' }} {{ $ficha->customer->celular ? '/ '.$ficha->customer->celular : '' }}</td>
                <td><strong>Data Montagem:</strong> {{ $ficha->data_montagem ? $ficha->data_montagem->format('d/m/Y') : '-' }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Endereço:</strong> {{ $ficha->customer->endereco ?? '-' }}, {{ $ficha->customer->numero ?? 'S/N' }} - {{ $ficha->customer->bairro ?? '-' }} ({{ $ficha->customer->cidade ?? '-' }})</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Montador Responsável</div>
        <div><strong>Nome:</strong> {{ $ficha->fitter->nome ?? 'Não atribuído' }}</div>
    </div>

    <div class="section">
        <div class="section-title">Produtos para Montagem</div>
        <table class="items">
            <thead>
                <tr>
                    <th>Item / Descrição</th>
                    <th>Cor</th>
                    <th style="text-align: center;">Qtd</th>
                    <th style="text-align: right;">Valor Unit.</th>
                    <th style="text-align: right;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ficha->items as $item)
                    <tr>
                        <td>{{ $item->descricao }}</td>
                        <td>{{ $item->cor ?? '-' }}</td>
                        <td style="text-align: center;">{{ $item->quantidade }}</td>
                        <td style="text-align: right;">R$ {{ number_format($item->valor_unitario, 2, ',', '.') }}</td>
                        <td style="text-align: right;">R$ {{ number_format($item->quantidade * $item->valor_unitario, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: right; font-weight: bold;">TOTAL:</td>
                    <td style="text-align: right; font-weight: bold;">R$ {{ number_format($ficha->valor_total, 2, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    @if($ficha->observacoes)
        <div class="section">
            <div class="section-title">Observações</div>
            <div>{{ $ficha->observacoes }}</div>
        </div>
    @endif

    <div class="signatures">
        <div class="signature-box">
            Assinatura do Cliente
        </div>
        <div class="signature-box" style="float: right;">
            Assinatura do Montador
        </div>
    </div>

</body>
</html>
