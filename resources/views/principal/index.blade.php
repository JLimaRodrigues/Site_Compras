<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Compras</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Fontawesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container">

    <!--MENU FLUTUANTE-->
    <div class="navbar">

    </div>

    <div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>
            <button type="button" class="btn btn-success btn-sm" title="Pagar" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-money-bill-wave"></i></button>
            </td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>
            <button type="button" class="btn btn-success btn-sm" title="Pagar" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-money-bill-wave"></i></button>
            </td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Larry the Bird</td>
            <td>
            <a type="button" class="btn btn-success btn-sm" title="Pagar" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-money-bill-wave"></i></button>
            </td>
            </tr>
        </tbody>
        </table>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Paga ai meu Brother</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="row mb-3">
            <?= $imagem ?>
        </div>

        <form>
          <div class="input-group mb-3">
            <label for="hash-pix" class="col-form-label"></label>
            <input type="text" class="form-control" id="hash-pix" value="<?= $hash ?>" disabled>
            <button id="copiar-hash" type="button"class="input-group-text" title="Copiar o texto" onclick="copiarTexto()"><i class="fa-regular fa-clipboard"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
<script>
    function copiarTexto() {
    let textoCopiado = document.getElementById("hash-pix");
    textoCopiado.select();
    textoCopiado.setSelectionRange(0, 99999)
    document.execCommand("copy");
    alert("O texto é: " + textoCopiado.value);
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>