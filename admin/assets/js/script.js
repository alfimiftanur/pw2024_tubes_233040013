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
