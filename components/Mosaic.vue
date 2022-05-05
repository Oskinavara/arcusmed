<template>
  <div :class="['mosaic', { 'type-2': type === '2', 'type-3': type === '3' }]">
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
    type: {
      type: String,
    },
  },
}
</script>

<style lang="scss" scoped>
.mosaic {
  color: white;
  font-weight: 300;
  display: flex;
  flex-direction: column;
  grid-template-rows: 1fr 1fr 1fr;
  grid-gap: 1em;
  grid-template-columns: 1fr;
  margin-bottom: 6rem;
  @include md {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
  }

  img {
    height: 100%;
    object-fit: cover;
  }

  &__wrapper {
    padding: 2em;
    grid-column: 1 / 3;
    grid-row: 1 / 3;
    background: var(--primary);
  }

  &__heading {
    margin-bottom: 1rem;
    font-weight: 300;
  }

  &__description {
    font-size: 14px;

    ul {
      list-style-type: initial;
    }
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

  &.type-2 {
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-template-rows: 1fr 1fr;

    .mosaic__wrapper {
      grid-column: 3 / span 2;
      grid-row: 1 / span 1;
    }

    .mosaic__image-1 {
      grid-column: 3 / span 1;
      grid-row: 2 / span 1;
    }
    .mosaic__image-2 {
      display: none;
      grid-column: 4 / span 1;
      grid-row: 2 / span 1;
    }
    .mosaic__image-large {
      grid-column: 1 / span 2;
      grid-row: 1 / span 2;
    }
  }

  &.type-3 {
    grid-template-columns: 2fr 1fr 1fr 1fr;
  }
}
</style>
