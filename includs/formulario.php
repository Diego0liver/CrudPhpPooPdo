<main class="container">
<a href='index.php'>
    <button class='btn btn-primary'>
      Voltar
    </button>    
    </a>  

    <h2>Cadastra vaga</h2>

    <form method="post" >

    <div class="form-group" >
       <label>Titulo</label>
       <input type="text" class="form-control" name="titulo" />
    </div>


    <div class="form-group" >
       <label>Descricao</label>
       <textarea class="form-control" name="descricao"></textarea>
    </div>

    <div class="form-group" >
       <label>Status</label>
       <div>
          <div class="form-check form-check-inline">
            <label class="form-control">
                <input type="radio" name="ativo" value="s" />Ativo
            </label>
          </div>      
       </div> 

       <div>
          <div class="form-check form-check-inline">
            <label class="form-control">
                <input type="radio" name="inativo" value="n" />Intivo
            </label>
          </div>      
       </div> 
    </div>

    <div class="form-grup">
        <button type="submit" class="btn btn-success mt-3">Enviar</button>
    </div>    


    </form>

</main>