<template>
  <header class="header">
    <nuxt-link class="header__logo" to="/">
      <h1>Logo</h1>
    </nuxt-link>
    <Navigation />
    
    <Hamburger />
  </header>
</template>

<script>
export default {
  name: 'Header',
}
</script>

<style lang="scss" scoped>
.header {
  display: grid;
  grid-template-columns: 8rem 1fr 8rem;
  position: fixed;
  top: 0;
  width: calc(100% - 2 * 20px);
  max-width: $layout-width;
  height: 112px;
  align-items: center;

  &__logo {
    font-size: 48px;
    text-decoration: none;
    color: black;
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
