<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilo.css">
    <title><?= TITLE ?></title>
</head>
<body>

<header>
    <div class="menu">
        <div style="font-size: 2em">
            <span>Site de Compras</span>
        </div>
        
        <div>
            <ul>
                <li><a href="index.php">Menu</a></li>
                <li><a href="produtos.php">Produtos</a></li>
                <li><a href="carrinho.php">Carrinho</a></li>
            </ul>
        </div>
        
        <div>
            <form autocomplete="off">
                <input name="q" type="text">
                <button type="submit">Pesquisar</button>
            </form>
        </div>
    </div>
</header>
