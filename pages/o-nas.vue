<template>
  <div class="o-nas page">
    <h1>O nas</h1>
    <div class="o-nas__wrapper">
      <div class="o-nas__image-wrapper">
        <img
          width="766"
          height="511"
          src="/arcus/Optimized-IMG_2008.jpg"
          alt=""
        />
      </div>
      <div class="o-nas__text-wrapper">
        <h2>Przychodnia ARCUS-MED</h2>
        <p>
          Przyjazne miejsce nieopodal Jasnej Góry, zlokalizowane w centrum
          Częstochowy przy ul. Św. Rocha 17. Dla naszych pacjentów dostępny jest
          prywatny, bezpłatny parking zlokalizowany na posesji.
        </p>
        <p>
          Wnętrze naszej przychodni został stworzony z myślą o komforcie naszych
          pacjentów: klimatyzowane gabinety, poczekalnia, toaleta. Przychodnia
          przyjazna jest osobom niepełnosprawnym: brak barier
          architektonicznych, wejście do przychodni bez stopni – z poziomu 0
          oraz toaleta dostosowana do potrzeb osób niepełnosprawnych.
        </p>
      </div>
    </div>
    <div class="o-nas__wrapper inverted">
      <div class="o-nas__image-wrapper">
        <img
          width="665"
          height="460"
          src="/arcus/Optimized-IMG_1915.jpg"
          alt=""
        />
      </div>
      <div class="o-nas__text-wrapper">
        <h2>ARCUS-MED</h2>
        <p>
          Arcus-Med Sp z o.o. to gabinety lekarskie o profilu stomatologiczno –
          lekarskim. Powstały jako naturalny efekt zawodowej pasji jej
          właścicieli. Od początku funkcjonowania ARCUS-MED naszym celem jest
          leczenie pacjentów wynikające z zasad medycyny opartej na
          faktach (Evidence Based Medicine), holistyczne podejście do Pacjenta
          oraz profilaktyka chorób cywilizacyjnych.
        </p>
        <p>
          Współpraca z wieloma lekarzami prezentującymi wysoki poziom
          merytoryczny oraz regularne uczestnictwo w kursach i szkoleniach
          podnoszących kwalifikacje zawodowe dają nadzieje na spełnienie
          oczekiwań naszych Pacjentów. Zapraszamy do kontaktu oraz umawiania
          wizyt z naszymi specjalistami.
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  head: {
    title: 'Arcus-Med | O nas',
  },
}
</script>

<style lang="scss" scoped>
.o-nas {
  @include md {
    padding: 0 20px;
  }
  img {
    height: 100%;
    object-fit: cover;
  }
  &__wrapper {
    display: grid;
    grid-template-columns: 0.1fr 1fr 0.1fr;
    margin: 2rem 0;
    @include md {
      grid-template-rows: 0.8fr 0.3fr 0.7fr;
      grid-template-columns: 1fr 0.2fr 0.45fr 0.5fr;
      margin: 4rem 0;
    }

    h2 {
      font-weight: 300;
      margin-bottom: 1rem;
      font-size: 24px;
    }
  }
  h1 {
    padding: 2rem 1.5rem 0;
    @include md {
      padding: 2rem 0 1rem;
    }
  }

  &__text-wrapper {
    padding: 1.5em;
    background: white;
    grid-column: 1 / span 2;
    grid-row: 1 / span 1;
    z-index: 2;
    box-shadow: $shadow-3;
    @include md {
      padding: 2em;
      grid-column: 2 / span 3;
      grid-row: 2 / span 2;
    }

    p {
      padding: 0.5em 0;
      font-weight: 300;
      font-size: 12px;
      @include xs {
        font-size: 14px;
      }
      @include md {
        font-size: 16px;
      }
    }
  }

  &__image-wrapper {
    max-height: 45vh;
    position: relative;
    grid-column: 2 / span 2;
    grid-row: 2 / span 2;
    @include md {
      grid-column: 1 / span 2;
      grid-row: 1 / span 2;
    }

    &::after {
      display: none;
      @include md {
        content: '';
        z-index: -1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        background: var(--primary);
        transform: translate(8em, 5em);
      }
    }
  }

  .inverted {
    grid-template-columns: 0.1fr 1fr 0.1fr;
    @include md {
      grid-template-rows: 0.5fr 1fr 0.5fr;
      grid-template-columns: 1fr 0.1fr 0.45fr 0.5fr;
    }

    .o-nas__text-wrapper {
      grid-column: 2 / span 2;
      @include md {
        grid-column: 1 / span 2;
        grid-row: 1 / span 2;
      }
    }

    .o-nas__image-wrapper {
      grid-column: 1 / span 2;
      @include md {
        grid-column: 2 / span 3;
        grid-row: 2 / span 2;
      }
      max-height: 500px;
      img {
        z-index: 3;
      }
      &::after {
        transform: translate(-8em, -3em);
      }
    }
  }
}
</style>
