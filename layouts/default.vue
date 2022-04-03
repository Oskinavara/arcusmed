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
    padding-top: 6rem;
  }
}
@import '@/styles/reset.scss';
</style>
