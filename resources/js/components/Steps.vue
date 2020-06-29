<template>
  <div>
    <h1>Sådan gør du</h1>
    <p class="ml-3">{{ steps }}</p>
  </div>
</template>

<script>
export default {
  name: 'Steps',
  props: {
    steps: {
      type: String,
      default: ''
    }
  }
}
</script>

<style scoped>
  p {
    width: 350px;
    padding: 25px;
    color: #484153;
    border-left: dotted 2px #484153;
  }
</style>
