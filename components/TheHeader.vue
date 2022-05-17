<template>
  <header class="header">
    <TopBar />
    <div class="header__inner">
      <nuxt-link class="header__logo" to="/">
        <img alt="Arcus Med logo" src="@/assets/arcus.svg" />
      </nuxt-link>
      <Navigation />
      <Hamburger @click="toggleMenu" :open="menuOpen" />
      <transition name="slide">
        <MobileMenu
          @redirect="menuOpen = false"
          v-click-outside="clickOutside"
          v-show="menuOpen"
        />
      </transition>
    </div>
  </header>
</template>

<script>
export default {
  name: 'Header',
  data() {
    return {
      menuOpen: false,
    }
  },
  methods: {
    toggleMenu() {
      console.log('toggle')
      this.menuOpen = !this.menuOpen
    },
    clickOutside(event) {
      const classname = event.target.className
      if (!(classname === 'hamburger' || classname === 'hamburger__icon')) {
        this.menuOpen = false
      }
    },
  },
}
</script>

<style lang="scss" scoped>
.header {
  background: $background;
  position: fixed;
  top: 0;
  width: 100%;
  align-items: center;
  z-index: 100;
  box-shadow: $shadow-1;

  &__inner {
    max-width: $layout-width;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 2.5rem;
    margin: 0 auto;
    padding: 0.75rem 1.25rem;
    @include md {
      padding: 0 1.25rem;
      height: 6rem;
    }
  }

  &__logo {
    font-size: 48px;
    text-decoration: none;
    color: black;

    img {
      width: 8rem;
      @include md {
        width: 14rem;
      }
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

  .mobile-menu {
    transform: translate(0, 0);
  }

  .slide-leave-active,
  .slide-enter-active {
    transition: 0.3s;
  }
  .slide-enter {
    transform: translate(100%, 0);
  }
  .slide-leave-to {
    transform: translate(100%, 0);
  }
}
</style>
