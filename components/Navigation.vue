<template>
  <nav :class="['navigation', { mobile }]">
    <ul class="navigation__list">
      <li v-for="link in links" class="navigation__list-item" :key="link.name">
        <nuxt-link
          @click.native="$emit('redirect')"
          :class="[
            'navigation__link',
            {
              'nuxt-link-exact-active':
                $route.path.startsWith(link.url) && link.url !== '/',
            },
          ]"
          :to="link.url"
        >
          {{ link.name }}
        </nuxt-link>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: 'Navigation',
  props: {
    mobile: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      links: [
        { url: '/', name: 'Strona główna' },
        { url: '/o-nas', name: 'O nas' },
        { url: '/oferta', name: 'Oferta' },
        { url: '/specjalisci', name: 'Specjaliści' },
        { url: '/cennik', name: 'Cennik' },
        { url: '/certyfikaty', name: 'Certyfikaty' },
        { url: '/galeria', name: 'Galeria' },
        { url: '/kontakt', name: 'Kontakt' },
      ],
    }
  },
}
</script>

<style lang="scss" scoped>
.navigation {
  font-family: 'Fira Sans Condensed', sans-serif;
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
    padding: 1rem 0.2rem;
    color: $black;
    text-decoration: none;
    margin: 1rem 0;
    border-bottom: 1px solid transparent;
    transition: border-bottom-color 0.2s;
    @include lg {
      padding: 1rem;
    }

    &.nuxt-link-exact-active,
    &:hover {
      border-bottom: 1px solid rgba($line-gray, 0.4);
    }
  }

  &.mobile {
    .navigation__list {
      flex-direction: column;
    }

    .navigation__link {
      margin: 0.5rem;
      padding: 0.5rem;
    }
  }
}
</style>
