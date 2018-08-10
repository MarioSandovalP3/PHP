
// Esta función crea una imagén previa con un ancho de 400px y un alto 300px
(function(){
        function filePreview(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#imagenPrevia').html("<img src='"+e.target.result+"' width='400px' height='300px' />");
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#imagen').change(function(){
            filePreview(this);
    });
})();