<script setup>
// If we need any interactions or dynamic content in the future, 
// we can add them here
</script>

<template>
  <section class="about-section">
    <div class="container">
      <div class="about-grid">
        <!-- Content Column -->
        <div class="about-content title-one">
          <h2 class="section-title main-font">Empowering Global Talent</h2>
          <div class="section-text">
            <p>
              At Xuriel, we bridge the gap between exceptional talent and 
              innovative opportunities worldwide. Our platform connects skilled 
              professionals with leading companies, fostering growth and 
              transforming careers.
            </p>
            <p>
              With our extensive network and cutting-edge technology, we've 
              helped thousands of professionals find their dream roles while 
              enabling businesses to build high-performing teams across borders.
            </p>
          </div>
          <a href="/about-us" class="cta-button">
            Learn More About Us
            <svg 
              class="arrow-icon" 
              xmlns="http://www.w3.org/2000/svg" 
              viewBox="0 0 24 24" 
              fill="none" 
              stroke="currentColor"
            >
              <path 
                stroke-linecap="round" 
                stroke-linejoin="round" 
                stroke-width="2" 
                d="M14 5l7 7m0 0l-7 7m7-7H3"
              />
            </svg>
          </a>
        </div>

        <!-- Image Column -->
        <div class="image-wrapper">
          <div class="image-container">
            <svg class="about-illustration" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
              <!-- Modern abstract illustration representing global connectivity -->
              <defs>
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                  <stop offset="0%" style="stop-color:#2563eb;stop-opacity:0.2" />
                  <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:0.1" />
                </linearGradient>
                <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="0%">
                  <stop offset="0%" style="stop-color:#2563eb;stop-opacity:1" />
                  <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:1" />
                </linearGradient>
              </defs>
              
              <!-- Background Elements -->
              <circle cx="200" cy="200" r="180" fill="url(#grad1)" />
              
              <!-- Connected Nodes representing global network -->
              <circle cx="150" cy="150" r="20" fill="url(#grad2)" />
              <circle cx="280" cy="180" r="15" fill="url(#grad2)" />
              <circle cx="180" cy="280" r="18" fill="url(#grad2)" />
              <circle cx="250" cy="250" r="12" fill="url(#grad2)" />
              
              <!-- Connection Lines -->
              <path d="M150 150 L280 180" stroke="url(#grad2)" stroke-width="2" />
              <path d="M280 180 L250 250" stroke="url(#grad2)" stroke-width="2" />
              <path d="M250 250 L180 280" stroke="url(#grad2)" stroke-width="2" />
              <path d="M180 280 L150 150" stroke="url(#grad2)" stroke-width="2" />
              
              <!-- Central Element -->
              <circle cx="200" cy="200" r="40" fill="url(#grad2)" opacity="0.8" />
              <circle cx="200" cy="200" r="35" fill="white" opacity="0.3" />
            </svg>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.about-section {
  padding: 6rem 0;
  background-color: #f8fafc;
  overflow: hidden;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1.5rem;
}

.about-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4rem;
  align-items: center;
}

.about-content {
  max-width: 570px;
}

/* .section-title {
  font-family: "gordita";
  font-size: 45px;
  font-weight: 700;
  color: #1d4ed8;
  margin-bottom: 1.5rem;
  line-height: 1.041em;
} */

.section-text {
  color: #475569;
  font-size: 1.125rem;
  line-height: 1.8;
}

.section-text p {
  margin-bottom: 1.5rem;
}

.section-text p:last-child {
  margin-bottom: 2rem;
}

.cta-button {
  display: inline-flex;
  align-items: center;
  padding: 1rem 2rem;
  background-color: #2563eb;
  color: white;
  text-decoration: none;
  border-radius: 5rem;
  font-weight: 500;
  transition: all 0.3s ease;
  box-shadow: 0 4px 6px rgba(37, 99, 235, 0.1);
}

.cta-button:hover {
  background-color: transparent;
  border: 2px solid #2563eb;
  color: #2563eb;
  transform: translateY(-2px);
  box-shadow: 0 6px 8px rgba(37, 99, 235, 0.2);
}

.arrow-icon {
  width: 1.25rem;
  height: 1.25rem;
  margin-left: 0.5rem;
  transition: transform 0.3s ease;
}

.cta-button:hover .arrow-icon {
  transform: translateX(4px);
}

.image-wrapper {
  position: relative;
  padding: 1rem;
}

.image-container {
  position: relative;
  width: 100%;
  height: 100%;
  min-height: 400px;
}

.about-illustration {
  width: 100%;
  height: 100%;
  object-fit: contain;
  animation: float 6s ease-in-out infinite;
}

@keyframes float {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-20px);
  }
}

/* Responsive Styles */
@media (max-width: 1024px) {
  .about-section {
    padding: 4rem 0;
  }

  /* .section-title {
    font-size: 2rem;
  } */

  .section-text {
    font-size: 1rem;
  }
}

@media (max-width: 768px) {
  .about-grid {
    grid-template-columns: 1fr;
    gap: 2rem;
  }

  .about-content {
    max-width: 100%;
    text-align: center;
  }

  .image-container {
    min-height: 200px;
  }
}

@media (max-width: 480px) {
  .about-section {
    padding: 3rem 0;
  }

  /* .section-title {
    font-size: 34px;
  } */

  .cta-button {
    width: 100%;
    justify-content: center;
  }
}
</style>