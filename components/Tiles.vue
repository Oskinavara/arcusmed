<template>
  <div class="tiles">
    <nuxt-link
      class="tiles__tile"
      :to="{ path: '/oferta', hash: '#stomatologia' }"
    >
      <img src="/arcus/Optimized-IMG_1921.jpg" alt="" />
      <p>Gabinety stomatologiczne</p>
    </nuxt-link>
    <nuxt-link class="tiles__tile" :to="{ path: '/oferta', hash: '#gabinety' }">
      <img src="/arcus/Optimized-IMG_1891.jpg" alt="" />
      <p>Poradnie lekarskie</p>
    </nuxt-link>
  </div>
</template>

<script>
export default {
  name: 'Tiles',
}
</script>

<style lang="scss" scoped>
.tiles {
  padding: 3rem 1.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  gap: 2rem;

  @include sm {
    flex-direction: row;
  }

  &__tile {
    display: block;
    border-radius: 10px;
    box-shadow: $shadow-3;
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: background-color 0.2s;
    &:hover {
      background: darken(white, 3.5%);
    }

    img {
      border-radius: 10px 10px 0 0;
      /* max-width: 400px; */
      width: 100%;
      overflow: hidden;
      @include md {
        max-width: 400px;
      }
    }

    p {
      text-align: center;
      padding: 1.5rem 1rem;
      font-size: 18px;
    }
  }
}
</style>
