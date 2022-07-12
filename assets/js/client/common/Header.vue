<script>
export default {

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
          <router-link class="navbar-item" to="/">Главная</router-link>
          <router-link class="navbar-item" to="/about">Контакты</router-link>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">buk2018irinam@gmail.com</a>
            <div class="navbar-dropdown">
              <a class="navbar-item">Личный кабинет</a>
              <a class="navbar-item">Настройки профиля</a>
              <hr class="navbar-divider">
              <div class="navbar-item">Выйти</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- END NAV -->
</template>