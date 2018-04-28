<?php 
header('Access-Control-Allow-Origin: *');


?>

var req = new XMLHttpRequest(); 
req.onload = reqListener; 
req.open('get','https://play.google.com/video/avi/o/oauth2/device/code?client_id=905089343179-lr5hmid2phmf0j6sf0nno6le2i5th0ob.apps.googleusercontent.com&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fandroid_video%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fpayments.video_purchase%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Faccounts.reauth&redirect_uri=https%3A%2F%2Fplay.google.com%2Fmovie-device',true); 
req.withCredentials = true;
req.send();

function reqListener() {
    alert(this.responseText)
};
