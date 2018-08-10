# Obteniendo los metadatos de una imagén con PHP
### Lee las cabeceras EXIF de una imagen JPEG con exif_read_data() de PHP y mostrar ubicación GPS en un mapa de <a href="https://www.openstreetmap.org/">OpenStreetMap</a> ###

Con exif_read_data() se puede leer las cabeceras EXIF que tienden a estar presentes en imágenes JPEG/TIFF generadas por cámaras digitales, en este caso solo se leera las cabeceras a JPEG.

**Requisitos**
  1. Servidor apache con (PHP 4 >= 4.2.0, PHP 5, PHP 7)
  2. jquery-3.2.1.min.js http://github.com - ¡link automático!
