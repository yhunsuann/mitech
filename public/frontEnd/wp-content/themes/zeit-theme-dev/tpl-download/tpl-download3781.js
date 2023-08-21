$(document).ready(function() {

    //filter by select

    $("#tech-2").on("change", function() {

        const value = $("#tech-2").val();
        // if(value == "opt-all") {
        //   $('.table-row').fadeIn("500")
        // }

        // else {
        $('.table-row').not('.' + value).hide()
        $('.table-row').filter('.' + value).show()
            // }
    });

    //filter search input
    document.getElementById("input-search").addEventListener("keyup", function() {
        var input, value, item, i;
        input = document.getElementById("input-search");
        value = input.value.toUpperCase();
        div = document.getElementById("responsive-table");
        item = div.querySelectorAll(".table-row");
        for (i = 0; i < item.length; i++) {
            txtValue = item[i].textContent || item[i].innerText;
            if (txtValue.toUpperCase().indexOf(value) > -1) {
                item[i].style.display = "";
            } else {
                item[i].style.display = "none";
            }
        }
    });

});