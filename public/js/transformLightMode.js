console.log('light mode enabled');

document.body.setAttribute("class", "lightThemeBackgroundColor");


//header
for(i=0; i<document.getElementsByClassName("header_button").length; i++){
    document.getElementsByClassName('header_button')[i].style.color = 'black';
    document.getElementsByClassName('header_button')[i].style.border = '1.5px solid black';
    document.getElementById('header').style.borderBottom = ' .5px solid rgba(0, 0, 0, 0);';
}

//footer
document.querySelector('footer').style = 'background-color: white';
document.querySelector('footer').style.color = 'black';

for(i=0; i<document.getElementsByClassName('footer_hr').length; i++){
    document.getElementsByClassName('footer_hr')[i].style = 'width:50%;text-align:left;margin-left:2.5vw;background-color:black;height:.5px;';
}

console.log('current page: ' + document.title);

//styling for specific pages (this prevents conflicts with non existing classnames etc)
if(document.title == 'photohub - almanac'){
    for(i=0; i< document.getElementsByClassName('photohub_stats').length; i++){
        document.getElementsByClassName('photohub_stats')[i].style.backgroundColor = 'white';
        document.getElementsByClassName('photohub_content')[i].style.background = 'linear-gradient(90deg, rgba(255,255,255,.5) 0%, rgba(255,255,255,.51) 50%, rgba(255,255,255,0) 50%, rgba(255,255,255,0) 100%)';
    }
    document.getElementById('add_image_photohub').style.color = 'black';
}

if(document.title == 'awesome photo - almanac'){
    document.getElementsByClassName('upload_photo_form')[0].setAttribute("class", "upload_photo_form_light");
    
    var h = document.getElementsByTagName('input');
    for(i=0; i<h.length; i++){
        h[i].classList.add("input_light_theme");
        if (h[i].classList.length === 0) {
            console.log(h[i]);
        }
    }
}

if(document.title == 'image - almanac'){
    commentsection_top_bar.style.backgroundColor = 'white';
    commentsection_top_bar.style.color = 'black';
    commenting_form.style.backgroundColor = 'white';
    commenting_form.style.borderRadius = '0';
    document.getElementById('comment_section').style.backgroundColor = 'white';
    for(i=0; i<document.getElementsByClassName('comment').length; i++){
        document.getElementsByClassName('comment')[i].style.backgroundColor = 'white';
    }
}

// document.getElementsByClassName('upload_photo_form')[0].style.background = 'rgba(255,255,255,.55);';