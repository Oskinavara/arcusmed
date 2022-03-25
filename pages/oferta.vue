<template>
  <div class="oferta">
    <h1 class="oferta__heading">Oferta</h1>
    <div class="oferta__flex" id="stomatologia">
      <a class="oferta__link" href="#stomatologia">
        <img src="@/assets/tooth-solid.svg" alt="" />
        Poradnia stomatologiczna
      </a>
      <a class="oferta__link" href="#gabinety">
        <img src="@/assets/stethoscope-solid.svg" alt="" />Gabinety lekarskie
      </a>
    </div>
    <p style="text-align:center;margin-bottom:2rem">Jeszcze bede pracował nad tymi kafelkami... xd</p>
    <Mosaic
      heading="Poradnia stomatologiczna"
      smallImage1="/arcus/Optimized-13.jpg"
      smallImage2="/arcus/Optimized-15.jpg"
      largeImage="/arcus/Optimized-14.jpg"
    >
      <p>
        Nasze gabinety stomatologiczne wyposażone są w nowoczesne mikroskopy
        firmy Leica, oraz sprzęt do wykonywania wszystkich
        wysokospecjalistycznych procedur przeprowadzanych w trakcie leczenia
        kanałowego, protetycznego i zachowawczego. Posiadamy sprzęt do
        wykonywania zdjęć RTG techniką radiowizjografii, pozwalający na szybką i
        dokładną diagnostykę problemu pacjenta. Współpracujemy z pracownią
        wykonująca badania CBCT oraz zdjęcia pantomograficzne
      </p>
      <p>
        Oferujemy kompleksowe leczenie w zakresie stomatologii zachowawczej ze
        szczególnym uwzględnieniem leczenia kanałowego w powiększeniu,
        stomatologii estetycznej leczenia protetycznego, chirurgii
        stomatologicznej i profilaktyki schorzeń przyzębia
      </p>
    </Mosaic>
    <Mosaic
      type="2"
      heading="Co nas wyróżnia?"
      smallImage1="/arcus/Optimized-IMG_1977.jpg"
      smallImage2="/arcus/Optimized-17.jpg"
      largeImage="/arcus/Optimized-22.jpg"
    >
      <p>
        Rutynowo do zabiegów periodontologiczych oraz leczenia zachowawczego
        zębów pracujemy w lupach zabiegowych w 2, 5 oraz 3,2 krotnym
        powiększeniu W przypadku leczenia kanałowego zawsze praca odbywa się z
        użyciem nowoczesnego mikroskopu Leica – w powiększeniu od 5 do 20x
      </p>
      <p>
        W przypadku leczenia kanałowego zawsze praca odbywa się z użyciem
        nowoczesnego mikroskopu Leica – w powiększeniu od 5 do 20x
      </p>
    </Mosaic>
    <h2></h2>
    <h2>Dlaczego leczenie z użyciem mikroskopu jest takie ważne?</h2>
    <li>
      Leczenie z użyciem mikroskopu jest niezbędne dla prawidłowego opracowania
      kanałów. Umożliwia lokalizację wszystkich ujść nawet tych niewidocznych „
      gołym okiem”. Odnalezienie wszystkich kanałów jest kluczowe dla
      prawidłowego przeprowadzenia leczenia endodontycznego a później
      długotrwałego sukcesu w leczeniu zęba: braku dolegliwości bólowych oraz
      braku zmian zapalnych przy wierzchołku korzenia
    </li>
    <li>
      Przy nieprawidłowym leczeniu kanałowym, nawet mimo braku bólu odczuwanego
      przez pacjenta, proces zapalny może skrycie toczyć się w okolicy
      wierzchołka korzenia będąc ogniskiem wysiewu bakterii do krwioobiegu, a co
      za tym idzie przyczyną wielu groźnych chorób ogólnoustrojowych takich jak:
      zapalenie mięśnia sercowego lub reumatoidalne zapalenie stawów
    </li>
    <li>
      Dodatkowy argument przemawiający za pracą z użyciem mikroskopu to poprawa
      dokładności w zakresie zabiegów wykonywanych w jamie ustnej oraz
      wymagających dobrej widoczności i oświetlenia, takich jak: odbudowa i
      wypełnienia zębów oraz uzupełnienia protetyczne takie jak korony, licówki
      i mosty .
    </li>
    <h2 id="gabinety">Gabinety lekarskie</h2>
    <div class="oferta__tiles-wrapper">
      <div class="oferta__tile" v-for="tile in tiles" :key="tile.heading">
        <h4>{{ tile.heading }}</h4>
        <p>{{ tile.content }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tiles: [
        {
          heading: 'Onkologia Kliniczna, Radioterapia kliniczna',
          content:
            'Zapewniamy kompleksową opiekę nad Pacjentami z podejrzeniem nowotworu lub zdiagnozowaną chorobą nowotworową: porady w zakresie onkologi klinicznej i radioterapii onkologicznej, kwalifikacja do leczenia systemowego/chemioterapii, immunoterapii i leczenia hormonalnego, kwalifikacja do radioterapii, kontrola po leczeniu napromienianiem oraz diagnostyka ultrasonograficzna chorób piersi.',
        },
        {
          heading:
            'Chirurgia onkologiczna, Profilaktyka i diagnostyka chorób piersi',
          content:
            'Doświadczeni lekarze chirurdzy onkologiczni i specjaliści z zakresu chirurgii plastycznej, wykonują diagnostykę ultrasonograficzną (USG) chorób piersi, biopsję cienko-igłową i grubo-igłową, oraz biopsję mammotomiczną piersi.',
        },
        {
          heading: 'Endokrynologia',
          content:
            'Konsultacje w zakresie endokrynologii, diagnostyka USG tarczycy. Leczone choroby: choroba Hashimoto, niedoczynność tarczycy, nadczynność tarczycy, zaburzenia osi przysadkowo-nadnerczowej, zaburzenia hormonalne u kobiet i mężczyzn',
        },
        {
          heading: 'Neurochirurgia',
          content:
            'Konsultacje w zakresie neurochirurgii i leczenia: chorób kręgosłupa, choróby neurologicznych, choroby Parkinsona, dystonii, drżenia rąk, guzów mózgu, nowotworów rdzenia kręgowego, dyskopatii oraz bólu.',
        },
      ],
    }
  },
  head: {
    title: 'Arcus-Med | Oferta',
  },
}
</script>

<style lang="scss" scoped>
.oferta {
  &__flex {
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
  }

  &__link {
    color: white;
    padding: 1rem;
    background: rgba($primary, 1);
    margin: 0 1rem;

    img {
      max-width: 4rem;
      display: block;
      margin: 0 auto 0.5rem;
      filter: invert(1);
    }
  }

  &__tiles-wrapper {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 1rem;
  }

  &__tile {
    padding: 2rem;
    border: 1px solid #ccc;

    &:nth-of-type(2n) {
      margin-top: 3rem;
    }
  }
  p {
    padding: 0.5rem 0;
  }
}
</style>
