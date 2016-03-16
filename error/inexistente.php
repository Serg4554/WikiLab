<html>
<head>
    <title>WikiLab - Buscador</title>
    <?php include('../modules/head.html'); ?>
</head>
<body unresolved>
<div style="text-align: center; font-weight: 100; ">
    <br/>
    <img src="../images/logo.png" width="100" height="100" />
    <br/>
    WikiLab
</div>
<paper-material id="content" elevation="2">
    <div style="text-align: center;">
        <a class="searchTitle">Esta asignatura o laboratorio no existe</a>
        <br/>
        <br/>
        <paper-material style="width: 500px; display: inline-block;" elevation="3">
            <img src="../images/gato.jpg" width="500">
        </paper-material>
    </div>
    <br/>
</paper-material>
<script type="text/javascript">
    function redireccionar() {
        location.href="/";
    }
    window.onload = function() {
        setTimeout ("redireccionar()", 3000);
    }
</script>
</body>
</html>
