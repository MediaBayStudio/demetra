;(function () {
  // const navLinks = qa('.nav-link');
  // const mobileMenu = q('#mobile-menu');
// console.log(menu);

  menu.menu.addEventListener('click', function(e) {
    let target = e.target;
    if (target.classList.contains('nav-link')) {
      menu.close();
    }
  });

  // navLinks.forEach( link => {
    // link.addEventListener('click', function() {
      // mobileMenu.classList.remove('active')
    // })
  // })
})()