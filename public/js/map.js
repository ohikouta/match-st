/* global google */
document.addEventListener("DOMContentLoaded", function () {
  const eventAddressElement = document.getElementById("eventAddress"); // ビューのアドレス要素を取得

  // eventAddress 要素が存在する場合の処理
  if (eventAddressElement) {
    const eventAddress = eventAddressElement.textContent; // ビューのアドレス要素からテキストを取得

    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
    });

    const geocoder = new google.maps.Geocoder();
    geocoder.geocode(
      {
        address: eventAddress, // イベントの住所を使用
        region: "jp",
      },
      function (result, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          const location = result[0].geometry.location;
          const marker = new google.maps.Marker({
            position: location,
            map: map,
            title: location.toString(),
            draggable: true,
          });

          map.setCenter(location);

          google.maps.event.addListener(
            marker,
            "dragend",
            function (event) {
              const latLng = event.latLng;
              marker.setTitle(latLng.toString());

              const geocoder = new google.maps.Geocoder();
              geocoder.geocode(
                { location: latLng },
                function (result, status) {
                  if (status == google.maps.GeocoderStatus.OK) {
                    let address = "";
                    const addressComponents = result[0].address_components;
                    for (let i = 0; i < addressComponents.length - 2; i++) {
                      address = addressComponents[i].long_name + address;
                    }
                    document.getElementById("address").value = address;
                  }
                }
              );
            }
          );
        } else {
          alert("住所を確認してください");
        }
      }
    );
  } else {
    console.error("eventAddress要素が存在しません。");
  }
});
