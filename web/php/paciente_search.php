<?php

include("./conexion.php");


$salida = "";

$query_salida = "SELECT pacientes.paciente_id, pacientes.paciente_nombre, pacientes.paciente_apellido, pacientes.paciente_peso, pacientes.paciente_altura,pacientes.paciente_diagnostico, pacientes.paciente_dni, enfermeros.enfermero_nombre ,pacientes.enfermero_id
FROM pacientes
INNER JOIN enfermeros on pacientes.enfermero_id = enfermeros.enfermero_id";

if(isset($_POST['consulta'])){
    $q = $conexion ->real_escape_string($_POST['consulta']);
    $query_salida= "SELECT pacientes.paciente_id,pacientes.paciente_nombre, pacientes.paciente_apellido, pacientes.paciente_peso, pacientes.paciente_altura,pacientes.paciente_diagnostico, pacientes.paciente_dni, enfermeros.enfermero_nombre, pacientes.enfermero_id
    FROM pacientes
    INNER JOIN enfermeros on pacientes.enfermero_id = enfermeros.enfermero_id
WHERE pacientes.paciente_nombre LIKE '%".$q."%' OR pacientes.paciente_apellido LIKE '%".$q."%' OR pacientes.paciente_peso LIKE '%".$q."%' OR  pacientes.paciente_altura LIKE '%".$q."%' OR pacientes.paciente_diagnostico LIKE '%".$q."%' OR pacientes.paciente_dni LIKE '%".$q."%' OR enfermeros.enfermero_nombre LIKE '%".$q."%'";
    
}   

$res = $conexion->query($query_salida);

if($res->num_rows>0){
    $salida.="<table class='table table-hover '>	<!-- inicio tabla  -->
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Diagnostico</th>
                <th>DNI</th>
                <th>Enfermero</th>
                <th>Enfermero id</th>
            </tr>
        </thead>
    <tbody>";
       
    while($fila =$res ->fetch_assoc()){
        $salida.= "<tr>
            <td>"
                .$fila ['paciente_nombre'].
            "</td>
            <td>"
                .$fila ['paciente_apellido'].
            "</td>
            <td>"
                .$fila ['paciente_dni'].
            "</td>
            <td>"
                .$fila ['paciente_peso'].
            "</td>
            <td>"
                .$fila ['paciente_altura'].
            "</td>
            <td>"
                .$fila ['paciente_diagnostico'].
            "</td>
            <td>"
                .$fila ['enfermero_id'].
            "</td>
            <td>"
                .$fila ['enfermero_nombre'].
            "</td>
            <td class='botones'>
                <a href='paciente_modificar.php?id=".$fila ['paciente_id']."'></a>
                <a onclick='newwin".$fila['paciente_id']."()' style='font-size: 22px;' ></a>
                <script>function newwin".$fila['paciente_id']."(){
                    Swal.fire({
                        title: '<strong>Eliminar paciente</strong>',
                        icon: 'warning',
                        html:`¿Desea eliminar este paciente y todos sus datos?`,
                        showCloseButton: true,
                        showCancelButton: true,
                        focusConfirm: false,
                        reverseButtons: true,
                        focusCancel: true,
                        cancelButtonText:`Cancelar`,
                        confirmButtonText:`Eliminar`
                      }).then((result) => {
                        if (result.value) {
                          window.location.href = `paciente_eliminar.php?id=".$fila['paciente_id']."`
                        }
                      }); 
                }   
                </script>
                ";
    }
    $salida.="</tbody></table>";

}else{
    $salida.="no hay datos :(";
}
echo $salida;

$conexion->close();
?>

