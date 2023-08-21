(function () {
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

		inputs.forEach(function (i, j) {
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
				case 'textarea':
					condition = i.value === '';
					checkConditions(condition, i, valid);
				case 'select':
					condition = i.value === '';
					checkConditions(condition, i, valid);
					break;
				case 'tel':
					condition = i.value === '' || isNaN(i.value);
					checkConditions(condition, i, valid);
					break;
				case 'email':
					const regEmail = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
					condition = i.value === '' || !regEmail.test(i.value);
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

	form.addEventListener('submit', function (e) {
		e.preventDefault();
		const checkValid = validatInputs();
		if (checkValid === false)
			return;

		let formData = new FormData();
		let request = new XMLHttpRequest();
		for (let $field of inputs) {
			formData.append($field.name, $field.value);
		}
		formData.append('_token', document.querySelector('input[name="_token"]').value);
		request.open("POST", "/contact-us/api/v1/contact");
		request.send(formData);
		form.reset();
		new bootstrap.Toast(document.querySelector('.toast')).show();
	});
})();