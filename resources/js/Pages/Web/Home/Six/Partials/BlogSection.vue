<script setup>
import { onMounted, ref } from 'vue'
import homeApiService from '@/Composables/homeApiService'
import helper from '@/Composables/sharedComposable'

const { textExcerpt } = helper()

const blogs = ref([])
const loading = ref(true)

onMounted(async () => {
  homeApiService.get('blogs').then((res) => {
    blogs.value = res
    loading.value = false
  }).then(() => {
    $('.blog-slider').slick({
      dots: false,
      arrows: true,
      lazyLoad: 'ondemand',
      prevArrow: $('.prev_blog'),
      nextArrow: $('.next_blog'),
      centerPadding: '0px',
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    })
  })
})
</script>

<template>
  <section class="blog-section-one mt-160 xl-mt-150 lg-mt-100">
    <div class="container">
      <div class="position-relative">
        <div class="row">
          <div class="col-xl-7">
            <div class="title-one mb-30 lg-mb-10">
              <h2 class="main-font color-blue">{{ $page.props.app_name }} {{ trans('Guides') }}</h2>
            </div>
          </div>
        </div>

        <div class="row blog-slider">
          <div v-for="(item, index) in blogs" :key="index" class="item">
            <article class="blog-meta-one mt-35 xs-mt-20 wow fadeInUp">
              <figure class="post-img m0">
                <Link :href="route('blogs.show', item)" class="w-100 d-block">
                  <img v-lazy="item.preview?.value" alt="" class="w-100 tran4s" />
                </Link>
              </figure>
              <div class="post-data mt-30 lg-mt-20">
                <div>
                  <Link :href="route('blogs.show', item)" class="date">
                    {{ item.created_at_diff }}
                  </Link>
                </div>
                <Link :href="route('blogs.show', item)" class="mb-5 mt-10">
                  <h4 class="tran3s blog-title">{{ item.title }}</h4>
                </Link>
                <p class="mb-20">{{ textExcerpt(item.meta[0].value, 120) }}</p>
                <Link :href="route('blogs.show', item)" class="read-more">
                  <img src="/assets/images/icon/icon_42.svg" alt="" />
                </Link>
              </div>
            </article>
          </div>
        </div>

        <ul class="slider-arrows slick-arrow-one d-flex justify-content-center style-none sm-mt-30">
          <li class="prev_blog slick-arrow"><i class="bi bi-arrow-left"></i></li>
          <li class="next_blog slick-arrow"><i class="bi bi-arrow-right"></i></li>
        </ul>

        <div class="explore-btn sm-mt-50 text-center">
          <Link href="/blogs" class="btn-six">{{ trans('Explore More') }}</Link>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
/* Carousel Navigation Styles */
.slick-arrow {
  width: 50px;
  height: 50px;
  cursor: pointer;
  border-radius: 50%;
  background: rgba(0, 0, 0, 0.1);
  line-height: 50px;
  text-align: center;
  margin: 0 10px;
  transition: all 0.3s ease;
}

.slick-arrow:hover {
  background: rgba(0, 0, 0, 0.2);
}

/* Blog Item Styles */
.item {
  padding: 0 15px;
}

/* Ensure proper spacing between slides */
.blog-slider {
  margin: 0 -15px;
}

/* Maintain aspect ratio for images */
.post-img {
  aspect-ratio: 16/9;
  overflow: hidden;
}

.post-img img {
  object-fit: cover;
  height: 100%;
  width: 100%;
}
</style>