<template>
  <header class="header">
    <div class="header__inner">
      <nuxt-link class="header__logo" to="/">
        <img src="/arcus_logo.png" />
      </nuxt-link>
      <Navigation />
      <Hamburger open />
    </div>
  </header>
</template>

<script>
export default {
  name: 'Header',
}
</script>

<style lang="scss" scoped>
.header {
  /* display: grid;
  grid-template-columns: 8rem 1fr 8rem; */
  background: $background;
  /* background: white; */

  position: fixed;
  top: 0;
  width: 100%;
  align-items: center;
  z-index: 100;
  box-shadow: 0 4px 8px -8px gray;

  &__inner {
    max-width: $layout-width;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 8rem;
    margin: 0 auto;
    padding: 0 1.25rem;
  }

  &__logo {
    font-size: 48px;
    text-decoration: none;
    color: black;

    img {
      max-width: 19rem;
    }
  }

  .hamburger {
    grid-column: 3;
    justify-self: end;
    @include md {
      display: none;
    }
  }

  .navigation {
    display: none;
    @include md {
      display: block;
    }
  }
}
</style>
