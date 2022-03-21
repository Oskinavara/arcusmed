<template>
  <nuxt-link :to="to">
    <slot />
  </nuxt-link>
</template>

<script>
export default {
  name: 'BaseButton',
  props: {
    to: {
      type: String,
      default: '/',
    },
  },
}
</script>

<style lang="scss" scoped>
</style>
