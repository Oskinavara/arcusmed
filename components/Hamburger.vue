<template>
  <button
    aria-label="Menu"
    :class="['hamburger', { open }]"
    @click="$emit('click')"
  >
    <span class="hamburger__line" />
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
  height: 36px;
  width: 36px;
  border-radius: 10px;
  border: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0;
  transition: background-color 0.2s;

  &__line,
  &__line::after,
  &__line::before {
    display: block;
    position: relative;
    height: 1px;
    background: black;
    width: 13px;
    border-radius: 1px;
    transition: transform 0.2s, rotate 0.2s;
  }

  &__line::after,
  &__line::before {
    content: '';
    position: absolute;
  }

  &__line::before {
    transition: opacity 0.1s;
    transform: translateY(4px);
  }

  &__line::after {
    transform: translateY(-4px);
  }

  &.open {
    background: #fbfbfb;

    .hamburger__line {
      transform: rotate(-45deg);
    }

    .hamburger__line::before {
      opacity: 0;
    }

    .hamburger__line::after {
      transform: translate(0) rotate(90deg);
    }
  }
}
</style>
