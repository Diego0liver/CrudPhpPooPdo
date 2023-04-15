<main class="container">

    <h2>Excluir vaga</h2>

    <form method="post" >

    <div class="form-group" >
     <p>Voce deseja excluir a vaga <strong><?=$obVaga->titulo?></strong>?<p>
    </div>

    <div class="form-grup">
    <a href='index.php'>
    <button type="button" class='btn btn-primary'>
      Voltar
    </button>    
    </a>  
        <button type="submit" name="excluir" class="btn btn-danger">Enviar</button>
    
    </div>    


    </form>

</main>