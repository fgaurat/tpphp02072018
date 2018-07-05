<?php
try {
    $user='dbuser';
    $pass='123';
    $dbh = new PDO('mysql:host=localhost;dbname=todolist', $user, $pass);
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'DELETE'){
        $req = file_get_contents("php://input");
        $id = explode('=',$req)[1];
        $sql_delete = "DELETE FROM todos WHERE id = ".$id;
        $dbh->query($sql_delete);
        exit();
    }
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id =  htmlspecialchars($_GET['id']);
        $sql_delete = "DELETE FROM todos WHERE id = ".$id;
        $dbh->query($sql_delete);
        header('Location: /index.php');
        exit();
        
    }

    $todos = [];
    foreach($dbh->query('SELECT * from todos') as $row) {
        $todos[] = $row;
    }
    $dbh = null;
    sleep(1);
    header('Content-Type: application/json');
    echo json_encode($todos);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
