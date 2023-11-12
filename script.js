


const share = document.querySelector(".share")
const like = document.querySelector(".like")
share.addEventListener('click', event => {
    if (navigator.share) {
        navigator.share({
            text: `welcome to my profile:
`,
            url: 'https://fadikbb.netlify.app/',

        }).then(() => {
            console.log('thanks for sharing!');
        })
            .catch((err) => console.error(err));
    } else {
        alert("the current browser does not support the sjare function. please ,manually share the link")
    }
});
let textShare = document.querySelector('.text-share');
share.addEventListener('click', e => {
    textShare.innerHTML++
})



let myComment = document.querySelector(".comment")
let x = document.querySelector(".fa-close")
let myInput = document.querySelector(".inputmsm")
let mySubmit = document.querySelector(".submit")
myComment.onclick = function () {
    document.forms[0].style.visibility = "visible"
    x.style.visibility = "visible"
    myInput.focus()
}
x.onclick = function () {
    document.forms[0].style.visibility = "hidden"
    x.style.visibility = "hidden"
}
document.forms[0].onsubmit = function (e) {
    let uservalid = false
    if (myInput.value.length >= 1) {
        uservalid = true
    }
    console.log(myInput.value.length)
    console.log(uservalid)
    if (uservalid == false) {
        e.preventDefault()
    }
}

const likeIcon = document.querySelector(".fa-heart")
let textLike = document.querySelector('.text-like');
like.addEventListener('click', e => {
    if (likeIcon.style.color == "red") {
        likeIcon.style.color = "black";
        textLike.innerHTML--;
    }
    else {
        likeIcon.style.color = "red";
        textLike.innerHTML++;
    }

})
$(document).ready(function(){
    $(".like").click(function(){
        $.ajax({
            url: "myDatabase.php",
            type: "POST",
            data: {name: "John", location: "Boston"},
            success: function(result){
                $("#myDiv").html(result);
            }
        });
    });
});

