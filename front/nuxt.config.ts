import tailwindcss from "@tailwindcss/vite";

export default defineNuxtConfig({
  compatibilityDate: '2024-11-01',
  devtools: { enabled: true },
  css: ['~/assets/css/main.css'],
  vite: {
    plugins: [
      tailwindcss(),
    ],
  },
  ssr: false,
  app: {
    head: {
      title: 'Cinema-App',
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1, viewport-fit=cover' },
        { name: 'apple-mobile-web-app-status-bar-style', content: 'black' },
        { hid: 'description', name: 'description', content: 'Compra entrades de cinema en línia' }
      ],
      link: [
        { rel: 'icon', type: 'image/x-icon', href: '/movie.svg' }
      ]
    },
  }
})
