Webcam.set({
    width: 220,
    height: 190,
    image_format: 'jpeg',
    jpeg_quality: 200
});
Webcam.attach('#camera');

takeSnapShot = function () {
    Webcam.snap(function (data_uri) {
    	$(".image").val(data_uri);
        document.getElementById('snapShot').innerHTML = 
            '<img name="upload_snapshot" src="' + data_uri + '" width="180px" height="152px" />';
    });
}
