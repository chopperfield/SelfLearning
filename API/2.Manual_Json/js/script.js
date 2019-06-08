function tampilkanSemuaGame() {
    $.getJSON('Bas_Game.json', function (data) {
        let menu = data.Game;

        $.each(menu, function (i, data) {
            // console.log(data);
            $('#daftar-games').append(`  
            <div class="col-md-4">
            <div class="card mb-3">
                <img src=` + data.Image_Url + ` class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">` + data.Title + `</h5>                              
                    <h6>Platform: ` + data.Platform + `<h6>    
                    <h6>Category: ` + data.Category + ` <h6>    
                    <h6>Publisher: ` + data.Publisher + `<h6>    
                    <h6>Developer: ` + data.Developer + `<h6>    
                    <h6>Release: ` + data.Release + `<h6>    
                    <a href="#" class="btn btn-primary">Khilaf Now  </a>
                </div>
            </div>
            </div>
            `)
        });
    });
}

tampilkanSemuaGame();
$('.nav-link').on('click', function () {
    $('.nav-link').removeClass('active');
    $(this).addClass('active');

    let platform = $(this).html();
    $('h1').html(platform);

    if (platform == 'All Game') {
        tampilkanSemuaGame();
        return;
    }

    $.getJSON('Bas_Game.json', function (data) {
        let menu = data.Game;
        let content = '';

        $.each(menu, function (i, data) {
            if (data.Platform == platform) {
                content += `<div class="col-md-4">
                <div class="card mb-3">
                    <img src=` + data.Image_Url + ` class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">` + data.Title + `</h5>                              
                        <h6>Platform: ` + data.Platform + `<h6>    
                        <h6>Category: ` + data.Category + ` <h6>    
                        <h6>Publisher: ` + data.Publisher + `<h6>    
                        <h6>Developer: ` + data.Developer + `<h6>    
                        <h6>Release: ` + data.Release + `<h6>    
                        <a href="#" class="btn btn-primary">Khilaf Now  </a>
                    </div>
                </div>
                </div>`;
            }
        });
        // console.log(content);
        $('#daftar-games').html(content);
    });

    // $.getJSON(
    //     "http://run.plnkr.co/plunks/v8xyYN64V4nqCshgjKms/data-1.json",
    //     function (json) {
    //         console.log(json);
    //     }
    // );
    // $.ajax({
    //     url: "http://run.plnkr.co/plunks/v8xyYN64V4nqCshgjKms/data-2.json",
    //     dataType: "jsonp",
    //     success: function jsonCallback(result) {
    //         console.log(result);
    //     }

    // });
    $.getJSON("https://api.github.com/users/jeresig", function (json) {
        console.log(json);
    });


});