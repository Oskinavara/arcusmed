<template>
  <div :class="['gallery-section', { inverted }]">
    <img :src="imageSrc" alt="Zdjęcie zęba przed i po leczeniu kanałowym" />
    <slot></slot>
  </div>
</template>

<script>
export default {
  name: 'GallerySection',
  props: {
    imageSrc: {
      type: String,
      required: true,
    },
    inverted: {
      type: Boolean,
      default: false,
    },
  },
}
</script>

<style lang="scss" scoped>
.gallery-section {
  @include md {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 2rem;
  }
  padding: 1.5rem 0;

  &.inverted {
    img {
      grid-column: 2;
      grid-row: 1;
    }
  }

  p {
    font-size: 18px;
    font-weight: 300;
    align-self: center;
    @include md {
      font-size: 24px;
    }
  }
}
</style>
