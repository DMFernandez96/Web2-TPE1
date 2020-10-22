<?php
//vista para la API REST
//generica a toda la api, a todos los recursos. 
    class APIView{

        public function response($data, $status){ // $data es lo que le pasamos para q muestre
            //con $status le indicamos con que codigo se muestra (200, 404,etc)

            header("Content-Type: application/json"); //le digo que va en formato json
            header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));  //setea el codigo de respuesta

            //aca vamos a convertir a JSON
            echo json_encode($data); //combierto el arr en json
        }

        private function _requestStatus($code){ //funcion de traduccion
            //especie de diccionario
            $status = array(
                200 => "OK",
                404 => "Not found",
                500 => "Internal Server Error"
            );
            return (isset($status[$code])) ? $status[$code] : $status[500];
        }
    }