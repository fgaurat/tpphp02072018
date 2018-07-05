$(function(){

    $('#titre1').html('Toto');
    
    $('#theLink').click(function(event){
        event.preventDefault();
        event.stopPropagation();
        console.log("click Link");
    });
    
    $('#leDiv').click(function(event){
        console.log("click Div");
    });

});
