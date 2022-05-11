<template>
  <div class="galeria page">
    <h1>Galeria</h1>
    <div class="galeria__grid">
      <img
        src="https://oskinavara.imgix.net/galeria1.webp?auto=format"
        alt="Zdjęcia przed i po leczeniu kanałowym"
      />
      <img
        src="https://oskinavara.imgix.net/galeria2.webp?auto=format"
        alt="Zdjęcia przed i po leczeniu kanałowym"
      />
      <img
        src="https://oskinavara.imgix.net/galeria3.webp?auto=format"
        alt="Zdjęcia przed i po leczeniu kanałowym"
      />
      <img
        src="https://oskinavara.imgix.net/galeria4.webp?auto=format"
        alt="Zdjęcia przed i po leczeniu kanałowym"
      />
    </div>
  </div>
</template>

<script>
export default {
  head: {
    title: 'Galeria | ARCUS-MED: Nowoczesne gabinety stomatologiczne i lekarskie',
  },
}
</script>

<style lang="scss" scoped>
.galeria {
  padding: 0 1.5rem;
  h1 {
    padding: 2rem 0;
  }
  &__grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  }
}
</style>
