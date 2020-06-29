<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <router-link :to="{ name: user ? 'home' : 'welcome' }" class="navbar-brand">
      <h1 class="text-center">
        {{ appName }}
      </h1>
    </router-link>

    <ul class="navbar-nav">
      <!-- Authenticated -->
      <li v-if="user" class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark"
           href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        >
          <img :src="user.photo_url" class="rounded-circle profile-photo mr-1">
          {{ user.name }}
        </a>
        <div class="dropdown-menu">
          <router-link :to="{ name: 'settings.profile' }" class="dropdown-item pl-3">
            <fa icon="cog" fixed-width />
            {{ $t('settings') }}
          </router-link>

          <div class="dropdown-divider" />
          <a href="#" class="dropdown-item pl-3" @click.prevent="logout">
            <fa icon="sign-out-alt" fixed-width />
            {{ $t('logout') }}
          </a>
        </div>
      </li>
      <!-- Guest -->
      <template v-else>
        <li class="nav-item">
          <router-link :to="{ name: 'register' }" class="nav-link register text-center font-weight-bold" active-class="active">
            Bliv medlem
          </router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{ name: 'login' }" class="nav-link login text-center font-weight-bold" active-class="active">
            Log ind
          </router-link>
        </li>
      </template>
      <hr class="my-5">
      <li class="nav-item">
        <router-link :to="{ name: 'recipes' }" class="nav-link pl-0" active-class="active">
          Opskrifter
        </router-link>
      </li>
    </ul>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex'

export default {

  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style scoped>
  .profile-photo {
    width: 2rem;
    height: 2rem;
    margin: -.375rem 0;
  }

  nav {
    min-width: 250px;
    max-width: 250px;
    height:100vh;
    display:grid;
    grid-template-rows:100px auto;
    grid-template-columns: 1fr;
    align-items: flex-start;
    padding-top:50px;
  }

  ul {
    display:grid;
  }

  .register {
    background-color: #225DE6;
    color: #F1F1F6 !important;
  }

  .login {
    background-color: #D9D9D9;
    color: #484153 !important;
  }

  .navbar-brand>h1 {
    color: #484153 !important;
  }

  hr {
    border: solid 3px #D9D9D9;
    box-sizing: border-box;
    width: 100%;
  }
</style>
