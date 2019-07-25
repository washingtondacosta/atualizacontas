$(function(){
            //equivale ao load de nossa página
    
    
    $(".ttp").tooltip({
        animation:false,
        delay: {show : 1000, hide: 5000},
        title : "Titulo padrão",
        trigger : 'click',
        
    });
    
    $(".ppv").popover({
        title :"Titulo do popover",
        trigger: 'hover focus',
    })
    
    $(".btnjs").button();
    
    
    $("#troca-estado").click(function(){
        var btn = $(this);
        btn.button("Loading");
        
        setTimeout(function(){
            btn.button("reset");
        },3000);
    });
    
    
        });