$(window).ready(() => {
    //--------------------------------------Narrative Official Poster----------------------------------------------
    $("#poster").on('change', function () {
    
        var countFiles = $(this)[0].files.length;

        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#posterHolder");
        image_holder.empty();

        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {

                for (var i = 0; i < countFiles; i++) {

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        let URL = e.target.result;

                        $(image_holder).append(
                            `
                            <div class="col-md-3">
                                <img src="${URL}" class="w-100"/>
                                <button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button>
                            </div>
                            `
                        )
                    }
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[i]);
                }
            } else {
                alert("It doesn't supports");
            }
        } else {
            alert("Select Only images");
        }
    });



      //--------------------------------------Narrative Photos----------------------------------------------
      $("#photos").on('change', function () {
    
        var countFiles = $(this)[0].files.length;

        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#photosHolder");
        image_holder.empty();

        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {

                for (var i = 0; i < countFiles; i++) {

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        let URL = e.target.result;

                        $(image_holder).append(
                            `
                            <div class="col-md-3">
                                <img src="${URL}" class="w-100"/>
                                <button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button>
                            </div>
                            `
                        )
                    }
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[i]);
                }
            } else {
                alert("It doesn't supports");
            }
        } else {
            alert("Select Only images");
        }
    });


    $("#receipt").on('change', function () {
    
        var countFiles = $(this)[0].files.length;

        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#receiptHolder");
        image_holder.empty();

        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {

                for (var i = 0; i < countFiles; i++) {

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        let URL = e.target.result;

                        $(image_holder).append(
                            `
                            <div class="col-md-3">
                                <img src="${URL}" class="w-100"/>
                                <button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button>
                            </div>
                            `
                        )
                    }
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[i]);
                }
            } else {
                alert("It doesn't supports");
            }
        } else {
            alert("Select Only images");
        }
    });

});
