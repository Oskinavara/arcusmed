<template>
  <div class="default">
    <TheHeader />
    <main class="default__main">
      <nuxt />
    </main>
  </div>
</template>

<script>
export default {
  name: 'Default',
}
</script>

<style lang="scss">
.default {
  &__main {
    max-width: $layout-width;
    padding: 0 1.25rem;
    margin: 0 auto;
    padding-top: 132px;
  }
}
@import '@/styles/reset.scss';
</style>
