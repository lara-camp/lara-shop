function readURL(input) {
    if (input.files && input.files[0]) {
        var fileExtension = input.files[0].name.split('.').pop().toLowerCase();
        if(fileExtension == 'jpg' || fileExtension == 'png' || fileExtension == 'img' || fileExtension == 'jpeg' || fileExtension == 'gif'){
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-upload-wrap').hide();

                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
        }else{
           alert("Wrong Extension")
        }


    }
}
