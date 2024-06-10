function logout(){
    if(confirm ("Are you sure want to log out?")){
        window.location.href = '../logout.php'
    }
}

//  update user
function redirectToUpdate(id, username, email, idRole) {
    const url = `update.php?id=${id}&username=${username}&email=${email}&id_role=${idRole}`;
    window.location.href = url;
}

// active
// document.addEventListener('DOMContentLoaded', function() {
//     const links = document.querySelectorAll('.sidebar a');
//     const mainContentSections = document.querySelectorAll('.main-content h1');
//     links.forEach(function(link) {
//         link.addEventListener('click', function(e) {
//             e.preventDefault();
//             links.forEach(function(item) {
//                 item.classList.remove('active');
//             });
//             link.classList.add('active');
//             const target = link.getAttribute('href');
//             const targetSection = document.querySelector(target);
//             mainContentSections.forEach(function(section) {
//                 section.style.display = 'none';
//             });
//             targetSection.style.display = 'block';
//         });
//     });
// });

// ajax
const search = document.querySelector('.search-button');
const keyword = document.querySelector('.keyword');
const result = document.querySelector('.result');

search.style.display = 'none';

// event ketika nulis keyword
keyword.addEventListener('keyup', function() {
    console.log('Keyword input detected:', keyword.value);  // Debugging: Log the keyword input

    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        console.log('XHR state:', xhr.readyState, 'Status:', xhr.status);  // Debugging: Log the XHR state and status
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log( xhr.responseText);  
            result.innerHTML = xhr.responseText;
        }
    };

    xhr.open('GET', 'ajax/search_ajax.php?keyword='+keyword.value);
    xhr.send();
});


    // const searchValue = keyword.value;
    // if (searchValue) {
    //     fetch('../ajax/search_ajax.php?keyword=' + encodeURIComponent(searchValue))
    //     .then(response => response.text())
    //     .then(response => {
    //         container.innerHTML = response;
    //     });
    // } else {
    //     container.innerHTML = ''; // Clear the table if the input is empty
    // }