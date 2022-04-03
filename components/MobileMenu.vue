<template>
  <div class="mobile-menu">
    <Navigation mobile @redirect="$emit('redirect')" />
  </div>
</template>

<script>
export default {
  name: 'MobileMenu',
  data() {
    return {
      open: false,
    }
  },
}
</script>

<style lang="scss" scoped>
.mobile-menu {
  padding: 2rem 4rem 2rem 1rem;
  box-shadow: 0 4px 8px 4px rgba(black, 0.07);
  height: 100%;
  position: fixed;
  right: 0;
  top: 0;
  background: white;
}
</style>
