<script setup>
import { onMounted, ref } from "vue";

const props = defineProps({
  home: {
    type: Object,
    required: true
  }
});

const currentSlide = ref(0);
const slides = ref([]);
let autoplayInterval = null;

onMounted(() => {
  // Initialize slides only if home.hero exists
  if (props.home?.hero) {
    slides.value = [
      props.home.hero.image1,
      props.home.hero.image2,
      props.home.hero.image3
    ].filter(Boolean);
    
    // Start autoplay only after slides are initialized
    startAutoPlay();
  }
});

const startAutoPlay = () => {
  autoplayInterval = setInterval(() => {
    currentSlide.value = (currentSlide.value + 1) % slides.value.length;
  }, 5000);
};

const goToSlide = (index) => {
  if (autoplayInterval) {
    clearInterval(autoplayInterval);
  }
  currentSlide.value = index;
  startAutoPlay();
};
</script>

<template>
  <section class="hero-section">
    <div class="container">
      <div class="hero-grid">
        <!-- Left Column: Content -->
        <div class="hero-content">
          <h1 class="hero-title">{{ home.hero.title }}</h1>
          <p class="hero-subtitle">{{ home.hero.subtitle }}</p>
          <div class="cta-wrapper">
            <a href="/jobs" class="cta-button">
              Explore Jobs
              <svg class="arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Right Column: Image Slider -->
        <div class="slider-wrapper">
          <div class="slider-container">
            <div class="slider">
              <template v-for="(slide, index) in slides" :key="index">
                <div v-show="currentSlide === index"
                     class="slide"
                     :class="{ active: currentSlide === index }">
                  <img :src="slide" :alt="`Hero image ${index + 1}`" />
                </div>
              </template>
            </div>

            <!-- Navigation Dots -->
            <div class="slider-nav">
              <button v-for="(_, index) in slides" 
                      :key="index"
                      @click="goToSlide(index)"
                      class="nav-dot"
                      :class="{ active: currentSlide === index }">
                <span class="sr-only">Slide {{ index + 1 }}</span>
              </button>
            </div>
          </div>

          <!-- Decorative Elements -->
          <div class="decoration decoration-1"></div>
          <div class="decoration decoration-2"></div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.hero-section {
  background-color: #ffffff;
  padding: 4rem 0;
  position: relative;
  overflow: hidden;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1rem;
}

.hero-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4rem;
  align-items: center;
}

.hero-content {
  padding-right: 2rem;
}

.hero-title {
  font-size: 3rem;
  font-weight: 500;
  line-height: 1.2;
  color: #1d4ed8;
  margin-bottom: 1.5rem;
  font-family: 'gordita';
}

.hero-subtitle {
  font-size: 1.25rem;
  line-height: 1.6;
  color: #4a4a4a;
  margin-bottom: 2rem;
}

.cta-wrapper {
  margin-top: 2rem;
}

.cta-button {
  display: inline-flex;
  align-items: center;
  padding: 1rem 2rem;
  background-color: #0070FF;
  color: #fff;
  border-radius: 5rem;
  font-weight: 500;
  font-size: 1.125rem;
  text-decoration: none;
  transition: all 0.3s ease;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.cta-button:hover {
  background: transparent;
  border: 1px solid #0070ff;
  color: #0070ff;
  box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
}

.arrow-icon {
  width: 1.25rem;
  height: 1.25rem;
  margin-left: 0.5rem;
}

.slider-wrapper {
  position: relative;
}

.slider-container {
  position: relative;
  border-radius: 1rem;
  overflow: hidden;
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
}

.slider {
  position: relative;
  aspect-ratio: 12/10;
}

.slide {
  position: absolute;
  inset: 0;
  opacity: 0;
  transition: opacity 0.5s ease;
}

.slide.active {
  opacity: 1;
}

.slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.slider-nav {
  position: absolute;
  bottom: 1rem;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: 0.75rem;
  z-index: 10;
}

.nav-dot {
  width: 0.75rem;
  height: 0.75rem;
  border-radius: 50%;
  background-color: rgba(255, 255, 255, 0.7);
  border: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
  padding: 0;
}

.nav-dot.active {
  background-color: #2563eb;
}

.decoration {
  position: absolute;
  width: 18rem;
  height: 18rem;
  border-radius: 50%;
  filter: blur(50px);
  opacity: 0.3;
  pointer-events: none;
}

.decoration-1 {
  background-color: #93c5fd;
  top: -1rem;
  right: -1rem;
}

.decoration-2 {
  background-color: #c4b5fd;
  bottom: -1rem;
  left: -1rem;
}

.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  border: 0;
}

/* Responsive Styles */
@media (max-width: 1024px) {
  .hero-grid {
    grid-template-columns: 1fr;
    gap: 2rem;
    text-align: center;
  }

  .hero-content {
    padding-right: 0;
  }

  .hero-title {
    font-size: 2.5rem;
  }

  .hero-subtitle {
    font-size: 1.125rem;
  }
}

@media (max-width: 768px) {
  .hero-section {
    padding: 2rem 0;
  }

  .hero-title {
    font-size: 2rem;
  }

  .cta-button {
    /* width: 100%; */
    justify-content: center;
  }
}

@media (max-width: 480px) {
  .hero-title {
    font-size: 1.75rem;
  }

  .hero-subtitle {
    font-size: 1rem;
  }
}
</style>