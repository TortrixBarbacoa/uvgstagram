import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aquí tu imágen",
    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
    addRemoveLinks: true,
    dictRemoveFile: "Eliminar",
    maxFiles: 1,
    uploadMultiple: false,

    init: function()
    {
        if(document.querySelector('[name="imagen"]').value.trim())
        {
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);
            imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");
        }
    }
});

//Eventos Dropzone

dropzone.on('sending', function (file, xhr, formData) {

});

dropzone.on('success', function (file, response) {
    console.log(response);
    document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.on('error', function (file, response) {

});

//Eliminar la imagen
dropzone.on('removedfile', function (file, response){
    document.querySelector('[name="imagen"]').value = "";
});

