# Obteniendo los metadatos de una imagén con PHP
### Lee las cabeceras EXIF de una imagen JPEG con exif_read_data() de PHP y mostrar ubicación GPS en un mapa de <a href="https://www.openstreetmap.org/">OpenStreetMap</a> ###

Con exif_read_data() se puede leer las cabeceras EXIF que tienden a estar presentes en imágenes JPEG/TIFF generadas por cámaras digitales, en este caso solo se leera las cabeceras a JPEG.

**Requisitos**
* Servidor apache con (PHP 4 >= 4.2.0, PHP 5, PHP 7)
* jquery-3.2.1.min.js <a href="https://github.com/jquery/codeorigin.jquery.com/blob/master/cdn/jquery-3.2.1.min.js">Descargar</a>
* Editar el archivo **php.ini** de PHP buscando la linea **;extension=php_exif.dll** y descomentarla quitandole el punto y coma (;), luego reiniciar el servidor apache.

