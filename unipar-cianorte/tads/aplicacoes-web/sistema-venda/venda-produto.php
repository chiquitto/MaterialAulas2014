<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';
?>

<form method="post" name="AddProduto">
    <select name="idproduto">
        <?php
            $sql= "select * from produto where status = ".PRODUTO_ATIVO;
            $consulta = mysqli_query($con, $sql);
            while($resultado = mysqli_fetch_assoc($consulta)){
        
        ?>
        
        <option value="<?php echo $resultado['idproduto'];?>"> <?php echo $resultado['produto'];?> (R$ <?php echo number_format($resultado['preco'], 2, ',', '.');?>) </option>
        
        
        <?php
            }    
        ?>
    </select>


</form>