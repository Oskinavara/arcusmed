<template>
  <div class="default">
    <TheHeader />
    <!-- <input v-model="color" class="default__input" type="color" name="" id="" /> -->
    <main class="default__main">
      <nuxt />
    </main>
  </div>
</template>

<script>
export default {
  name: 'Default',
  // data() {
  //   return {
  //     color: '#6d558b',
  //   }
  // },
  // watch: {
  //   color(val) {
  //     const root = document.querySelector(':root')
  //     root.style.setProperty('--primary', val)
  //   },
  // },
}
</script>

<style lang="scss">
.default {
  &__main {
    padding-top: 7rem;
    @include md {
      padding-top: 8.25rem;
    }
  }

  &__input {
    position: fixed;
    top: 60px;
    right: 44px;
    display: block;
    z-index: 1000;
  }
}
@import '@/styles/reset.scss';
</style>
