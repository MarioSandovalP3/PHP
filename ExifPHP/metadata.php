<?php 
$tipo=$_FILES["imagen"]["type"];

if($tipo=="image/jpeg"){# Se validad si el archivo seleccionado es un JPG.


$exif = exif_read_data($_FILES['imagen']['tmp_name']);# Leemos el archivo seleccionado con exif_read_data

# Se imprime si la imagén tiene cabeceras exif o no.
echo $exif===false ? "<h1>No se encontró información de cabecera.</h1><br />\n" : "<h1>La imagén contiene cabeceras.</h1><br />\n";

echo "<h2>Metadatos</h2>";

function arrayPrettyPrint($exif, $level) {
    # Se imprime con un foreach las cabeceras de la imagén.
    foreach($exif as $k => $v) {
        for($i = 0; $i < $level; $i++)
            echo("&nbsp;");  
        if(!is_array($v))
            echo("<b>".$k ."</b> => " .$v . "<br/>");
        else {
            echo("<br><b>".$k . "</b> => <br/>");
            arrayPrettyPrint($v, $level+1);
        }
    }
}

arrayPrettyPrint($exif, 0);

# Obteniendo la información GPS.
function getGps($exifCoord, $hemi) {

    $degrees = count($exifCoord) > 0 ? gps2Num($exifCoord[0]) : 0;
    $minutes = count($exifCoord) > 1 ? gps2Num($exifCoord[1]) : 0;
    $seconds = count($exifCoord) > 2 ? gps2Num($exifCoord[2]) : 0;
    $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;
    return $flip * ($degrees + $minutes / 60 + $seconds / 3600);
}

function gps2Num($coordPart) {
    $parts = explode('/', $coordPart);
    if (count($parts) <= 0)
        return 0;
    if (count($parts) == 1)
        return $parts[0];
    return floatval($parts[0]) / floatval($parts[1]);
}

}
# Si no es una imagén JPG se muestra una ventana alert que indica que no es una imagén.
else{	
	echo "<script type='text/javascript'>
    alert('No es una imagén JPG');window.location ='index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Metadatos</title>
	   <link rel="stylesheet" type="text/css" href="css/styles.css">
	       <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css">
   
        </head>
<body>
    <?php
        # Obtenemos las coordenadas GPS de la imagén.
        $exif = exif_read_data($_FILES['imagen']['tmp_name']);
        $lon = getGps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
        $lat = getGps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);

        if ($lat==0 AND $lon==0) {
            # Si las coordenas son iguales a 0 quiere decir que no tiene información de GPS.
            echo "<h1>No hay información de las coordenadas GPS</h1>";
                    }
        else{
            # Si no, imprime la información GPS con sus coordenadas.
            # Y muestra la ubicación en openstreetmap.
            echo "<h1>Información GPS</h1>";
    ?>
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script> 
    <div id="map" class="map map-home" style="margin:12px 0 12px 0;height:400px;"></div>
    <script>
        var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            osm = L.tileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib});
        var map = L.map('map').setView([<?php echo $lat; ?>, <?php echo $lon; ?>], 10).addLayer(osm);
        L.marker([<?php echo $lat; ?>, <?php echo $lon; ?>])
            .addTo(map)
            .bindPopup('<div align="center"><b>Coordenadas</b></div><?php echo $lat; ?>, <?php echo $lon; ?>')
            .openPopup();
    </script>
  

    <?php
    }
    ?>  
</body>
</html>