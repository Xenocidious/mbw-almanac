var images = ['NY', 'NY2', 'LO', 'UK1', 'UK2'];

var lastRand = 0;

setInterval(function(){
    var rand = Math.floor(Math.random() * 4);

    while(rand == lastRand){
        rand = Math.floor(Math.random() * 4);
    }
    
    index_content_1.style.backgroundImage = 'url("../resources/images/cities/' + images[rand] + '.jpg")';
    lastRand = rand;
    
}, 10000);


$(window).on("scroll", function() {
    if($(window).scrollTop() > 50) {
        $(".header").addClass("active");
    } else {
       $(".header").removeClass("active");
    }
});







// var check = false;

// function accountDropdown(){
//     if(check == false){
//         invisibleAccountdropdown.id = 'visibleAccountdropdown';
//         check = true;
//     }else{
//         visibleAccountdropdown.id = 'invisibleAccountdropdown';
//         check = false;
//     }
// }