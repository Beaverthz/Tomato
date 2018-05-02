$(document).ready(function () {
    link = window.location.search
    if (link.substring(0, 1) == '?') {
        link = link.substring(1);
    } else {
        window.location.href = "hotels.html"
    }

    formData = {
        hotel_id: link
    }

    $.ajax({
        type: 'POST',
        url: 'menus.php',
        data: formData,
        datatype: 'json',
        encode: true
    }).done(function (res) {
        data = JSON.parse(res)
        console.log(data.result)
        var menu_data = data.result.map(function(each){
            // return "<a class='list-group-item hotel-list' id='" + each.f_id + "' >" +
            //         "<strong>" + each.food + "</strong>" +
            //         "<p>" + each.price + " Rs " + "</p>" +
            //         "<p>" + "rating: " + each.rating + "</p>" +
            //         "<img src=' " + each.f_image +"' width='150' height='150'"  +
            //         "</a>"
            return "<div class='card col-sm-3' id='" + each.f_id +"'>" +
              "<img src=' " + each.f_image + "' style='width:100%; height:350px;'>" +
              "<div class='container col-sm-12'>" +
              "<h4>" + "Menu : " + each.food + "</h4>" +
              "<p>" + "Price : " + each.price + " Rs " + "</p>" +
              "</div>" +
              "</div>"
        })
        $('#menuList').html(menu_data)

        var header = "<h3 class='hotname'> " + data.result[0].hotel+ " </h3>" +
                    "<h3 class='hotname'> " + data.result[0].phone+ " </h3>"

        $('#hotelDetails').html(header)
    })

})
