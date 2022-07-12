<script>

export default {
  created() {
    console.log(this.$auth);
    console.log(this.$auth.check());
    // console.log(this.meta.auth);
  },
  computed: {
    isLogin() {
      return this.$auth.check();
    }
  }
}
</script>
<template>
  <div v-if="isLogin" class="navbar-item has-dropdown is-hoverable">
    <a class="navbar-link">buk2018irinam@gmail.com</a>
    <div class="navbar-dropdown">
      <a class="navbar-item">Account</a>
      <a class="navbar-item">Settings</a>
      <hr class="navbar-divider">
      <div class="navbar-item">Logout</div>
    </div>
  </div>
  <div v-else class="navbar-item has-dropdown is-hoverable">
    <a class="navbar-link">Enter</a>
    <div class="navbar-dropdown">
      <router-link class="navbar-item" to="/login">Login</router-link>
      <router-link class="navbar-item" to="/register">Register</router-link>
    </div>
  </div>
</template>