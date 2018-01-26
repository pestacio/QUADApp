/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Configura a máscara de data utilizada pelos datepicker por defeito
//$.datepicker.setDefaults({ dateFormat: "yyyy-mm-dd" });
//$.datepicker.setDefaults( $.datepicker.regional[ "pt" ]);


function show_alert(msg_, tipo_) {
     
     if (tipo_ == 'E') { // erro

        if (msg_ == '')
            msg_ = " Problema na gravação de um registo.";
        
        $.smallBox({
            title : "Erro",
            content : msg_,
            color : "#C46A69",
            iconSmall : "fa fa-times fa-2x fadeInRight animated",
            timeout : 4000
        });
         
     } else if (tipo_ == 'A') {  // aviso

        if (msg_ == '')
            msg_ = " .";

        $.smallBox({
            title : "Aviso",
            content : msg_,
            color : "#dfb56c",
            iconSmall : "fa fa-check fa-2x fadeInRight animated",
            timeout : 4000
         });

     } else if (tipo_ == 'I') {  // informação
        if (msg_ == '')
            msg_ = " Registo gravado com sucesso.";

        $.smallBox({
            title : "Informação",
            content : msg_,
            color : "#659265",
            iconSmall : "fa fa-check fa-2x fadeInRight animated",
            timeout : 4000
         });
     }
}


// trigger to  change language
$(document).on('click','#lang_change li', function(e) {
    e.preventDefault();

    var html_ = $(this).find("a").html();
    var img_ = html_.substring(0,html_.indexOf(">")+1);
    var label_ = html_.substring(html_.indexOf(">")+1);

    // coloca a escolha como posição ativa
    var link_ = $(this).parents("li").find("a.dropdown-toggle");
    link_.html('&nbsp;' + img_ + '<span>&nbsp;'+label_+'&nbsp;</span>'+
               '<i class="fa fa-angle-down"></i>');
    
    // remover a classe active
    link_ = $(this).parents("li").find("li").removeClass("active");
    
    // adicionar a classe active à escolha corrente
    link_ = $(this).addClass("active");
    

    
    lang_ = $(this).find("img").attr("class");
    lang_ = lang_.substr(lang_.indexOf("-")+1);
    
//    alert("lang:"+lang_)

    $.ajax({
            url : "ajax/set_sessions.php",
            data : {
                    lang : lang_
            },
            success : function(data) {
                    location.reload(); 
            }
    });

});
