<script>
import Header from "../common/Header";
import Footer from "../common/Footer";

export default {
  components: {
    Header,
    Footer
  }
}
</script>
<template>
  <Header/>
  <section class="hero is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="columns is-8 is-variable ">
          <div class="column is-two-thirds has-text-left">
            <h1 class="title is-1">Hello world</h1>
            <p class="is-size-4">Some info about website.</p>
            <p class="is-size-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eligendi soluta
              voluptate facere molestiae consequatur.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <Footer/>
</template>