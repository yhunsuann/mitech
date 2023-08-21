(function() {
    const swiper = new Swiper(".thumb-slider", {
        spaceBetween: 12,
        watchSlidesProgress: true,
        slidesPerView: 'auto'
    });

    const swiper2 = new Swiper(".big-thumb-slider", {
        loop: true,
        navigation: {
            nextEl: ".thumb-arrow-next",
            prevEl: ".thumb-arrow-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });

    const swiper3 = new Swiper(".filter-tabs", {
        spaceBetween: 30,
        slidesPerView: 'auto'
    });

    const $dataFilter = $('.tab-filter');
    const $swiperWrapper = $('.swiper-wrapper')

    $dataFilter.on('click', function() {
        const ele = $(this);
        const filterData = ele.attr('data-filter');
        const activeClass = 'current';
        const $detailList = $('.detail-list');
        const $detailItem = $detailList.find('.detail-item');
        ele.parents('.filter-tabs').find('.tab-filter').removeClass(activeClass);
        ele.addClass(activeClass)
        $swiperWrapper.find('.tab-filter').removeClass(activeClass);
        $swiperWrapper.find('[data-filter="' + filterData + '"]').addClass(activeClass);

        $detailItem.removeClass(activeClass);
        if (filterData !== "all") {
            $detailList.find('[data-filter-type="' + filterData + '"]').addClass(activeClass);
        } else {
            $detailItem.addClass(activeClass);
        }
    })

    $dataFilter.first().click();

    const form = document.getElementById('contact-form');
    const inputs = form.querySelectorAll('.form-control');

    function isError(el, value) {
        el.parentNode.classList.add("errorShowing");
        value.push(el.getAttribute('name'));
    }

    function isCorrect(el) {
        el.parentNode.classList.remove("errorShowing");
    }

    function checkConditions(conditions, el, value) {
        if (conditions) {
            isError(el, value);
        } else {
            isCorrect(el);
        }
    }

    function validatInputs() {
        let valid = [];
        let condition;
        let checkAttr;

        inputs.forEach(function(i, j) {
            if (i.getAttribute('type')) {
                checkAttr = i.getAttribute('type');
            } else {
                checkAttr = i.tagName;
            }

            switch (checkAttr) {
                case 'text':
                    condition = i.value === '';
                    checkConditions(condition, i, valid);
                    break;
                case 'tel':
                    condition = i.value === '' || isNaN(i.value);
                    checkConditions(condition, i, valid);
                    break;
            }
        });

        if (valid.length > 0) {
            return false;
        } else {
            return true;
        }
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const checkValid = validatInputs();
        if (checkValid === false) return;

        let formData = new FormData();
        let request = new XMLHttpRequest();
        for (let $field of inputs) {
            if ($field.value !== "") {
                formData.append($field.name, $field.value);
            }
        }
        new bootstrap.Toast(document.querySelector('.toast')).show();
        // request.open("POST", ajax_url + "?action=contactUs");
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        request.open("POST", "/products-solutions/api/v1/products");
        request.setRequestHeader('X-CSRF-Token', csrfToken);
        request.send(formData);
        form.reset();
    });
})()