<template>
  <div class="galeria page">
    <h1>Galeria</h1>
    <h2 class="galeria__subheading">Urazy</h2>
    <GallerySection
      imageSrc="https://oskinavara.imgix.net/galeria1.webp?auto=format"
      class="galeria__first"
    >
      <div class="flex">
        <p class="galeria__description">
          Przed: Zdjęcie zęba po urazie komunikacyjnym.
        </p>
        <p class="galeria__description">
          Po: Odbudowa utraconego fragmentu zęba za pomocą kompozytu.
        </p>
      </div>
    </GallerySection>

    <h2 class="galeria__subheading">Leczenie kanałowe</h2>
    <GallerySection
      imageSrc="https://oskinavara.imgix.net/arcus/Bula.JPG?auto=format"
    >
      <p>
        Pacjentka zgłosiła się z bólem siekacza górnego lewego, leczonego
        miesiąc wcześniej w innym gabinecie. Zgłaszała samoistny, pulsujący ból
        tego zęba. Po leczeniu kanałowym, w trakcie którego zdezynfekowano kanał
        i szczelnie go wypełniono dolegliwości bólowe ustąpiły całkowicie.
      </p>
    </GallerySection>
    <GallerySection
      imageSrc="https://oskinavara.imgix.net/arcus/kowalczyk.JPG?auto=format"
      inverted
    >
      <p>
        Pacjentka zgłasza ból górnego prawego przedtrzonowca podczas nagryzania
        oraz ból samoistny. Po odnalezieniu w mikroskopie 3 kanałów oraz
        uprzedniej dezynfekcji, a następnie szczelnym wypełnieniu wszystkich
        kanałów dolegliwości bólowe ustąpiły.
      </p>
    </GallerySection>
    <GallerySection
      imageSrc="https://oskinavara.imgix.net/arcus/wysokińska.JPG?auto=format"
    >
      <p>
        Pacjentka zgłasza ból zęba przy nagryzaniu oraz ból samoistny. Po
        leczeniu wszystkie dolegliwości minęły.
      </p>
    </GallerySection>

    <div class="galeria__grid">
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
    title:
      'Galeria | ARCUS-MED: Nowoczesne gabinety stomatologiczne i lekarskie',
  },
}
</script>

<style lang="scss" scoped>
.galeria {
  padding: 0 1.5rem;
  h1 {
    padding: 2rem 0 0;
    margin-bottom: 2rem;
    @include md {
      margin-bottom: 4rem;
    }
  }

  &__grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    grid-gap: 1rem;
    margin-bottom: 4rem;
  }
  h2 {
    margin: 2rem 0 0;
    @include md {
      margin: 4rem 0 2rem;
    }
  }

  &__subheading {
    text-align: center;
  }

  &__first {
    @include md {
      grid-template-columns: 1fr 1.7fr;
    }
  }
  .flex {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: flex-start;
    max-width: 600px;
    background: var(--primary);
    padding: 2rem;
    color: white;
    margin: 0.8rem 0;

    p {
      align-self: initial;
      &:first-of-type {
        margin-bottom: 2rem;
      }
    }
  }
}
</style>
