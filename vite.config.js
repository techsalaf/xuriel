
import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import DefineOptions from 'unplugin-vue-define-options/vite'

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/js/app.js', 'resources/css/app.css', 'resources/scss/admin/main.scss'],
      ssr: 'resources/js/ssr.js',
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
    DefineOptions(),
  ],
  build: {
    sourcemap: true,
  },
  server: {
    sourcemap: true,
    host: 'localhost',  // Force binding to localhost (IPv4)
  },
})
