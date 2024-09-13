<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 10</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $preco = $_GET['preco'] ?? 0;
    $porcentagem = $_GET['porcentagem'] ?? 0;

    $reajuste = $preco + ($preco * $porcentagem / 100);
    ?>
    <main>
        <h1>Reajustador de Preços</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <label for="preco">Preço do Produto (R$)</label>
            <input type="number" name="preco" id="preco" value="<?= $preco ?>" step="0.01" min="0.10">
            <label for="porcentagem">Qual será o percentual de reajuste? (<strong><span id="p">?</span>%</strong>)</label>
            <input type="range" min="0" max="100" name="porcentagem" id="porcentagem" value="<?= $porcentagem ?>" oninput="mudaValor()">
            <input type="submit" value="Reajustar">
        </form>
    </main>
    <section>
        <h1>Resultado do Reajuste</h1>
        <?= "<p>O produto que custava R$" . number_format($preco, 2, ',', '.') . " com <strong>$porcentagem% de aumento</strong> vai passar a custar <strong>R$" . number_format($reajuste, 2, ',', '.') . "</strong> a partir de agora.</p>" ?>
        <script>
            // Declarações automáticas
            mudaValor() // Invocar a função todas as vezes que a página é aberta, alterando o valor do valor de id p

            function mudaValor() {
                p.innerText = porcentagem.value;
            }
        </script>
    </section>
</body>

</html>