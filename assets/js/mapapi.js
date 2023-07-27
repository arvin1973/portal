// Initialize and add the map
function initMap() {
    // The location of Uluru
    const inipoin = { lat: -6.882545537415898, lng: 107.5039349674241 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 18,
        center: inipoin,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: inipoin,
        map: map,
    });
}