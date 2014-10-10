<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';
?>
<form name="Vendas" method="POST" action="venda-produto.php">

<select name="idproduto">
  <?php
  $sql= 'select * from produto where status='.PRODUTO_ATIVO;
  $result = mysqli_query($con,$sql);
  while($linha = mysqli_fetch_assoc($result))
  {
?>
  <option value="<?php echo $linha['idproduto']; ?>"><?php echo $linha['produto'];?> (R$<?php echo number_format($linha['preco'], 2, ",", "."); ?>)</option>

  <?php } ?>
  </select>  


</form>

