<?php
require('config.php');
$lista = [];
$id = filter_input(INPUT_GET, 'id');
if($id){
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id',$id);
    $sql->execute();

    if($sql->rowCount()>0){
        $lista = $sql->fetch( PDO::FETCH_ASSOC );
    }else{
        header("Location: index.php");
        exit;
    }
}else{
    header("Location: index.php");
    exit;
}
?>


<h1>Editar Usuário</h1>

<form action="editar_action.php" method="POST">

    <input type="hidden" name="id" value = "<?php echo $lista['id'];?>" >

    <label for="">
    Nome: <br/>
    <input type="text" name="name" value = "<?php echo $lista['nome'];?>">
    </label><br/><br/>

    <label for="">
    Email: <br/>
    <input type="email" name="email" value = "<?php echo $lista['email'];?>">
    </label><br/><br/>

    <input type="submit" value = "Salvar">
</form>