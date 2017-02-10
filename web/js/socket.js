    socket = new WebSocket('ws://localhost:8080');
    socket.onopen = function(event){

        console.log('Установлено соединение WebSockets');

        
    }; 

    socket.onclose = function(event){
            
        console.log('Разъединились');
        var code = event.code;
        var reason = event.reason;
        var wasClean = event.wasClean;
        if(wasClean){
            document.getElementById('communicat').style.backgroundColor = '#DC143C';
            console.log('WebSockets-cоединение закрыто корректно');
        }else{
            console.log('WebSockets-cоединение закрыто с ошибкой' + reason);
        }
        var connectionError = document.getElementById('connection-error');
        if (connectionError) {
            connectionError.innerHTML = '<div class="alert alert-danger">К сожалению соединение оборвалось. Пожалуйста перезагрузите страницу!</div>';
        }
    };

    socket.onerror = function(event){
        console.log('ERROR');
    };

    socket.onmessage = function(message){
        
    };
  
