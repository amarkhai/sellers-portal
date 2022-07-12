<script>
import ClientBadge from "./ClientBadge";

export default {
  components: {
    ClientBadge
  }
}
</script>
<template>
  <!-- START NAV -->
  <nav class="navbar">
    <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item" href="../">
          <img src="../../../images/bulma.png" alt="Logo">
        </a>
        <span class="navbar-burger burger" data-target="navbarMenu">
					<span></span>
					<span></span>
					<span></span>
				</span>
      </div>
      <div id="navbarMenu" class="navbar-menu">
        <div class="navbar-end">
          <router-link class="navbar-item" to="/">Main</router-link>
          <router-link class="navbar-item" to="/about">About</router-link>
          <client-badge></client-badge>
        </div>
      </div>
    </div>
  </nav>
  <!-- END NAV -->
</template>