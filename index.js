function toggleLike() {
    let likeIcon = document.querySelector(".fa-heart");
    if (likeIcon.style.color === "red") {
        likeIcon.style.color = "black";
        save('unlike');
    } else {
        likeIcon.style.color = "red";
        save('like');
    }
}

function save(action) {
    // Perform AJAX request to update likes in the database
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Update the UI with the new like count
            var countElement = document.querySelector('.text-like');
            countElement.innerHTML = xhr.responseText;
        }
    };
    xhr.open('POST', 'handle_like.php', function (data, two, three) {
        console.log(data)
        console.log(two)
        console.log(three)
    });
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('action=' + action);
}


//-------------------------------------------------------
const share = document.querySelector(".share")
const like = document.querySelector(".like")
share.addEventListener('click', event => {
    if (navigator.share) {
        navigator.share({
            text: `welcome to my profile:`,
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
function toggleShare() {
    // Perform the share action
    save('share');
    
    // Update the share count in the UI
    let textShare = document.querySelector('.text-share');
    textShare.innerHTML++;
}

//--------------------------------------------------
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
//------------------------------------------------------
