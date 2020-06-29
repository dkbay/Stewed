<template>
  <div>
    <p>{{ ingredients }}</p>
  </div>
</template>

<script>
export default {
  name: 'Ingredients',
  props: {
    ingredients: {
      type: String,
      default: ''
    }
  }
}
</script>

<style scoped>
  div {
    max-width: 350px;
    padding: 25px;
    background-color: #F1F1F6;
    color: #484153;
  }
</style>
