<template>
  <section class="contact-section">
    <div class="contact-section__wrapper">
      <client-only>
        <iframe title="Google map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5041.573996716936!2d19.091771498256605!3d50.8165850023146!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfe2f57d8b990a91b!2sArcus-Med.%20NZOZ.%20Specjalistyczne%20gabinety%20stomatologiczne%20i%20lekarskie!5e0!3m2!1spl!2spl!4v1651762667565!5m2!1spl!2spl" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </client-only>
      <div class="contact-section__right">
        <h2 class="contact-section__heading">Rejestracja</h2>
        <p class="contact-section__info">
          Na wizyty do naszych specjalistów można umówić się telefonicznie lub
          osobiście w naszej przychodni. Dzień przed ustalonym terminem wizyty
          dzwonimy do naszych pacjentów celem przypomnienia o zbliżającej się
          wizycie.
        </p>
        <p class="contact-section__info">
          Jeśli nasz telefon będzie zajęty, lub chcesz się z nami skontaktować
          poza godzinami pracy przychodni prosimy o kontakt mailowy, oddzwonimy
          w przeciągu 24 godzin.
        </p>
        <address>
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
  text-align: left;
  background: var(--primary);
  color: white;
  padding: 1.5rem;
  @include xs {
    padding: 3rem;
  }
  @include md {
    padding: 4rem;
  }

  &__wrapper {
    display: grid;
    max-width: 1000px;
    margin: 0 auto;
    align-items: center;
    grid-template-columns: 1fr;
    @include md {
      grid-template-columns: 1fr 1fr;
    }
  }

  &__map {
    height: 268px;
    @include md {
      height: 400px;
      /* height: auto; */
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
    margin-bottom: 0.5rem;
    font-size: 14px;
    @include sm {
      font-size: 16px;
    }
  }

  iframe {
    @media screen and (max-width: 460px) {
      max-height: 40vh;
    }
  }

  &__right {
    padding: 1.5rem 0;
    @include md {
      margin-left: 2rem;
    }
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
      font-size: 14px;
      @include sm {
        font-size: 16px;
      }
    }
    a {
      display: flex;
      align-items: center;
      padding: 0.5rem 0;
      font-weight: 300;
    }
  }
}
</style>
