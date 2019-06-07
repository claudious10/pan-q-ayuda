<?php
    include("../partials/_header.html");

    
    if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["correo"]) && isset($_POST["asunto"]) && isset($_POST['mensaje'])) { 
        //echo "entraron todos" . $_POST['mensaje'];
   
        $correo=strtolower($_POST['correo']);//mail de cliente
        $nombreCompleto=$_POST['nombre'] . " " . $_POST['apellido'];// nombre del que envia
        $from=$nombreCompleto . " <" . $correo . " >";
        $subject=$_POST["asunto"];
        $message=$_POST['mensaje'];


        //$correoDestinatario="anayolanda@panqayuda.com.mx";
        $correoDestinatario="a01205935@itesm.mx.com";//POR AHORA PARA HACER PRUEBAS 

        require '../libraries/vendor/autoload.php';

        # Instantiate the client.
        $mgClient = new \Mailgun\Mailgun('key-ed7fba3df4d87e1ca52524235706da09');
        $domain = "panqayuda.com.mx";

        # Make the call to the client.
        $result = $mgClient->sendMessage("$domain",
          array('from'    => $from,
                'to'      => $correoDestinatario,
                'subject' => $subject,
                'text'    => $message));

         if( $result == true ) {
            echo "Mensaje enviado satisfactoriamente...A Pan Q' Ayuda ";
         }else {
            echo "Error:Message could not be sent... ";
         }
         

    }else{
        //echo "Faltan datos!!!";
    }

    

 
    include("../views/contacto.html");

    include("../partials/_footer.html");
?> 