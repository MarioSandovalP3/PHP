<!DOCTYPE html>
<html>
    <head>
    	<title>Metadatos de una imagén</title>
    	<link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
<body>
<form action="metadata.php" method="POST" enctype="multipart/form-data">
	<span class="imagen">
        <input type="file" id="imagen" name="imagen"  >
    </span> 
        
        <div id="imagenPrevia">
            <!-- Aquí se mostrara una imagén previa del archivo seleccionado -->
        </div>

    	<div  class="subir" >
            <label for="imagen">Subir una imagén</label>
        </div>
        <div class="btn">
		      <input type="submit" value="Obtener metadatos">
	    </div>	
</form>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
</body>
</html>



