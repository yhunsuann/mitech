$(document).ready(function() {

    //Sort Select option
    $(".form-select").change(function() {
        const val1 = $("#tech-1").val();
        const val2 = $("#tech-3").val();
        console.log(val1, val2);
        $(".library-list .item").show();

        if (val1 !== "opt-1-all") {
            $(".library-list .item").not("." + val1).hide();
        }

        if (val2 !== "opt-2-all") {
            $(".library-list .item").not("." + val2).hide();
        }
    });

    let object = {
        'keywords': '',
    }

    var delayTimer;

    function postData() {
        clearTimeout(delayTimer);
        delayTimer = setTimeout(function() {

            const form_data = new FormData();

            for (let key in object) {
                form_data.append(key, object[key]);
            }

            $.ajax({
                url: '/resources/api/v1/library',
                data: form_data,
                processData: false,
                contentType: false,
                type: 'POST'
            }).done(function(res) {
                console.log('done');
            });

        }, 1000);
    }

    $("#search-input").on("keyup", function() {
        let inputSearch = $("#search-input").val()
        object.keywords = inputSearch;

        postData()
    });
});