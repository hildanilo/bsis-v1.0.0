<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Fechamento #{{ $fechamento->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #111; margin: 20px; }
        .header { border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 15px; }
        .title { font-size: 18px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body onload="window.print()">

    <div class="no-print" style="margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; font-size: 14px; cursor: pointer;">🖨️ Imprimir Fechamento</button>
    </div>

    <div class="header">
        <div class="title">BSIS - RELATÓRIO DE FECHAMENTO DE MONTADOR</div>
        <div>Loja: <strong>{{ $fechamento->store->nome ?? '-' }}</strong> | Montador: <strong>{{ $fechamento->fitter->nome ?? '-' }}</strong></div>
        <div>Período: {{ $fechamento->periodo_inicio ? $fechamento->periodo_inicio->format('d/m/Y') : '' }} até {{ $fechamento->periodo_fim ? $fechamento->periodo_fim->format('d/m/Y') : '' }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nº Controle</th>
                <th>Cliente</th>
                <th>Data</th>
                <th style="text-align: right;">Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fechamento->assemblyOrders as $ficha)
                <tr>
                    <td>#{{ $ficha->numero_controle ?? $ficha->id }}</td>
                    <td>{{ $ficha->customer->nome ?? '-' }}</td>
                    <td>{{ $ficha->created_at->format('d/m/Y') }}</td>
                    <td style="text-align: right;">R$ {{ number_format($ficha->valor_total, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right; font-weight: bold;">VALOR TOTAL:</td>
                <td style="text-align: right; font-weight: bold;">R$ {{ number_format($fechamento->valor_total, 2, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

</body>
</html>
