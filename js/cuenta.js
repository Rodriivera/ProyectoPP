  // Mostrar elementos ocultos al aparecer en pantalla

  const hiddenElements = document.querySelectorAll('.hidden');

  const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
          if (entry.isIntersecting) {
              entry.target.classList.remove('hidden');
              entry.target.classList.add('show');
          }
      });
  });
  
  hiddenElements.forEach(element => {
      observer.observe(element);
  });
  
  // fin mostrar elementos ocultos al aparecer en pantalla