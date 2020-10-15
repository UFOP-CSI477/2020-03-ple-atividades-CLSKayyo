const searchMessage = (id, response = -1)=>{
    // if(id == 1){
    //     $('.card-body').append('<div class="sender-message">\
    //             <img src="https://via.placeholder.com/60" alt="Perfil">\
    //             <div class="message-body">\
    //                 A gente se conheceu semana passada, na Gamescon\
    //             </div>\
    //         </div>\
    //         <br>');
    // } else{
    //     $('.card-body').append('<div class="player-message">\
    //     <img src="https://via.placeholder.com/60" alt="Perfil">\
    //     <div class="message-body">\
    //        Não kkkkkkkk\
    //     </div>\
    // </div>\
    // <br>');
    // }
    $('#option_1').attr('disabled', 'true');
    $('#option_2').attr('disabled', 'true');
    $.get('/message/'+id, (data)=>{
        mensagem = JSON.parse(data);

        $('.card-body').append('<div class="sender-message">\
                 <img src="https://via.placeholder.com/60" alt="Perfil">\
                 <div class="message-body">'+mensagem['message']+'</div>\
             </div>\
            <br>');
            if(mensagem['choicedefault'] == null && mensagem['choice1'] != null && mensagem['choice2'] != null){
                $('#input_respostas').show();
                $('#input_aguarde').hide();
                $('#option_1').removeAttr('disabled');
                $('#option_2').removeAttr('disabled');
    
                $('#option_1').html(mensagem['response1']);
                $('#option_1').click((evt)=>{
                    evt.stopImmediatePropagation();
                    createResponse(1, mensagem['response1'], mensagem['choice1']);
                    // showSenderMessage(mensagem['response1']);
                    // searchMessage(mensagem['choice1'])
                });
                $('#option_1').attr('onclick', '');
                
                $('#option_2').html(mensagem['response2']);
                $('#option_2').click((evt)=>{
                    evt.stopImmediatePropagation();
                    createResponse(2, mensagem['response2'], mensagem['choice2']);
                    // showSenderMessage(mensagem['response2']);
                    // searchMessage(mensagem['choice2'])
                });
                $('#option_2').attr('onclick', '');

                if(response != -1){
                    showSenderMessage(mensagem['response'+response]);
                }

            } else if(mensagem['choicedefault'] != null){
                $('#input_respostas').hide();
                $('#input_aguarde').show();
                searchMessage(mensagem['choicedefault']);
            } else{
                $('#input_respostas').hide();
                $('#input_aguarde').show();
                $('#input_aguarde').attr('placeholder', 'Você terminou a história, parabéns!!');
            }
        

    });
}

const addMessage = id=>{
    course = $('#course').val();
    $.get('/message/add/'+course+'/'+id, (data)=>{
        if(data == 200){
            searchMessage(id);
        }
    });
}

const showSenderMessage = text=>{
    $('.card-body').append('<div class="player-message">\
         <img src="https://via.placeholder.com/60" alt="Perfil">\
         <div class="message-body">'+text+'</div>\
     </div>\
     <br>');
}

const createResponse = (id, text, choice)=>{
    $('#option_1').attr('disabled', 'true');
    $('#option_2').attr('disabled', 'true');
    showSenderMessage(text);
    course = $('#course').val();
    $.get('/response/'+course+'/'+id, (data)=>{
        if(data == 200){
            addMessage(choice);
        }
    });
}


$(document).ready(()=>{
    $('#input_respostas').hide();
    $('#input_aguarde').show();
})