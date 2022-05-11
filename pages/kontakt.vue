<template>
  <div class="kontakt">
    <!-- <h1>Zapraszamy do gabinetów!</h1>
    <p>Poniedziałek - piątek od 8:30 do 19:00</p> -->
    <img
      class="kontakt__background"
      src="https://oskinavara.imgix.net/Optimized-IMG_2015.jpg?auto=format"
      alt=""
    />
    <ContactSection />
  </div>
</template>

<script>
export default {
  head: {
    title: 'Kontakt | ARCUS-MED: Nowoczesne gabinety stomatologiczne i lekarskie',
  },
}
</script>

<style lang="scss" scoped>
.kontakt {
  &__background {
    object-fit: cover;
    max-height: 35vh;
    width: 100%;
    object-position: 0 33%;
  }
}
</style>
