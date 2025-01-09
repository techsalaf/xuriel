<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';

const services = ref([
    {
        title: 'Recruitment Solutions',
        description: 'Streamlined hiring processes to find top talent quickly and efficiently.',
        icon: '/assets/images/icons/recruitment-icon.svg',
        color: '#EAFBFD',
    },
    {
        title: 'Training & Development',
        description: 'Upskill your workforce with tailored training programs.',
        icon: '/assets/images/icons/training-icon.svg',
        color: '#FFFAEC',
    },
    {
        title: 'HR Consulting',
        description: 'Expert guidance to optimize your HR strategies and operations.',
        icon: '/assets/images/icons/hr-consulting-icon.svg',
        color: '#FFEBFB',
    },
    {
        title: 'Career Coaching',
        description: 'Personalized coaching to help professionals achieve their career goals.',
        icon: '/assets/images/icons/career-coaching-icon.svg',
        color: '#E8F7E9',
    },
    {
        title: 'Freelance Opportunities',
        description: 'Connect with projects that match your skills and expertise.',
        icon: '/assets/images/icons/freelance-icon.svg',
        color: '#F7F5FF',
    },
    {
        title: 'Business Solutions',
        description: 'Comprehensive services to scale and grow your business effectively.',
        icon: '/assets/images/icons/business-solutions-icon.svg',
        color: '#FFF3EA',
    },
]);

const currentSlide = ref(0);
const autoplayInterval = ref(null);
const AUTOPLAY_DELAY = 3000;

const nextSlide = () => {
    currentSlide.value = (currentSlide.value + 1) % services.value.length;
};

const prevSlide = () => {
    currentSlide.value = currentSlide.value === 0 
        ? services.value.length - 1 
        : currentSlide.value - 1;
};

const startAutoplay = () => {
    autoplayInterval.value = setInterval(nextSlide, AUTOPLAY_DELAY);
};

const stopAutoplay = () => {
    if (autoplayInterval.value) {
        clearInterval(autoplayInterval.value);
    }
};

const handleTouchStart = () => {
    stopAutoplay();
};

const handleTouchEnd = () => {
    startAutoplay();
};

onMounted(() => {
    startAutoplay();
});

onBeforeUnmount(() => {
    stopAutoplay();
});
</script>

<template>
    <section class="service-section mt-85 md-mt-60 position-relative">
        <div class="container">
            <!-- Header Section -->
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-8">
                    <div class="title-four text-center text-lg-start">
                        <h2>{{ trans('Our Core Services.') }}</h2>
                        <p class="text-muted">
                            Discover how Xuriel can empower your business and career with innovative solutions.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex justify-content-lg-end">
                        <Link href="/about-us" class="btn-six dark d-none d-lg-inline-block">
                            {{ trans('More About Xuriel') }}
                        </Link>
                    </div>
                </div>
            </div>

            <!-- Desktop Layout -->
            <div class="services-grid d-none d-lg-grid">
                <div
                    v-for="(service, index) in services"
                    :key="index"
                    class="card-style-seven text-center wow fadeInUp"
                    :style="{ 'animation-delay': `${index * 0.1}s` }"
                >
                    <div
                        class="wrapper d-flex flex-column align-items-center"
                        :style="{ 'background-color': service.color }"
                    >
                        <div class="icon d-flex align-items-center justify-content-center mb-3">
                            <img :src="service.icon" alt="Service Icon" class="lazy-img service-section-img" />
                        </div>
                        <div class="title fw-500 mb-2">{{ service.title }}</div>
                        <p class="description text-muted">{{ service.description }}</p>
                    </div>
                </div>
            </div>

            <!-- Mobile Carousel -->
            <div class="mobile-carousel-container d-lg-none">
                <div 
                    class="mobile-carousel"
                    @touchstart="handleTouchStart"
                    @touchend="handleTouchEnd"
                >
                    <div 
                        class="carousel-slides"
                        :style="{ transform: `translateX(-${currentSlide * 100}%)` }"
                    >
                        <div
                            v-for="(service, index) in services"
                            :key="index"
                            class="carousel-slide"
                        >
                            <div
                                class="wrapper d-flex flex-column align-items-center"
                                :style="{ 'background-color': service.color }"
                            >
                                <div class="icon d-flex align-items-center justify-content-center mb-3">
                                    <img :src="service.icon" alt="Service Icon" class="lazy-img service-section-img" />
                                </div>
                                <div class="title fw-500 mb-2">{{ service.title }}</div>
                                <p class="description text-muted">{{ service.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Navigation -->
                <div class="carousel-nav">
                    <button class="nav-button prev" @click="prevSlide">
                        <span class="arrow-left"></span>
                    </button>
                    <div class="carousel-dots">
                        <button
                            v-for="(_, index) in services"
                            :key="index"
                            class="dot"
                            :class="{ active: currentSlide === index }"
                            @click="currentSlide = index"
                        ></button>
                    </div>
                    <button class="nav-button next" @click="nextSlide">
                        <span class="arrow-right"></span>
                    </button>
                </div>
            </div>

            <div class="text-center mt-40 d-lg-none">
                <Link href="/about-us" class="btn-six dark">{{ trans('More About Xuriel') }}</Link>
            </div>
        </div>
    </section>
</template>

<style scoped>
.service-section {
    position: relative;
    background: #f9f9f9;
    padding: 50px 0;
}

/* Desktop Grid Layout */
.services-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    padding-top: 50px;
}

.card-style-seven {
    border-radius: 10px;
    padding: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
}

.card-style-seven:hover {
    transform: translateY(-10px);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
}

.wrapper {
    height: 100%;
    padding: 25px;
    border-radius: 10px;
}

.service-section-img {
    width: 50px;
    height: 50px;
}

.description {
    font-size: 0.9rem;
    line-height: 1.4;
}

/* Mobile Carousel Styles */
.mobile-carousel-container {
    position: relative;
    padding-top: 50px;
    overflow: hidden;
}

.mobile-carousel {
    width: 100%;
    touch-action: pan-y pinch-zoom;
}

.carousel-slides {
    display: flex;
    transition: transform 0.5s ease;
}

.carousel-slide {
    flex: 0 0 100%;
    padding: 0 15px;
}

.carousel-nav {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
    gap: 20px;
}

.nav-button {
    background: none;
    border: none;
    padding: 10px;
    cursor: pointer;
    position: relative;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #fff;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.arrow-left, .arrow-right {
    border: solid #333;
    border-width: 0 2px 2px 0;
    display: inline-block;
    padding: 4px;
    position: absolute;
    top: 50%;
    left: 50%;
}

.arrow-left {
    transform: translate(-25%, -50%) rotate(135deg);
}

.arrow-right {
    transform: translate(-75%, -50%) rotate(-45deg);
}

.carousel-dots {
    display: flex;
    gap: 8px;
}

.dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #ccc;
    border: none;
    padding: 0;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.dot.active {
    background: #333;
    transform: scale(1.2);
}

/* Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.wow.fadeInUp {
    animation: fadeInUp 0.6s ease forwards;
}
</style>