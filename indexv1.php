<?php include 'index.sql.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css" >
    
    <script>
    window.onload = function(){

        for (let btn of document.querySelectorAll('.btn-delete') ){
            btn.onclick = function(e){
                console.log(e);
            }
        }

    }
    </script>
                
</head>
<body>
    <h1>Todos</h1>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>action</th>
                <th>dueDate</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($todos as $todo): ?>
                <tr>
                    <td><?= $todo['id']?></td>
                    <td><?= $todo['dueDate']?></td>
                    <td><?= $todo['action']?></td>
                    <td>
                        <a class="btn btn-danger btn-delete" href="index.php?id=<?=$todo['id']?>"> 
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"/>
                        </a>               
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    
    </table>



</body>
</html>