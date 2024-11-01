  // Mostrar elementos ocultos al aparecer en pantalla

  const hiddenElements = document.querySelectorAll('.hiddenn');

  const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
          if (entry.isIntersecting) {
              entry.target.classList.remove('hiddenn');
              entry.target.classList.add('show');
          }
      });
  });
  
  hiddenElements.forEach(element => {
      observer.observe(element);
  });
  
  // fin mostrar elementos ocultos al aparecer en pantalla