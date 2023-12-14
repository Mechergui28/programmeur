var ClassicEditor = require('@ckeditor/ckeditor5-build-classic');
var Image = require('@ckeditor/ckeditor5-image/src/image');

ClassicEditor
    .create( document.querySelector( '#editor' ), {
        plugins: [ Image ],
        toolbar: [ 'imageUpload', '|', 'heading', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        image: {
            toolbar: [ 'imageStyle:full', 'imageStyle:side', '|', 'imageTextAlternative' ]
        },
        uploadUrl: '/api/upload'
    } )
    .then( editor => {
        console.log( 'Editor was initialized', editor );
    } )
    .catch( error => {
        console.error( error.stack );
    } );
