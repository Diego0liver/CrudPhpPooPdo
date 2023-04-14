<?php
$resultado = '';
foreach($vagas as $vaga){
  $resultado .=
  '<tr>
     <td>'.$vaga->id.'</td>
     <td>'.$vaga->titulo.'</td>
     <td>'.$vaga->descricao.'</td>
     <td>'.$vaga->ativo.'</td>
     <td>'.$vaga->data.'</td>
     <td></td>
  </tr>';
  
}
?>

<main class="container">

<section> 
<a href='cadastrar.php'>
    <button class='btn btn-primary'>
       Nova Vaga
    </button>    
    </a>  
</section>   


 <section>   
 <table class="table table-dark table-striped-columns mt-3">
  <thead>
    <tr>
      <th>Id</th>
      <th>Titulo</th>
      <th>Descricao</th>
      <th>Status</th>
      <th>Data</th>
      <th>Acao</th>
    </tr>
  </thead>
  <tbody>
    <?=$resultado?>
  </tbody>
</table>
</section>   


</main>