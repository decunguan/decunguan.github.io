 function loadDoc() {        
        let respuesta = new XMLHttpRequest();


        respuesta.open('GET', 'https://randomuser.me/api/?results=10&format=xml'); 

        respuesta.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200){
                document.getElementById('demo').innerText = this.responseText;
            }
        };
        respuesta.send();

    }