<template>
  <div class="top-bar">
    Skontaktuj się z nami telefonicznie:
    <a href="tel:506407833">506 407 833</a> w godzinach
    <span>8:30 - 19:00</span>
  </div>
</template>

<script>
export default {
  name: 'TopBar',
}
</script>

<style lang="scss" scoped>
.top-bar {
  text-align: center;
  padding: 8px 0;
  color: darken($background--dark, 25%);
  font-weight: 300;
  span,
  a {
    color: var(--primary);
  }
}
</style>
