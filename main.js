// Navigation toggle
const navToggle = document.querySelector('.nav-toggle');
const navMenu = document.querySelector('.nav-menu');

navToggle.addEventListener('click', () => {
  navToggle.classList.toggle('active');
  navMenu.classList.toggle('active');
});

// Close mobile menu when clicking a link
document.querySelectorAll('.nav-link').forEach(link => {
  link.addEventListener('click', () => {
    navToggle.classList.remove('active');
    navMenu.classList.remove('active');
  });
});

// Smooth scroll for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      window.scrollTo({
        top: target.offsetTop - document.querySelector('.header').offsetHeight,
        behavior: 'smooth'
      });
    }
  });
});

// Intersection Observer for animations
const observeElements = () => {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.1 });

  // Observe about section images
  document.querySelectorAll('.about-image').forEach(image => {
    observer.observe(image);
  });
};

// Handle dark mode
const handleDarkMode = () => {
  const darkModeMediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
  
  const updateTheme = (e) => {
    document.documentElement.classList.toggle('dark-mode', e.matches);
  };

  darkModeMediaQuery.addEventListener('change', updateTheme);
  updateTheme(darkModeMediaQuery);
};

// Contact form handling
const handleContactForm = () => {
  const form = document.getElementById('contact-form');
  
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    
    // Here you would typically send the form data to a server
    // For this example, we'll just show the success message
    alert('Votre message a bien été envoyé');
    
    // Reset the form
    form.reset();
  });
};

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  observeElements();
  handleDarkMode();
  handleContactForm();
});