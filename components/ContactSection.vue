<template>
  <section class="contact-section">
    <div style="display: grid; place-items: center; padding: 2rem">
      Tutaj bd mapa Google tak sobie to wyobrażam, to nic nie kosztuje, ale
      trzeba podpiąć kartę płatniczą do konta
    </div>
    <div class="contact-section__right">
      <h2 class="contact-section__heading">Rejestracja</h2>
      <p class="contact-section__info">
        Na wizyty do naszych specjalistów można umówić się telefonicznie lub
        osobiście w naszej przychodni. Dzień przed ustalonym terminem wizyty
        dzwonimy do naszych pacjentów celem przypomnienia o zbliżającej się
        wizycie.
      </p>
      <address>
        <h3>
          <span> Częstochowa, Św. Rocha 17</span>Może bez adresu jak bedzie mapa
        </h3>
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
  padding: 5rem;
  display: grid;
  grid-template-columns: 1fr 1fr;

  img {
    max-width: 24px;
    margin-right: 8px;
  }
  &__heading {
    font-family: 'Poppins';
    font-weight: 300;
    margin-bottom: 1rem;
  }

  &__info {
    padding: 0.5rem 0;
  }

  a {
    font-family: 'Poppins';
    display: flex;
    align-items: center;
    padding: 0.25rem 0;
    font-weight: 500;
  }

  h3 {
    font-family: 'Poppins';
    font-weight: 500;
    margin: 1rem 0 1rem;
    font-size: 16px;
    span {
      text-decoration: line-through;
    }
  }
}
</style>
