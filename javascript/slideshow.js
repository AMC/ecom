// (C) 2000 www.CodeLifter.com
// http://www.codelifter.com
// Free for all users, but leave in this  header

// =======================================
// set the following variables
// =======================================

// Set speed (milliseconds)
var speed = 6000

// Specify the image files
var Pic = new Array() // don't touch this
// to add more images, just continue
// the pattern, adding to the array below

Pic[0] = 'images/slideshow/pic1.jpg'
Pic[1] = 'images/slideshow/pic2.jpg'
Pic[2] = 'images/slideshow/pic3.jpg'
Pic[3] = 'images/slideshow/pic4.jpg'
Pic[4] = 'images/slideshow/pic5.jpg'
Pic[5] = 'images/slideshow/pic6.jpg'
Pic[6] = 'images/slideshow/pic7.jpg'
Pic[7] = 'images/slideshow/pic10.jpg'
Pic[8] = 'images/slideshow/pic11.jpg'
Pic[9] = 'images/slideshow/pic12.jpg'
Pic[10] = 'images/slideshow/pic13.jpg'
Pic[11] = 'images/slideshow/pic14.jpg'
Pic[12] = 'images/slideshow/pic15.jpg'


// =======================================
// do not edit anything below this line
// =======================================

var t
var j = 0
var p = Pic.length

var preLoad = new Array()
for (i = 0; i < p; i++){
   preLoad[i] = new Image()
   preLoad[i].src = Pic[i]
}

function runSlideShow(){
   document.images.SlideShow.src = preLoad[j].src
   j = j + 1
   if (j > (p-1)) j=0
   t = setTimeout('runSlideShow()', speed)
}
