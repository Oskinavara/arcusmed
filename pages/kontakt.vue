<template>
  <div class="kontakt">
    <img
      class="kontakt__background"
      src="https://oskinavara.imgix.net/arcus/IMG_2015.jpg?auto=format&w=1800"
      alt=""
    />
    <h1>Zapraszamy do gabinetów!</h1>
    <p>Poniedziałek - piątek od 8:30 do 19:00</p>
    <ContactSection />
  </div>
</template>

<script>
export default {
  head: {
    title:
      'Kontakt | ARCUS-MED: Nowoczesne gabinety stomatologiczne i lekarskie',
  },
}
</script>

<style lang="scss" scoped>
.kontakt {
  text-align: center;
  background: var(--primary);
  color: white;
  h1 {
    padding-top: 2.5rem;
    margin-bottom: 2rem;
    @include md {
      padding-top: 3rem;
    }
  }
  > p {
    margin-bottom: 2rem;
    @include md {
      font-size: 24px;
      margin-bottom: 0;
    }
  }
  &__background {
    object-fit: cover;
    max-height: 35vh;
    width: 100%;
    object-position: 0 33%;
  }
}
</style>
