(function() {
    const productFilter = $(".product-list-filters");
    const inputs = productFilter.find('input[type="checkbox"]');
    const pageItem = productFilter.find(".page-item");
    let cards = productFilter.find('.cards');
    let data = {};
    let ref = 0;
    if (cards.length == 0) {
        ref = 1;
        cards = productFilter.find('.card-list');
    }
    data.ref = ref;

    if (pageItem.hasClass('active')) {
        data.paging = pageItem.children().attr('href');
    }
    data._token = $('meta[name="csrf-token"]').attr('content');

    function postData(data) {
        $.ajax({
            type: "POST",
            url: '/products-solutions/get-list',
            data: data,
            beforeSend: function() {
                $("#prodLoading").show();
                cards.css({ "opacity": "0", "visibility": "hidden" });
            },
            complete: function() {
                $("#prodLoading").hide();
                cards.css({ "opacity": "1", "visibility": "visible" });
            },
            success: function(res) {
                getData(res);
            },
            error: function() {
                getData(html);
            }
        });
    }

    function getData(data) {
        cards.html(data);
    }

    function onChangeHandler() {
        const parents = $(this).parents('.accordion-item');
        const type = "product_type";
        const checkedInput = parents.find("input[type='checkbox']:checked");
        const valArr = [];

        for (let element of checkedInput) {
            valArr.push(element.value);
        }
        data["action"] = 'filterProduct';
        data[type] = [...valArr];
        postData(data);
    }

    inputs.on("change", onChangeHandler);
    $('#btn--reset-product').on('click', function() {
        $('#accordionFilter').find("input[type='checkbox']").prop('checked', false);
        data["action"] = 'filterProduct';
        data["posts_per_page"] = 3;
        postData(data);
    });

    pageItem.children().on("click", function(e) {
        e.preventDefault();
        let href = $(this).attr('href');
        if (href !== data.paging) {
            data.paging = href;
            postData(data);
        }
    });
})();