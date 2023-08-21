(function () {
  let markers = [];
    function initMap(data) {
        const image = {
          url: "coreUi/assets/img/map/icon_map.png",
          scaledSize: new google.maps.Size(70, 53),
        };
        const locations = data;
        let map = new google.maps.Map(document.getElementById("map"), {
            center: {
              lat: 16.4637,
              lng: 107.5909,
            },
            zoom: 6,
            mapTypeControl: false,
            streetViewControl: false,
        });
        // Xóa các marker hiện có trên bản đồ
        clearMarkers();
  
        if (locations) {
            for (let i = 0; i < locations.length; i++) {
                addMarker(locations[i]);
            }
        }
    }
    function addMarker(properties, image, map) {
        let districtsList = "";
        properties.districts
          ? (districtsList = renderDistrict(properties.districts))
          : "";
        let lb_address = "Vui lòng chọn";
        if (document.documentElement.lang == "en-US") {
          lb_address = "Address";
        }
        let content =
          `<div class="distributor-item ${properties.category}-item">
                <div class="content">
                <h5 class="name">${properties.title}</h5>
                <p class="info address"><span class="label-text">` +
          lb_address +
          `: </span>${properties.location}</p>`;
  
        if (properties.region != undefined)
          content += `<p class="info region"><span class="label-text">Khu vực thi công: </span>${properties.region}</p>`;
  
        if (properties.website != undefined)
          content += `<p class="info website"><span class="label-text">Website: </span><a href="${properties.website}" target="_blank">${properties.website}</a></p>`;
  
        if (properties.email != undefined)
          content += `<p class="info email"><span class="label-text">Email: </span><a href="email: ${properties.email}">${properties.email}</a></p>`;
  
        if (properties.districtsList)
          content += `<p class="info districtsList">${districtsList}</p>`;
  
        const icon = image;
        const position = new google.maps.LatLng(
          properties.latitude,
          properties.longitude
        );
        const infoWindow = new google.maps.InfoWindow({
          content: "",
        });
        const marker = new google.maps.Marker({
          map: map,
          icon: icon,
          position: position,
          infowindow: infoWindow,
        });
  
        markers.push(marker);
        if (properties.icon) {
          marker.setIcon(properties.icon);
        }
  
        google.maps.event.addListener(
          marker,
          "click",
          (function (marker, content) {
            return function () {
              infoWindow.setContent(content);
              infoWindow.open(map, marker);
              map.panTo(this.getPosition());
              map.setZoom(6);
              closeAllInfoWindows(map);
              this.infowindow.open(map, this);
            };
          })(marker, content)
        );
    }
    
    function closeAllInfoWindows(map) {
      markers.forEach(function (marker) {
        marker.infowindow.close(map, marker);
      });
    }
  
    function firstInit() {
      let dealers = [
          {
            "id": 1,
            "latitude": "12.25737",
            "longitude": "109.14060",
            "category": "Retailers",
            "title": "SƠN TÙNG",
            "location": "Km9, đường 23/10, Xã Diên An, Huyện Diên Khánh, Khánh Hòa",
            "city": "Khánh Hòa",
            "region": [
                "Huyện Diên Khánh"
            ],
            "phone": [
                "0905 248 739"
            ]
          },
          {
            "id": 2,
            "latitude": "10.78854",
            "longitude": "106.59520",
            "category": "Retailers",
            "title": "THẮNG LONG",
            "location": "654A Quốc Lộ1A, Phường Bình Hưng Hòa B, Quận Bình Tân, Thành phố Hồ Chí Minh",
            "city": "Thành phố Hồ Chí Minh",
            "region": [
                "Quận Bình Tân"
            ],
            "phone": [
                "0913 117 809"
            ]
          },
          {
            "id": 3,
            "latitude": "20.9583172",
            "longitude": "105.6975817",
            "category": "Retailers",
            "title": "Trung Thành",
            "location": "số 21 ngõ 89 phố vũ đức thận phường việt hưng quận Long biên",
            "city": "Thành phố Hà Nội",
            "region": [
                "Thành phố Hà Nội"
            ],
            "phone": [
                "0399889846"
            ],
            "email": "thachcaotrungthanh@gmail.com"
        }
      ];
      console.log(dealers);
      initMap(dealers);
    }
  
    firstInit();

    $(document).ready(function () {
      // Gắn sự kiện "change" cho các nút radio chứa tùy chọn category
      $('.btn-tab .btn-radio').on('change', function () {
         const selectedCategory = $(this).val();
         handleCategoryFilter(selectedCategory);
      });

      // Hàm xử lý khi người dùng chọn category
      function handleCategoryFilter(category) {
         // Gọi ajax và cập nhật dữ liệu tương ứng với category đã chọn
         $.ajax({
            url: "/where-to-buy/index", // Thay đổi url api tại đây nếu cần
            method: "GET",
            data: {
               category: category
            },
            success: function (data) {
               // Gọi hàm updateDataAndMap để cập nhật dữ liệu và bản đồ
               updateDataAndMap(data);
            },
            error: function (error) {
               console.error("Lỗi khi gọi API: ", error);
            }
         });
      }

      // Hàm cập nhật dữ liệu dựa trên dữ liệu nhận từ API
      function updateData(data) {
         const locationListElement = $('#locationList');
         locationListElement.empty(); // Xóa dữ liệu cũ trong #locationList (nếu có)

         // Hiển thị thông tin dựa trên category tại đây
         data.forEach((location) => {
            const listItem = $('<div class="distributor-item"></div>');
            // Render dữ liệu dựa trên category tại đây
            // ...
            listItem.html(content);
            locationListElement.append(listItem);
         });
      }

      // Hàm cập nhật bản đồ dựa trên dữ liệu nhận từ API
      data.forEach((location) => {
        // Lấy thông tin vị trí (latitude và longitude) của location
        const latitude = location.latitude;
        const longitude = location.longitude;
  
        // Tạo một marker (đánh dấu) tại vị trí này trên bản đồ
        const marker = new google.maps.Marker({
           position: { lat: latitude, lng: longitude },
           map: map,
           title: location.name, // Tiêu đề khi di chuột vào marker
        });
     });

      // Hàm cập nhật dữ liệu và bản đồ dựa trên dữ liệu nhận từ API
      function updateDataAndMap(data) {
         updateData(data); // Hàm cập nhật dữ liệu
         updateMap(data); // Hàm cập nhật bản đồ
      }

      // Kiểm tra nếu trang web đã chứa tham số category trong URL
      const urlParams = new URLSearchParams(window.location.search);
      const categoryParam = urlParams.get('category');
      if (categoryParam) {
         // Xử lý khi trang web đã có tham số category
         // Gọi hàm handleCategoryFilter để cập nhật dữ liệu dựa trên category từ URL
         handleCategoryFilter(categoryParam);
      } else {
         // Mặc định hiển thị dữ liệu cho category "Retailers" khi trang web được load lần đầu
         const defaultCategory = "{{ __('message.retailers') }}";
         handleCategoryFilter(defaultCategory);
      }
    });
  })()
