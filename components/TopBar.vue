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
  padding: 8px 20px;
  color: darken($background--dark, 25%);
  font-weight: 300;
  line-height: 1.3;
  font-size: 12px;
  @include sm {
    font-size: 16px;
  }
  span,
  a {
    color: var(--primary);
  }
}
</style>
