<template>
  <nav class="navigation">
    <ul class="navigation__list">
      <li v-for="link in links" class="navigation__list-item" :key="link.name">
        <nuxt-link class="navigation__link" :to="link.url">
          {{ link.name }}
        </nuxt-link>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: 'Navigation',
  data() {
    return {
      links: [
        { url: '/o-nas', name: 'O nas' },
        { url: '/oferta', name: 'Oferta' },
        { url: '/specjalisci', name: 'Specjaliści' },
        { url: '/cennik', name: 'Cennik' },
        { url: '/certyfikaty', name: 'Certyfikaty' },
        { url: '/kontakt', name: 'Kontakt' },
      ],
    }
  },
}
</script>

<style lang="scss" scoped>
.navigation {
  place-self: center;
  &__list {
    display: flex;
    list-style: none;
  }

  &__list-item {
    margin: 0 0.5rem;
  }

  &__link {
    display: block;
    padding: 1rem;
    color: $black;
    text-decoration: none;
    margin: 1rem 0;
    border-bottom: 1px solid transparent;
    transition: border-bottom-color 0.2s;

    &.nuxt-link-exact-active,
    &:hover {
      border-bottom: 1px solid rgba($line-gray, 0.4);
    }
  }
}
</style>
