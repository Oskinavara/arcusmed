<template>
  <section class="contact-section">
    <div></div>
    <div class="contact-section__right">
      <h2 class="contact-section__heading">Rejestracja</h2>
      <p class="contact-section__info">
        Na wizyty do naszych specjalistów można umówić się telefonicznie lub
        osobiście w naszej przychodni. Dzień przed ustalonym terminem wizyty
        dzwonimy do naszych pacjentów celem przypomnienia o zbliżającej się
        wizycie.
      </p>
      <h5 class="contact-section__subheading">Rejestracja telefoniczna</h5>
      <address>
        <p>Częstochowa</p>
        <p>Św. Rocha 17</p>
        <a href="mailto:arcusmedrecepcja@gmail.com">
          <img src="@/assets/envelope.svg" />arcusmedrecepcja@gmail.com
        </a>
        <a href="tel:+(34)3664491">
          <img src="@/assets/phone-solid.svg" />
          (34) 366-44-91
        </a>
        <a href="tel:506407833">
          <img src="@/assets/phone-solid.svg" />
          506 407 833
        </a>
      </address>
    </div>
  </section>
</template>

<script>
export default {}
</script>

<style lang="scss" scoped>
.contact-section {
  padding: 3rem;
  display: grid;
  grid-template-columns: 1fr 1fr;

  img {
    max-width: 24px;
    margin-right: 8px;
  }
  &__heading {
    margin-bottom: 2rem;
  }

  &__info {
    padding: 1rem 0;
  }

  a {
    display: flex;
    align-items: center;
    padding: 0.25rem 0;
  }
}
</style>
