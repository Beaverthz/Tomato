$(document).ready(function(){
    console.log("here")
    // if (navigator.geolocation) {
    //     navigator.geolocation.getCurrentPosition(showPosition);
    // } else {
    //     console.log("nope")
    // }

    // function showPosition(position) {

        var formData = {
            // latitude : position.coords.latitude,
            // longitude : position.coords.longitude
            latitude : 8.4719,
            longitude : 76.9518
          }

        //   console.log(position.coords)

        $.ajax({
            type: 'POST',
            url: 'search_hotel.php',
            data: formData,
            datatype: 'json',
            encode: true
        }).done(function(res){
          console.log(res)
            hotels = JSON.parse(res.substr(5));
            console.log(hotels)

            var html_data = hotels.hotels.map(function(each){
                // return "<a class='list-group-item hotel-list' id='" + each.hid + "' >" +
                //         "<strong>" + each.hotel_name + "</strong>" +
                //         "<p>" + each.haddress + "</p>" +
                //         "<p>" + each.hphone +"</p>" +
                //         "<img src=' " + each.hotel_image +"' width='150' height='150'"  +
                //         "</a>"

                return "<div class='card col-sm-3' id='" + each.hid +"'>" +
                  "<img src=' " + each.hotel_image + "' style='width:100%; height:350px;'>" +
                  "<div class='container col-sm-12'>" +
                  "<h4>" + each.hotel_name + "</h4>" +
                  "<p>" + each.haddress + "</p>" +
                  "<p>" + each.hphone +"</p>" +
                  "</div>" +
                  "</div>"
            })
            $('#hotelList').html(html_data)
        })
    // }

    $('#hotelList').on('click', '.card' , function(e){
        e.preventDefault();
        hotel_id = $(this).attr('id');

        window.location.href = "menu.html?" + hotel_id

        // formData = {
        //     hotel_id : hotel_id
        // }

        // $.ajax({
        //     type: 'POST',
        //     url: 'menus.php',
        //     data: formData,
        //     datatype: 'json',
        //     encode: true
        // }).done(function(res){
        //     console.log(JSON.parse(res))
        // })
    })
})
