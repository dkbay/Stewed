<template>
  <div>
    <div class="text-center">
      <div class="title mb-4">
        {{ title }}
      </div>
      <Ingredients :ingredients="ingredients"/>
      <Steps/>
    </div>
  </div>
</template>

<script>
  import { mapGetters } from 'vuex'
  import Ingredients from '../components/Ingredients'
  import Steps from '../components/Steps'

  export default {
    components: { Navbar, Ingredients, Steps },

    metaInfo () {
      return { title: this.$t('home') }
    },

    data: () => ({
      title: window.config.appName,
      ingredients: null,
      steps: null
    }),

    computed: mapGetters({
      authenticated: 'auth/check'
    })
  }
</script>

<style scoped>
  .top-right {
    position: absolute;
    right: 10px;
    top: 18px;
  }

  .title {
    font-size: 85px;
  }
</style>
