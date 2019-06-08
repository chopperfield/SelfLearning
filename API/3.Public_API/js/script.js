function searchMovies() {
    $('#daftar-film').html('');

    $.ajax({
        url: 'http://omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey': 'fca96da1',
            's': $('#search-input').val()
        },
        //ajax dikirim  
        success: function (result) {
            //console.log(result);
            if (result.Response == "True") {
                let movies = result.Search;

                $.each(movies, function (i, data) {
                    $('#daftar-film').append(`
                    <div class="col-md-4">
                        <div class="card mb-3" >
                            <img src="` + data.Poster + `" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">` + data.Title + `</h5>
                                <h6 class="card-subtitle mb-2 text-muted">` + data.Year + `</h6>
                                
                                <a href="#" class="card-link see-detail"  data-toggle="modal" data-target="#exampleModal" data-id="` + data.imdbID + `">See Detail</a>
                            </div>
                        </div>
                    </div>
                    `);
                });

            } else {
                $('#daftar-film').html(`
                <div class="col">
                <h1 class="text-center">` + result.Error + ` </h1>
                </div>`);
            }

            $('#search-input').val('');
        }

    });
}

$('#search-button').on('click', function () {
    searchMovies();
});

$('#search-input').on('key-up', function (e) {
    if (e.keyCode == 13) {
        searchMovies();
    }
});

//event bubling, karena tidak ada class event nya pada saat pertama kali load
// $('.see-detail').on('click', function () {
//     console.log($(this).data('id'));
// });

//event binding/delegation, baik elementnya sudah atau tidak
$('#daftar-film').on('click', '.see-detail', function () {
    //console.log($(this).data('id'));    
    seeDetail($(this).data('id'));
});

function seeDetail(IDfilm) {
    console.log(IDfilm);
    $.ajax({
        url: "http://omdbapi.com",
        type: "get",
        dataType: "json",
        data: {
            'apikey': 'fca96da1',
            'i': IDfilm
        },
        success: function (result) {
            if (result.Response == "True") {
                $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                            <img src="` + result.Poster + `" class="img-fluid">
                            </div>

                            <div class="col-md-8">
                                <ul class="list-group">
                                    <li class="list-group-item"><h3>` + result.Title + `</h3></li>
                                    <li class="list-group-item">Released: ` + result.Released + `</li>
                                    <li class="list-group-item">Genre:` + result.Genre + `</li>
                                    <li class="list-group-item">Actors:` + result.Actors + `</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                `)
            } else {

            }
        }
    });

}