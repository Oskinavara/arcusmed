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
    margin: 0 auto;
    padding-top: 128px;
  }
}
@import '@/styles/reset.scss';
</style>
