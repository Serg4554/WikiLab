<html>
<head>
	<title>WikiLab</title>
    <?php include('modules/head.html'); ?>
</head>
<body unresolved>
<a href="/alumno.php" class="perfil">
    <iron-icon icon="face" style="color: #134b56; margin-top: -2px; height: 20px; width: 20px;" prefix></iron-icon>
    Mi perfil
</a>
<div style="text-align: center;">
    <br/>
    <a href="/"><img src="images/logo.png" /></a>
    <br/>
    <br/>
    <form id="searchForm" method="get" action="asignatura.php">
        <paper-input name="q" id="search" label="Busca tu asignatura">
            <iron-icon icon="search" style="color: #134b56; height: 30px; width: 30px;" prefix></iron-icon>
        </paper-input>
        <paper-button onclick="send()" class="searchButton">Buscar</paper-button>
    </form>
</div>
<div class="title">WikiLab</div>
<script type="text/javascript">
    function send() {
        $('#searchForm').submit();
    }
</script>
</body>
</html>
