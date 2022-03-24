<template>
  <section class="hero">
    <img
      class="hero__banner"
      @load="test"
      src="/banner.jpg"
      alt="Zdjęcie przedstawiające dentystkę i pacjentkę na fotelu dentystycznym"
    />
    <div v-if="!loading" class="hero__wrapper">
      <p class="hero__subheading">Przychodnia NZOZ</p>
      <h1 class="hero__heading">Arcus-Med</h1>
      <p class="hero__content">
        Przychodnia NZOZ ARCUS-MED to przyjazne miejsce nieopodal Jasnej Góry,
        zlokalizowane w centrum Częstochowy przy ul. Św. Rocha 17. Dla naszych
        pacjentów dostępny jest prywatny, bezpłatny parking zlokalizowany na
        posesji.
      </p>
      <p class="hero__content">
        Wnętrze naszej przychodni zostało stworzone z myślą o komforcie naszych
        pacjentów: klimatyzowane gabinety, poczekalnia, dostęp do bezprzewodowej
        sieci Wi-Fi, toaleta. Przychodnia przyjazna jest osobom
        niepełnosprawnym: brak barier architektonicznych, wejście do przychodni
        bez stopni – z poziomu 0 oraz toaleta dostosowana do potrzeb osób
        niepełnosprawnych.
      </p>
      <BaseButton to="/kontakt">Umów wizytę</BaseButton>
    </div>
    <p v-else>LOADING</p>
  </section>
</template>

<script>
export default {
  name: 'Hero',
  data() {
    return {
      loading: true,
    }
  },
  methods: {
    test() {
      console.log('loaded')
      this.loading = false
    },
  },
}
</script>

<style lang="scss" scoped>
.hero {
  position: relative;
  &__wrapper {
    background: rgba(#fff, 0.7);
    backdrop-filter: blur(5px);
    padding: 3rem;
    top: 15%;
    left: 40%;
    position: absolute;
    max-width: 60%;
  }
  &__banner {
    max-height: 600px;
    object-fit: cover;
    width: 100%;
  }
  &__heading {
    margin: 0.5rem 0 1rem;
  }
  &__content {
    padding: 0.5rem 0;
  }
}
</style>
