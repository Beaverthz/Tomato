$(document).ready(function () {
    $("#add").click(function () {
        var food = $("#food_item").val();
        var num = $("#num").val();
        $("#num").css("border-color", "");
        if (num === "") {
            alert("Please fill the form properly");
            $("#num").css("border-color", "red");
            $("#num").attr("placeholder", "Please select a number");
        } else {
            
            $("#cmb").append(food+"-"+num+",");
        }
    });
    $("#cmb").keydown(function () {
        return false;
    });
});