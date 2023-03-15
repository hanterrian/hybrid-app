// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    publicRuntimeConfig: {
        apiUrlBrowser: process.env.API_URL_BROWSER,
    },

    privateRuntimeConfig: {
        apiUrlServer: process.env.API_URL_SERVER,
    }
})
