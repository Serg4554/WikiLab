<?php
include ('controller/functions.php');
if(!isset($_GET['q'])) {
    header('location: error/inexistente.php');
    exit();
}

try {
    $aula = new Aula($_GET['q']);
} catch(UnexpectedValueException $e) {
    header('location: error/inexistente.php');
    exit();
}
?>
<html>
<head>
    <title>WikiLab - Laboratorio</title>
    <?php include('modules/head.html'); ?>
</head>
<body unresolved>
<a href="/alumno.php" class="perfil">
    <iron-icon icon="face" style="color: #134b56; margin-top: -2px; height: 20px; width: 20px;" prefix></iron-icon>
    Mi perfil
</a>
<div style="text-align: center; font-weight: 100; ">
    <br/>
    <a href="/"><img src="images/logo.png" width="100" height="100" /></a>
    <br/>
    WikiLab
    <br/>
    <form id="searchForm" method="get" action="asignatura.php">
        <paper-input name="q" id="search" label="Busca una asignatura">
            <iron-icon icon="search" style="color: #134b56; height: 30px; width: 30px;" prefix></iron-icon>
        </paper-input>
    </form>
</div>
<paper-material id="content" elevation="2">
    <div style="text-align: center;">
        <a class="searchTitle">Laboratorio <?= $aula->getId() ?></a>
        <br/>
        <a class="">Estas son las asignaturas que se van a impartir en este laboratorio:</a>
        <br/>
    </div>
    <br/>
    <div style="text-align: center">
        <?php
        $horas = $aula->getHoras();

        foreach($horas as $hora) { ?>
            <paper-card heading="<?= $hora->getAsignatura()->getNombre() ?>" style="background: #d9e5fa; text-align: center; width: 300px; margin: 20px;">
                <div class="card-content"></div>
                <div class="card-actions" style="text-align: center;">
                    Franja horaria: <a style="font-weight: bold;"><?= $hora->getFranja() ?></a>
                </div>
            </paper-card>
        <?php
        }
        ?>
    </div>
</paper-material>
</body>
</html>
