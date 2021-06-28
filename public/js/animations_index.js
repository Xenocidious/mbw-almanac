var images = ['NY', 'NY2', 'LO', 'UK1', 'UK2'];

var lastRand = 0;

setInterval(function(){
    var rand = Math.floor(Math.random() * 4);

    while(rand == lastRand){
        rand = Math.floor(Math.random() * 4);
    }
    
    index_content_1.style.backgroundImage = 'url("../public/images/cities/' + images[rand] + '.jpg")';
    lastRand = rand;
    
}, 10000);