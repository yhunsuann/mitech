(function() {
    const distributorForm = document.getElementById('distributor-join-form');
    const dealerForm = document.getElementById('dealer-join-form');
    const installerForm = document.getElementById('installer-join-form');
    const popup = $("#joinModal");
    let type_submit = 'distributors';

    $('.btn-tab').click(function() {
        type_submit = $(this).text()
    })
    console.log(type_submit);

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

    function validatInputs(input) {
        let valid = [];
        let condition;
        let checkAttr;

        input.forEach(function(i, j) {
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

    function resetPopup() {
        const formGroup = popup.find(".form-group");
        if (formGroup.hasClass('errorShowing')) {
            formGroup.removeClass('errorShowing');
        }

        distributorForm.reset();
        dealerForm.reset();
        installerForm.reset();
        $('#district-f').find('option').remove();
    }

    function submitHandler(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formControl = form.querySelectorAll('.form-control');
            const checkValid = validatInputs(formControl);
            if (checkValid === false)
                return;

            let formData = new FormData();
            let request = new XMLHttpRequest();
            formData.append('city', $('#city-f option:selected').text());
            for (let $field of formControl) {
                formData.append($field.name, $field.value);
            }

            formData.append("form_type", type_submit);
            formData.append("action", "submitContact");
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            request.open("POST", '/where-to-buy/api/v1/distributors');
            request.setRequestHeader('X-CSRF-Token', csrfToken);
            request.send(formData);
            this.reset();
            $('#district-f').find('option').remove();
            new bootstrap.Toast(document.querySelector('.toast')).show();
        });
    }

    popup.on("hidden.bs.modal", resetPopup);
    submitHandler(distributorForm);
    submitHandler(dealerForm);
    submitHandler(installerForm);
})();

(function() {
    const citis = document.getElementById("city");
    const districts = document.getElementById("district");
    const region = document.getElementById("region");
    const totalText = $('.total-text');
    const citiForm = document.getElementById("city-f");
    const districtForm = document.getElementById("district-f");

    const urls = {
        "location": data_url,
        "distributors": distributors_url
    }
    const distributorButtons = $('input[name="category"]');

    function renderCity(locationData, city, district) {
        for (const x of locationData) {
            city.options[city.options.length] = new Option(x.Name, x.Id);
        }
        city.onchange = function() {
            district.length = 1;
            if (this.value != "") {
                const cityresult = locationData.filter(n => n.Id === this.value);
                console.log(cityresult, 123123)
                for (const k of cityresult[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Name);
                }
            }
        };
    }

    function filterData(data, value, field) {
        if (typeof value === "string" || typeof value === "number") {
            return filterByValue(data, field, value);
        } else {
            return filterByValues(data, value);
        }


    }

    function filterByValue(data, field, value) {
        return data.filter((item) => {
            return item[field] === value;
        });
    }

    function filterByValues(data, value) {
        return data.filter((item) => {
            for (const prop in value) {
                if (prop === "districts") {
                    for (let i = 0; i < item.districts.length; i++) {
                        if (item.districts[i] === value[prop]) {
                            return true;
                        }
                    }
                    return false;
                } else if (item[prop] !== value[prop]) {
                    return false;
                }
            }
            return true;
        });
    }

    function renderPhone(list) {
        let html = `<a href="tel:${list}" class="btn"><span class="icon-phone me-2"></span>${list}</a>`;

        return html;
    }

    function renderDistrict(list) {
        let html = `<span class="district-item">${list}</span>`;

        return html;
    }

    function countData(number, type) {
        console.log("Distributor: " + type);
        totalText.html('');
        if (document.documentElement.lang != 'en-US') {
            let lang = {
                Distributors : 'nhà phân phối',
                Retailers: 'cửa hàng đại lý',
                Installers: 'nhà thầu thợ'
            }
            type = lang[type]
        }
        let total = `<span class="total">${number}</span>&nbsp;<span class="type">${type.toLowerCase()}</span>`;
        $(total).prependTo(totalText);

    }

    function renderLayout(data, element) {
        const distributorValue = distributorButtons.filter(":checked").val();

        if (data.length !== 1) {
            countData(data.length, distributorValue);
        } else {
            countData(data.length, distributorValue);
        }

        data.map((item) => {
            let htmlBtn = renderPhone(item.phone);
            let districtsList = '';
            item.districts ? districtsList = renderDistrict(item.districts) : '';
            var lb_address = "Địa chỉ";
            if (document.documentElement.lang == 'en-US') {
                lb_address = "Address";
            }
            console.log(item.title, 12313)
            if (item.title && item.title != '') {
                let content = `<div class="distributor-item ${item.category}-item">
    <div class="content">
      <h5 class="name">${item.title}</h5>
      <p class="info address"><span class="label-text">` + lb_address + `: </span>${item.location}</p>`;

                if (item.region != undefined)
                    content += `<p class="info region"><span class="label-text">Khu vực thi công: </span>${item.region}</p>`;

                if (item.website != undefined)
                    content += `<p class="info website"><span class="label-text">Website: </span><a href="${item.website}" target="_blank">${item.website}</a></p>`;

                if (item.email != undefined)
                    content += `<p class="info email"><span class="label-text">Email: </span><a href="email: ${item.email}">${item.email}</a></p>`;

                if (item.districts != undefined)
                    content += `<p class="info districtsList">${districtsList}</p>`;

                content += `<p class="info phones">${htmlBtn}</p></div>`;

                if (item.thumbnail != undefined)
                    content += `<div class="thumb"><img src="${item.thumbnail}" alt=""></div>`

                content += `</div>`;
                $(content).appendTo(element);
            }
        });
    }

    function initMap(data) {
        let markers = [];
        const image = {
            url: '/frontEnd/wp-content/themes/zeit-theme-dev/images/web_clip.jpg',
            scaledSize: new google.maps.Size(35, 33)
        };
        const locations = data;
        let map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 16.4637,
                lng: 107.5909
            },
            zoom: 6,
            mapTypeControl: false,
            streetViewControl: false,
        });

        if (locations) {
            for (let i = 0; i < locations.length; i++) {
                addMarker(locations[i]);
            }
        }

        function addMarker(properties) {
            let htmlBtn = renderPhone(properties.phone);
            let districtsList = '';
            properties.districts ? districtsList = renderDistrict(properties.districts) : '';
            let lb_address = "Địa chỉ";
            if (document.documentElement.lang == "en-US") {
                lb_address = "Address";
            }
            let content = `<div class="distributor-item ${properties.category}-item">
				<div class="content">
				<h5 class="name">${properties.title}</h5>
				<p class="info address"><span class="label-text">` + lb_address + `: </span>${properties.location}</p>`;

            if (properties.region != undefined)
                content += `<p class="info region"><span class="label-text">Khu vực thi công: </span>${properties.region}</p>`;

            if (properties.website != undefined)
                content += `<p class="info website"><span class="label-text">Website: </span><a href="${properties.website}" target="_blank">${properties.website}</a></p>`;

            if (properties.email != undefined)
                content += `<p class="info email"><span class="label-text">Email: </span><a href="email: ${properties.email}">${properties.email}</a></p>`;

            if (properties.districtsList)
                content += `<p class="info districtsList">${districtsList}</p>`;

            content += `<p class="info phones">${htmlBtn}</p></div></div>`;

            const icon = image;
            const position = new google.maps.LatLng(properties.latitude, properties.longitude);
            const infoWindow = new google.maps.InfoWindow({
                content: ''
            });
            const marker = new google.maps.Marker({
                map: map,
                icon: icon,
                position: position,
                infowindow: infoWindow
            });

            markers.push(marker);
            if (properties.icon) {
                marker.setIcon(properties.icon);
            }

            google.maps.event.addListener(marker, 'click', (function(marker, content) {
                return function() {
                    infoWindow.setContent(content);
                    infoWindow.open(map, marker);
                    map.panTo(this.getPosition());
                    map.setZoom(6);
                    closeAllInfoWindows(map);
                    this.infowindow.open(map, this);
                }
            })(marker, content));
        }

        function closeAllInfoWindows(map) {
            markers.forEach(function(marker) {
                marker.infowindow.close(map, marker);
            });
        }
    }

    async function fetchData(url) {
        let hostData = await fetch(url);
        let hostJson = await hostData.json();
        return hostJson;
    }

    async function getActivity() {
        const locationData = await fetchData(urls.location);
        const data = await fetchData(urls.distributors);
        renderCity(locationData, citis, districts);
        return data;
    }

    function firstInit() {
        getActivity().then(function(data) {
            const distributorValue = distributorButtons.filter(":checked").val();
            console.log(distributorValue, 123132);
            const dealers = filterData(data, distributorValue, 'category', );
            renderLayout(dealers, '#locationList');
            initMap(dealers);
        })
    }

    function clean(obj) {
        for (let propName in obj) {
            if (obj[propName] === '') {
                delete obj[propName];
            }
        }
        return obj
    }

    function resetSelect() {
        $(".list-map .form-select").prop('selectedIndex', 0);
        $(district).find('option:not(:first)').remove();
    }

    const filterObj = {
        "category": "Retailers",
        "city": "",
        "districts": "",
        "region": ""
    };

    const inputs = [distributorButtons, citis, districts, region];

    for (let i = 0; i < inputs.length; i++) {
        $(inputs[i]).on("change", function() {
            $('#locationList').html('');
            const citisParent = $(citis).parent();
            const districtsParent = $(districts).parent();
            const regionParent = $(region).parent();
            const inputName = $(this).attr("name");
            const inputValue = $(this).val();
            const hideClass = "hide";
            let inputText;
            let isCity = (inputName === "city" && inputValue === "") || (inputName === "city" && filterObj[inputName] === filterObj.city);

            if (inputValue !== "") {
                inputText = $(this).children(':selected').text();
            } else {
                inputText = ""
            }

            if (inputName === "category") {
                filterObj[inputName] = inputValue;
                resetSelect();

                delete filterObj.city;
                delete filterObj.districts;
                delete filterObj.region;

                if (inputValue === "distributors") {
                    citisParent.addClass(hideClass);
                    districtsParent.addClass(hideClass);
                    regionParent.removeClass(hideClass);
                } else {
                    citisParent.removeClass(hideClass);
                    districtsParent.removeClass(hideClass);
                    regionParent.addClass(hideClass);
                }
            } else if (isCity) {
                filterObj[inputName] = inputText;
                delete filterObj.districts;
            } else {
                filterObj[inputName] = inputText;
            }

            let cleanFilter = clean(filterObj);
            getActivity().then(function(data) {
                const filters = filterData(data, cleanFilter);
                renderLayout(filters, '#locationList');
                initMap(filters);
            })
        })
    }

    firstInit();
})()