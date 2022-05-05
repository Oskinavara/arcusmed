<template>
  <div class="galeria page">
    <h1>Galeria</h1>
    <div class="galeria__grid">
      <img
        src="/arcus/galeria1.webp"
        alt="Zdjęcia przed i po leczeniu kanałowym"
      />
      <img
        src="/arcus/galeria2.webp"
        alt="Zdjęcia przed i po leczeniu kanałowym"
      />
      <img
        src="/arcus/galeria3.webp"
        alt="Zdjęcia przed i po leczeniu kanałowym"
      />
      <img
        src="/arcus/galeria4.webp"
        alt="Zdjęcia przed i po leczeniu kanałowym"
      />
    </div>
  </div>
</template>

<script>
export default {
  head: {
    title: 'Arcus-Med | Specjaliści',
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
