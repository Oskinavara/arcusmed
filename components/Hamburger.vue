<template>
  <button
    aria-label="Menu"
    :class="['hamburger', { open }]"
    @click="$emit('click')"
  >
    <img
      class="hamburger__icon"
      v-show="!open"
      src="@/assets/bars-solid.svg"
      alt=""
    />
    <img
      class="hamburger__icon"
      v-show="open"
      src="@/assets/times-solid.svg"
      alt=""
    />
  </button>
</template>

<script>
export default {
  name: 'Hamburger',
  props: {
    open: {
      type: Boolean,
      required: true,
    },
  },
}
</script>

<style lang="scss" scoped>
.hamburger {
  z-index: 1;
  background: white;
  border-radius: 10px;
  border: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0;
  width: 24px;
  transition: background-color 0.2s;

  &__icon {
    max-width: 1.5rem;
    filter: invert(0.2);
  }
}
</style>
