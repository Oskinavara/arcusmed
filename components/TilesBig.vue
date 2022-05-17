<template>
  <div class="tiles-big">
    <nuxt-link
      v-for="tile in tiles"
      :key="tile.name"
      :to="{ path: tile.to.path, hash: tile.to.hash }"
      class="tiles-big__tile-wrapper"
    >
      <span>{{ tile.name }}</span>
      <img :src="tile.image" alt="" />
    </nuxt-link>
  </div>
</template>

<script>
export default {
  name: 'TilesBig',
  props: {
    tiles: {
      type: Array,
      default: () => [
        {
          to: {
            path: '/oferta',
            hash: '#stomatologia',
          },
          name: 'Gabinety stomatologiczne',
          image:
            'https://oskinavara.imgix.net/arcus/kafelki1.jpg?auto=format&w=800',
        },
        {
          to: {
            path: '/oferta',
            hash: '#gabinety',
          },
          name: 'Poradnie lekarskie',
          image:
            'https://oskinavara.imgix.net/arcus/kafelki2.jpg?auto=format&w=800',
        },
      ],
    },
  },
}
</script>

<style lang="scss" scoped>
.tiles-big {
  display: grid;
  grid-gap: 8px;
  grid-template-columns: repeat(1, 1fr);
  @include md {
    grid-template-columns: repeat(2, 1fr);
  }

  &__tile-wrapper {
    position: relative;
    display: block;
    height: calc((100vh - 7.5rem) / 2);
    @include md {
      height: calc(100vh - 7.5rem);
    }

    img {
      height: 100%;
      width: 100%;
      filter: blur(2px);
      object-fit: cover;
    }

    span {
      display: block;
      width: 90%;
      z-index: 1;
      font-size: 28px;
      color: white;
      position: absolute;
      left: 50%;
      // font-weight: 700;
      text-align: center;
      top: 50%;
      transform: translate(-50%, -50%);
      @include md {
        font-size: 48px;
      }
    }
  }
}
</style>
