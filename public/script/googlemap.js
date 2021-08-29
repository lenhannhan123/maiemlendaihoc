var searchInput = 'address';

$(document).ready(function () {
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        types: ['geocode'],
        componentRestrictions: {
            country: "VN"
        }
    });

    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
    });
});




function ConvertAdd(address) {
    const KEY = "AIzaSyDi2UpnA_1qXGCGZmnqx-UegSOGAmIspD8";
    let url = `https://maps.googleapis.com/maps/api/geocode/json?address=${address}&key=${KEY}`;

    var request = new XMLHttpRequest();
    request.open('GET', url, false);  // `false` makes the request synchronous
    request.send(null);

    if (request.status === 200) {// That's HTTP for 'ok'
        loc = JSON.parse(request.responseText);
        return loc.results[0].geometry.location
    }
}