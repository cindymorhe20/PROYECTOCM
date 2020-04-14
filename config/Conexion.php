<?php



require_once "global.php";


//string de conexion a la base de datos mysql


//Investigar sobre mysqli //


$conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);


//query de conexion

mysqli_query($conexion, 'SET NAME "'.DB_ENCODE.'"');


//EJEMPLO SIN CONCATENAR

//mysqli_query($conexion, 'SET NAME utf8');


//tenemos que validar si hay un error en la conexion

if(mysqli_connect_errno()){


        printf("No se pudo realizar la conexión a la base de datos: %s\n",mysqli_connect_error());

        exit();

}


if(!function_exists('ejecutarConsulta')){


        //ejecutar la funcion consulta

        function ejecutarConsulta($sql)

        {

                global $conexion;

                //ejemplo = select * from user

                $query = $conexion->query($sql); //eje. insert, update, delete.

                return $query; //con un resultado

        }


        function ejecutarConsultaSimpleFila($sql){


                global $conexion;

                //ejemplo = select * from user WHERE idUser = 1

                $query = $conexion->query($sql);

                $row = $query->fetch_assoc();

                return $row;

        }


        function limpiarCadena($str){


                global $conexion;

                $str = mysqlli_real_scape_string($conexion, trim($str));

                return htmlspecialchars($str);

        }

}


 ?>

