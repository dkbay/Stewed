<template>
  <div>
    <h1>Opskrift</h1>
    <p>Skriv trin for trin hvordan man laver din opskrift til alle os der ikke er mester kokke ;)</p>
    <!-- todo: make creation form -->
  </div>
</template>

<script>
export default {
  middleware: 'auth',
  components: {
  },
  metaInfo () {
    return { title: this.$t("home") };
  },
  mounted () {
  },
  methods: {
  },
};
</script>

<style lang="sass">
@import ../../../sass/_variables.scss

</style>
