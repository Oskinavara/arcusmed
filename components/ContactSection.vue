<template>
  <section class="contact-section">
    <div class="contact-section__wrapper">
      <client-only>
        <GmapMap
          class="contact-section__map"
          :center="{ lat: 50.8170766762599, lng: 19.09227190258119 }"
          :zoom="15"
          map-type-id="terrain"
        >
          <GmapMarker
            :position="{ lat: 50.8170766762599, lng: 19.09227190258119 }"
            :clickable="true"
          />
        </GmapMap>
      </client-only>
      <div class="contact-section__right">
        <h2 class="contact-section__heading">Rejestracja</h2>
        <p class="contact-section__info">
          Na wizyty do naszych specjalistów można umówić się telefonicznie lub
          osobiście w naszej przychodni. Dzień przed ustalonym terminem wizyty
          dzwonimy do naszych pacjentów celem przypomnienia o zbliżającej się
          wizycie.
        </p>
        <address>
          <!-- <h3>
            <span> Częstochowa, Św. Rocha 17</span>Może bez adresu jak bedzie
            mapa
          </h3> -->
          <p>
            <img alt="" src="@/assets/envelope.svg" />arcusmedrecepcja@gmail.com
          </p>
          <a href="tel:+(34)3664491">
            <img alt="" src="@/assets/phone-solid.svg" />
            (34) 366-44-91
          </a>
          <a href="tel:506407833">
            <img alt="" src="@/assets/phone-solid.svg" />
            506 407 833
          </a>
        </address>
      </div>
    </div>
  </section>
</template>

<script>
export default {}
</script>
<style lang="scss" scoped>
.contact-section {
  background: $primary;
  color: white;
  padding: 1.5rem;
  @include xs {
    padding: 3rem;
  }
  @include md {
    padding: 5rem;
  }

  &__wrapper {
    display: grid;
    max-width: 1000px;
    margin: 0 auto;
    grid-template-columns: 1fr;
    @include md {
      grid-template-columns: 1fr 1fr;
    }
  }

  &__map {
    height: 30vh;
    grid-row: 2;
    @include md {
      height: auto;
    }
  }

  img {
    filter: invert(1);
    max-width: 24px;
    margin-right: 8px;
  }

  &__heading {
    font-weight: 300;
    margin-bottom: 1rem;
  }

  &__info {
    padding: 0.5rem 0;
    font-weight: 100;
    margin-bottom: 1.5rem;
  }

  &__right {
    padding: 1.5rem 0;
    @include md {
      margin-left: 2rem;
    }
  }

  a {
    display: flex;
    align-items: center;
    padding: 0.5rem 0;
    font-weight: 300;
  }

  h3 {
    font-weight: 500;
    margin: 1rem 0 1rem;
    font-size: 16px;
    span {
      text-decoration: line-through;
    }
  }

  address {
    p {
      display: flex;
      font-family: Poppins;
      font-weight: 300;
      padding: 0.5rem 0;
    }
  }
}
</style>
