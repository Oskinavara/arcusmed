<template>
  <section class="hero">
    <img
      class="hero__banner"
      src="https://oskinavara.imgix.net/Optimized-14.jpg?auto=format"
      alt="Zdjęcie przedstawiające dentystkę i pacjentkę na fotelu dentystycznym"
    />
    <div class="hero__wrapper">
      <p class="hero__subheading">Przychodnia</p>
      <h1 class="hero__heading">Arcus-Med</h1>
      <p class="hero__content">
        Przychodnia ARCUS-MED to przychodnia nieopodal Jasnej Góry,
        zlokalizowana w centrum Częstochowy przy ul. Św. Rocha 17. Dla naszych
        pacjentów dostępny jest prywatny, bezpłatny parking zlokalizowany na
        posesji.
      </p>
      <p class="hero__content">
        Wnętrze naszej przychodni zostało stworzone z myślą o komforcie naszych
        pacjentów: klimatyzowane gabinety, poczekalnia, toaleta. Przychodnia
        przyjazna jest osobom niepełnosprawnym: brak barier architektonicznych,
        wejście do przychodni bez stopni – z poziomu 0 oraz toaleta dostosowana
        do potrzeb osób niepełnosprawnych.
      </p>
      <BaseButton to="/kontakt">Umów wizytę</BaseButton>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Hero',
}
</script>

<style lang="scss" scoped>
.hero {
  position: relative;
  &__wrapper {
    background: rgba(#fff, 0.7);
    backdrop-filter: blur(5px);
    top: 15%;
    left: 40%;
    padding: 1rem 1.5rem;
    @include md {
      max-width: 60%;
      position: absolute;
      padding: 2rem 3rem;
    }
  }
  &__banner {
    max-height: 30vh;
    object-fit: cover;
    width: 100%;
    @include xs {
      max-height: 600px;
    }
  }
  &__heading {
    font-weight: 300;
    margin: 0.5rem 0 1rem;
    font-size: 36px;
    @include md {
      font-size: 48px;
    }
  }
  &__content {
    padding: 0.5rem 0;
    font-size: 14px;
    @include lg {
      font-size: 16px;
    }
  }

  .base-button {
    margin-top: 1rem;
  }
}
</style>
