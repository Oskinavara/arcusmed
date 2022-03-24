<template>
  <div class="mosaic">
    <div class="mosaic__wrapper">
      <h2 class="mosaic__heading">
        {{ heading }}
      </h2>
      <p class="mosaic__description">
        <slot />
      </p>
    </div>
    <img class="mosaic__image-1" :src="smallImage1" alt="" />
    <img class="mosaic__image-2" :src="smallImage2" alt="" />
    <img class="mosaic__image-large" :src="largeImage" alt="" />
  </div>
</template>

<script>
export default {
  name: 'Mosaic',
  props: {
    heading: {
      type: String,
    },
    description: {
      type: String,
    },
    largeImage: {
      type: String,
    },
    smallImage1: {
      type: String,
    },
    smallImage2: {
      type: String,
    },
  },
}
</script>

<style lang="scss" scoped>
.mosaic {
  color: white;
  font-family: 'Poppins';
  font-weight: 300;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  grid-template-rows: 1fr 1fr 1fr;
  grid-gap: 1em;
  margin: 2rem 0;

  &__wrapper {
    padding: 2em;
    grid-column: 1 / 3;
    grid-row: 1 / 3;
    background: $primary;
  }

  &__heading {
    font-family: 'Poppins';
    margin-bottom: 2rem;
    font-weight: 300;
  }

  &__description {
    font-size: 14px;
  }

  &__image-1 {
    grid-column: 3 / 4;
  }
  &__image-2 {
    grid-column: 2 / 3;
    grid-row: 3 / 4;
  }
  &__image-large {
    grid-column: 3 / 5;
    grid-row: 2 / 4;
  }
}
</style>
