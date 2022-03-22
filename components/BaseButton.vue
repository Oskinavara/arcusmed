<template>
  <nuxt-link class="base-button" :to="to">
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
.base-button {
  display: inline-block;
  border: 1px solid $text-black;
  border-radius: 3px;
  padding: 1rem 2rem;
  background: transparent;
  transition: background-color 0.2s;
  &:hover {
    background-color: rgba(#333, 0.1);
  }
}
</style>
