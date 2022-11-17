<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type=number] {
  -moz-appearance: textfield;
}
</style>
    <link rel="stylesheet" href="CSS.css">
    <title>Carga de Pacientes.</title>
</head>
<body>
<div id="contenido"> 
        <form action="" method="POST" class="register">
        <h2>Cargar Pacientes.</h2>
            <div class="input-line">
                <label for="name" class="label-form">Nombre</label>
                <input type="text" name="name" id="name" class="input-field">
            </div>

            <div class="input-line">
                <label for="surname" class="label-form">Apellidos</label>
                <input type="text" name="surname" id="surname" class="input-field">
            </div>
            <div class="input-line">
                <label for="peso" class="label-form">Peso</label>
                <input type="number" name="peso" id="peso" class="input-field">
            </div>
            <div class="input-line">
                <label for="altura" class="label-form">Altura</label>
                <input type="number" name="altura" id="altura" class="input-field">
            </div>
            <div class="input-line">
                <label for="diag" class="label-form">Escriba su Diagnostico.</label>
                <input type="text" name="diag" id="diag" class="input-field">
            </div>
            <div class="input-line">
                <label for="dni" class="label-form">D.N.I</label>
                <input type="number" name="dni" id="dni" class="input-field" >
            </div>
            <button type='submit' name='turnos' class="button-form">Completar Formulario.</button>
</div>
</body>
</html>

