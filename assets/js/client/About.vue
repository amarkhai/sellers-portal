<script>
import Header from "./common/Header";
import Footer from "./common/Footer";

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
            <h1 class="title is-1">Contact Us</h1>
            <p class="is-size-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eligendi soluta
              voluptate facere molestiae consequatur.</p>
          </div>
          <div class="column is-one-third has-text-left">
            <div class="field">
              <label class="label">Name</label>
              <div class="control">
                <input class="input is-medium" type="text">
              </div>
            </div>
            <div class="field">
              <label class="label">Email</label>
              <div class="control">
                <input class="input is-medium" type="text">
              </div>
            </div>
            <div class="field">
              <label class="label">Message</label>
              <div class="control">
                <textarea class="textarea is-medium"></textarea>
              </div>
            </div>
            <div class="control">
              <button type="submit" class="button is-link is-fullwidth has-text-weight-medium is-medium">Send Message
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <Footer/>
</template>