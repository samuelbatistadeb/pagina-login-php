<?php
    session_start();
    if (empty($_GET) or empty($_GET='usuario') or empty($_GET='senha')) {
        header('Location: index.php');
    }
    include('config.php');
    $usuario=$_GET=['usuario'];
    $senha=$_GET=['senha'];
    $sql="SELECT * FROM tb_usuario WHERE usuario='[$usuario]' AND senha='[$senha]'";
    $res= $conn->query($sql) or die($conn->error); 
    $row= $res->fetch_object();
    $qtd= $res->num_rows;
    
    if ($qtd >0) {
        $_SESSION['usuario']= $usuario;
        $_SESSION['nome']= $row->nome;
        $_SESSION['sobrenome']= $row->sobrenome;
        print "<script>location.href='dashbord.php';</script>";
    }
    else{
        print "<script>alert('Usuário e/ou senha incorreto(s)');</script>";
        print "<script>location.href='index.php';</script>";
        exit();
    }
?>
