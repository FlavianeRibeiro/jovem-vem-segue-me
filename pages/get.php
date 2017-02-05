<?php 
    $con = mysqli_connect('localhost', 'root', '', 'tarefas');

    $id = $_GET['id'];

    $sql = "select * from tarefas where id = $id";

    $query = mysqli_query($con, $sql);
    $resultado = mysqli_fetch_assoc($query);

        $retorna = $resultado['vencidas'];
        echo $retorna;
?>