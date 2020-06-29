<template>
  <div id="recipes">
    <template v-if="recipes">
      <div v-for="recipe in recipes" :key="recipe.id" class="card mx-auto" style="width: 18rem;">
        <img width="100%" height="auto" src="https://images.arla.com/recordid/78028b21791743dc9e2baa39009abc52/casar-salat.jpg?crop=(0,293,0,-526)&w=1200&h=630&scale=both&format=jpg&quality=80&ak=6826258c&hm=4e8e18c3" alt="">
        <div class="overlayText">
          <router-link :to="{ path: 'recipes/' + recipe.id }" class="nav-link pl-0" active-class="active">
            <h6>{{ recipe.title }}</h6>
            <p>{{ recipe.description }}</p>
          </router-link>
        </div>
      </div>
    </template>
    <template v-else>
      <h1>Der er ikke nogen opskrifter</h1>
    </template>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Index',

  data: () => ({
    recipes: []
  }),

  mounted () {
    axios.get('/api/recipe')
      .then(response => {
        this.recipes = response.data
      })
  }
}
</script>

<style scoped>
  #recipes {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    row-gap: 25px;
    padding-top: 25px;
  }

  .overlayText {
    position: absolute;
    bottom: -5px;
    left: 10px;
    color: #F1F1F6;
    text-shadow: #191919 2px 2px 8px;
  }
  a {
    color: #F1F1F6;
  }
</style>
