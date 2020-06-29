<template>
  <div>
    <p>{{ingredient}}</p>
  </div>
</template>

<script>
  export default {
    name: 'Ingredients',
    props: {
      ingredients: String,
    }
  }
</script>

<style scoped>

</style>
