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
    $salida.="<table class='table__fl'>	<!-- inicio tabla  -->
        <thead >
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Diagnostico</th>
                <th>DNI</th>
                <th>Enfermero</th>
                <th>Enfermero id</th>
                <th>Opciones</th>
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
                <a href='paciente_modificar.php?id=".$fila ['paciente_id']."'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen' viewBox='0 0 16 16'>
                  <path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z'/>
                </svg></a>
                <a onclick='newwin".$fila['paciente_id']."()' style='font-size: 22px;'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-dash' viewBox='0 0 16 16'>
                <path d='M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7ZM11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1Zm0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z'/>
                <path d='M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z'/>
              </svg></a>
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


