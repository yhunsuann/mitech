$(function() {
    const form = document.getElementById('form-csbh');
    const inputs = form.querySelectorAll('.form-control');
    const successMessage = document.querySelector('.success-message');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        let formData = new FormData();
        let request = new XMLHttpRequest();
        for (var $field of inputs) {
            formData.append($field.name, $field.value);
        }
        formData.append('action', "submitContact");
        formData.append('form_type', "Form Bảo Hành");
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        request.open("POST", '/resources/api/v1/warranty-policy-form');
        request.setRequestHeader('X-CSRF-Token', csrfToken);
        request.send(formData);
        form.reset();
        successMessage.classList.add('showing');
        const myTimeout = setTimeout(myGreeting, 3000);

        function myGreeting() {
            successMessage.classList.remove('showing');
        }
    });
});