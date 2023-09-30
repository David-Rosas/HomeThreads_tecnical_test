function adjustItemWidth() {
    const specialItem = document.getElementById('special-item');
  
    if (window.innerWidth <= 768) {
      specialItem.classList.remove('border-right');
    } else {
      specialItem.classList.add('border-right');
    }
  }

  window.addEventListener('load', adjustItemWidth);
  window.addEventListener('resize', adjustItemWidth);