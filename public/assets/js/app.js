function dataURItoBlob(dataURI) {
    // convert base64/URLEncoded data component to raw binary data held in a string
    var byteString;
    if (dataURI.split(',')[0].indexOf('base64') >= 0)
        byteString = atob(dataURI.split(',')[1]);
    else
        byteString = unescape(dataURI.split(',')[1]);

    // separate out the mime component
    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

    // write the bytes of the string to a typed array
    var ia = new Uint8Array(byteString.length);
    for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }

    return new Blob([ia], { type: mimeString });
}

window.uploadPicture = function(callback) {
    croppie.result({
        size: "viewport"
    }).then(function(dataURI) {
        var formData = new FormData();
        formData.append("design", $("#fg").data("design"));
        formData.append("image", dataURItoBlob(dataURI));
        $.ajax({
            url: "upload.php",
            data: formData,
            type: "POST",
            contentType: false,
            processData: false,
            success: callback,
            error: function() {
                document.getElementById("download").innerHTML = "Download Profile Picture";
            },
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) {
                    myXhr.upload.addEventListener('progress', function(e) {
                        if (e.lengthComputable) {
                            var max = e.total;
                            var current = e.loaded;

                            var percentage = Math.round((current * 100) / max);
                            document.getElementById("download").innerHTML = "Uploading... Please Wait... " + percentage + "%";
                        }
                    }, false);
                }
                return myXhr;
            },
        });
    });
}

window.updatePreview = function(url) {
    document.getElementById("crop-area").innerHTML = "";
    window.croppie = new Croppie(document.getElementById("crop-area"), {
        "url": url,
        boundary: {
            height: 800,
            width: 800
        },
        viewport: {
            width: 800,
            height: 800
        },
    });

    $("#fg").on('mouseover touchstart', function() {
        document.getElementById("fg").style.zIndex = -1;
    });
    $(".cr-boundary").on('mouseleave touchend', function() {
        document.getElementById("fg").style.zIndex = 10;
    });

    document.getElementById("download").onclick = function() {
        croppie.result({
            size: "viewport"
        }).then(function(dataURI) {

            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext("2d");
            var Img = new Image();
            Img.addEventListener("load", function() {
                canvas.width = Img.width;
                canvas.height = Img.height;
                ctx.drawImage(Img, 0, 0);
                var Img2 = new Image();
                Img2.addEventListener("load", function() {
                    ctx.drawImage(Img2, 0, 0, canvas.width, canvas.height);
                    canvas.toBlob(function(blob) {
                        saveAs(blob, "profilePic.jpg");
                    }, 'image/jpeg', 0.95);
                });
                Img2.src = "http://takshak.in/2017/public/images/frame1.png";
            });
            Img.src = dataURI;
        });
    };
    document.getElementById("download").removeAttribute("disabled");
};

window.onFileChange = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            image = new Image();
            image.onload = function() {
                var width = this.width;
                var height = this.height;
                if (width >= 400 && height >= 400)
                    updatePreview(e.target.result);
                else
                    alert("Image should be atleast have 400px width and 400px height");
            };
            image.src = e.target.result;
            image.crossOrigin = "Anonymous";
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {
    $(".design").on("click", function() {
        $("#fg").attr("src", $(this).attr("src")).data("design", $(this).data("design"));
        $(".design.active").removeClass("active");
        $(this).addClass("active");
    });
});