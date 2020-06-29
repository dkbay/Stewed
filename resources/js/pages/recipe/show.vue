<template>
  <div class="row">
    <template v-if="recipeTitle">
      <div class="col-12 px-0 pb-3">
        <img src="https://images.arla.com/recordid/78028b21791743dc9e2baa39009abc52/casar-salat.jpg?crop=(0,293,0,-526)&w=1200&h=630&scale=both&format=jpg&quality=80&ak=6826258c&hm=4e8e18c3" alt="">
        <div class="overlayText">
          <h1>{{ recipeTitle }}</h1>
          <p>{{ recipeDescription }}</p>
        </div>
      </div>
      <Ingredients class="col-4" :ingredients="ingredientsData" />
      <Steps class="col-7 offset-1" :steps="stepsData" />
    </template>
    <template v-else>
      <h1 class="text-center">
        {{ errorMessage }}
      </h1>
    </template>
  </div>
  <!-- todo: add delete button if the user owns this recipe -->
  <!-- todo: make this page look like the design -->
</template>

<script>
import axios from 'axios'
import Ingredients from '../../components/Ingredients'
import Steps from '../../components/Steps'

export default {
  name: 'Show',

  components: {
    Ingredients,
    Steps
  },

  data: () => ({
    title: window.config.appName,
    recipeTitle: '',
    recipeDescription: '',
    ingredientsData: '',
    stepsData: '',
    errorMessage: ''
  }),

  mounted () {
    axios.get('/api/recipe/' + this.$route.params.id)
      .then(response => {
        let data = response.data
        this.recipeTitle = data.title
        this.recipeDescription = data.description
        this.ingredientsData = data.ingredients[0].description
        this.stepsData = data.steps[0].description
        console.log(response.data)
      })
      .catch(this.errorMessage = 'Denne opskrift findes ikke')
  }
}
</script>

<style scoped>
  img {
    max-width: 100%;
  }
  .overlayText {
    position: absolute;
    bottom: 25px;
    left: 25px;
    color: #F1F1F6;
  }
</style>
