(function() {
    const subscriptionform = document.querySelector('.form-subscription');
    const subscriptionInput = subscriptionform.querySelector('.form-control');

    function validatInputs() {
        const regEmail = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        if (subscriptionInput.value === '' || !regEmail.test(subscriptionInput.value)) {
            subscriptionInput.parentNode.classList.add("errorShowing");
            return false;
        } else {
            subscriptionInput.parentNode.classList.remove("errorShowing");
            return true;
        }
    }

    subscriptionform.addEventListener('submit', function(e) {
        e.preventDefault();
        const checkValid = validatInputs();
        if (checkValid === false) return;

        let formData = new FormData();
        let request = new XMLHttpRequest();
        formData.append(subscriptionInput.name, subscriptionInput.value);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        request.open("POST", "/new/api/v1/new-form");
        request.setRequestHeader('X-CSRF-Token', csrfToken);
        request.send(formData);
        subscriptionform.reset();
        new bootstrap.Toast(document.querySelector('.toast')).show();
    });
})();

(function() {
    const $dataFilter = $('.tab-filter');

    $dataFilter.on('click', function() {
        const ele = $(this);
        const filterData = ele.attr('data-filter');
        const activeClass = 'current';
        const $newsList = $('.news-list');
        const $newsItem = $newsList.find('.news-item');
        ele.parents('.filter-tabs').find('.tab-filter').removeClass(activeClass)
        ele.addClass(activeClass)

        $newsItem.removeClass(activeClass);
        if (filterData !== "all") {
            $newsList.find('[data-filter-type="' + filterData + '"]').addClass(activeClass);
        } else {
            $newsItem.addClass(activeClass);
        }
    })

    $dataFilter.first().click();

    const swiper = new Swiper(".filter-tabs", {
        slidesPerView: 'auto'
    });
})();