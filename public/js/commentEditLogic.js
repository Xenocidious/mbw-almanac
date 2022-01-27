
var comments = document.querySelectorAll(".comment_value");
var commentsHidden = document.querySelectorAll(".comment_value_hidden");

function editComment(e, i, v) {


    comments.forEach(forEachComments);
    function forEachComments(item, index) {

        item.style.display = 'block';
    }

    commentsHidden.forEach(forEachCommentsHidden);
    function forEachCommentsHidden(item, index) {
        item.style.display = 'none';
    }

    e.currentTarget.style.display = 'none';

    if(v == 'open'){
        document.querySelector('#p-input'+i+'opened').style.display = 'block';
    }else{
        document.querySelector('#p-input'+i).style.display = 'block';
    }
    document.querySelector('#p-input'+i).style.display = 'block';
}




//not working yet somehow
document.onkeydown=function(evt){
    var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
    if(keyCode == 27)
    {
        console.log('esc');
        comments.forEach(forEachComments);
        function forEachComments(item, index) {
            item.style.display = 'block';
        }

        commentsHidden.forEach(forEachCommentsHidden);
        function forEachCommentsHidden(item, index) {
            item.style.display = 'none';
        }
    }
}