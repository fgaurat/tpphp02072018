$(function(){
    
    $(document).on('click','.todo-delete',function(event){
        
        let $target = $(event.currentTarget);
        let todo_id = $target.data('todoId');
        
        $.ajax({
            url: '/index.sql.php',
            type: 'DELETE',
            data: {id:todo_id},
            success: function(result) {
                console.log("ok");
            }
        });
        
    });
    
    $.get('/index.sql.php',function(data){
        for(let todo of data){
            let line = `
                <tr>
                    <td>${todo.id}</td>
                    <td>${todo.action}</td>
                    <td>${todo.dueDate}</td>
                    <td>
                        <button class="btn btn-danger todo-delete" data-todo-id="${todo.id}">Delete</button>
                    </td>
                </tr>  
            `;
            $('#todo-table > tbody').append(line);
        }
    });

});
