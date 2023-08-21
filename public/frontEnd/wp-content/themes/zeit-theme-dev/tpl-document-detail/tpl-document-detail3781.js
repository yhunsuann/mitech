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
        if (checkValid === false)
            return;

        let formData = new FormData();
        let request = new XMLHttpRequest();
        formData.append(subscriptionInput.name, subscriptionInput.value);
        request.open("POST", ajax_url + "?action=contactUs");
        request.send(formData);
        subscriptionform.reset();
        new bootstrap.Toast(document.querySelector('.toast')).show();
    });
})();

$(function() {
    $(".show-form").on("click", function(e) {
        e.preventDefault();

        $(".modal-form").addClass("showForm");
        $("body").addClass("overflow-hidden");
    });

    $(".icon-close").on("click", function() {
        $("body").removeClass("overflow-hidden");
        $(".modal-form").removeClass("showForm");
    });


    $(".show-form").on('click', function(e) {
        $(".modal-form").addClass("showForm");
        $("body").addClass("overflow-hidden");
        e.preventDefault();
        e.stopPropagation();
    });

    $("body").click(function() {
        $(".modal-form").removeClass("showForm");
        $("body").removeClass("overflow-hidden");
    });

    // Prevent events from getting pass .popup
    $("#info").click(function(e) {
        e.stopPropagation();
    });


    const form = document.getElementById('form-csbh');
    const inputs = form.querySelectorAll('.form-control');
    const successMessage = document.querySelector('.success-message');
    const modal = document.querySelector(".modal-form");
    const body = document.getElementsByTagName("body")[0];

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        let formData = new FormData();
        let request = new XMLHttpRequest();
        for (var $field of inputs) {
            formData.append($field.name, $field.value);
        }
        request.open("POST", ajax_url + "?action=formChinhSachBaohanh");
        request.send(formData);
        form.reset();
        successMessage.classList.add('showing');
        const myTimeout = setTimeout(myGreeting, 3000);

        function myGreeting() {
            successMessage.classList.remove('showing');
        }
        modal.classList.remove('showForm');
        body.classList.remove('overflow-hidden');
    });
});