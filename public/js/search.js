function handleIntersection(entries, observer) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = "1";
      } else {
        entry.target.style.opacity = "0";
      }
    });
  }

  // Create an Intersection Observer
  const options = {
    root: null,
    rootMargin: "0px",
    threshold: 0.5, // Adjust this threshold as needed
  };

  const observer = new IntersectionObserver(handleIntersection, options);

  // Target the element you want to fade in/out
  const fadeInSection = document.getElementById("fade-in-section");

  // Start observing when it comes into the viewport
  observer.observe(fadeInSection);