(function() {
    const productFilter = $(".product-list-filters");
    const inputs = productFilter.find('input[type="checkbox"]');
    const pageItem = productFilter.find(".page-item");
    const cards = productFilter.find('.cards');
    let data = {};
    data._token = $('meta[name="csrf-token"]').attr('content');

    if (pageItem.hasClass('active')) {
        data.paging = pageItem.children().attr('href');
    }

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
        data["posts_per_page"] = 3;
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


(function() {
    var counter = $('.swiper-counter');
    var currentCount = $('<span class="count">01<span/>');
    counter.append(currentCount);

    const bannerSwipper = new Swiper(".bannerSwiper", {
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        effect: "fade",
        autoplay: {
            delay: 5000,
        },
    });

    bannerSwipper.on('slideChange', function(swiper) {
        var index = swiper.activeIndex + 1;
        currentCount = $('<span class="count next">0' + index + '<span/>');
        counter.html(currentCount);
    })

    const timeWrapper = $('.time-mode');

    function isTime() {
        let hours = (new Date()).getHours();

        if (hours >= 6 && hours < 11) {
            timeWrapper.addClass('morning');
        } else if (hours >= 11 && hours < 16) {
            timeWrapper.addClass('noon');
        } else if (hours >= 16 && hours < 19) {
            timeWrapper.addClass('afternoon');
        } else if (hours >= 19 || hours < 6) {
            timeWrapper.addClass('evening');
        }
    }

    isTime();

    const $dataFilter = $('#user-type');

    $dataFilter.on('change', function() {
        const value = this.value;
        const activeClass = 'current';
        const $sect = $('.category-sect');
        const $navItem = $sect.find('.item');

        $navItem.removeClass(activeClass);
        $sect.find('[data-filter="' + value + '"]').addClass(activeClass);
    })

    const quickSearch = document.getElementById('quickSearch');
    const input = quickSearch.querySelector('.search-input');
    const suggestionItem = document.querySelectorAll('.list-suggestion .suggestion-item');

    function onSubmitHandler(el) {
        el.preventDefault();
        const inputVal = input.value;

        if (inputVal !== '') {
            quickSearch.submit();
        }
    }

    quickSearch.addEventListener("submit", function(el) {
        onSubmitHandler(el);
    })

    suggestionItem.forEach(function(item) {
        item.addEventListener("click", function(e) {
            const text = this.textContent;
            input.value = text;
            onSubmitHandler(e);
        });
    })

    const $form = $('.estimate-form');
    const tabEl = $form.find('button[data-bs-toggle="tab"]');

    tabEl.on('shown.bs.tab', function(event) {
        $(event.target.dataset.bsTarget).find('input').removeAttr("disabled");
        $(event.relatedTarget.dataset.bsTarget).find('input').attr("disabled", "true");
    })
})();