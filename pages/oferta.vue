<template>
  <div class="oferta page">
    <h1 class="oferta__heading">Oferta</h1>
    <Tiles />
    <div id="stomatologia"></div>
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
        kanałowego, protetycznego i zachowawczego. Współpracujemy z pracownią
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
    <Mosaic
      type="3"
      heading="Dlaczego leczenie z użyciem mikroskopu jest takie ważne?"
      smallImage1="/arcus/Optimized-16.jpg"
      smallImage2="/arcus/Optimized-20.jpg"
      largeImage="/arcus/Optimized-22.jpg"
      style="margin: 0"
    >
      <ul>
        <li>
          Leczenie z użyciem mikroskopu jest niezbędne dla prawidłowego
          opracowania kanałów. Umożliwia lokalizację wszystkich ujść nawet tych
          niewidocznych „ gołym okiem”. Odnalezienie wszystkich kanałów jest
          kluczowe dla prawidłowego przeprowadzenia leczenia endodontycznego a
          później długotrwałego sukcesu w leczeniu zęba: braku dolegliwości
          bólowych oraz braku zmian zapalnych przy wierzchołku korzenia
        </li>
        <li>
          Przy nieprawidłowym leczeniu kanałowym, nawet mimo braku bólu
          odczuwanego przez pacjenta, proces zapalny może skrycie toczyć się w
          okolicy wierzchołka korzenia będąc ogniskiem wysiewu bakterii do
          krwioobiegu, a co za tym idzie przyczyną wielu groźnych chorób
          ogólnoustrojowych takich jak: zapalenie mięśnia sercowego lub
          reumatoidalne zapalenie stawów
        </li>
        <li>
          Dodatkowy argument przemawiający za pracą z użyciem mikroskopu to
          poprawa dokładności w zakresie zabiegów wykonywanych w jamie ustnej
          oraz wymagających dobrej widoczności i oświetlenia, takich jak:
          odbudowa i wypełnienia zębów oraz uzupełnienia protetyczne takie jak
          korony, licówki i mosty .
        </li>
      </ul>
    </Mosaic>
    <div id="gabinety"></div>
    <div class="oferta__background">
      <div class="oferta__background-inner">
        <h2 class="gabinety">Gabinety lekarskie</h2>
        <div class="oferta__tiles-wrapper">
          <div class="oferta__tile" v-for="tile in tiles" :key="tile.heading">
            <h4>{{ tile.heading }}</h4>
            <p>{{ tile.content }}</p>
          </div>
        </div>
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
          heading: 'Onkologia kliniczna i radioterapia onkologiczna',
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
        {
          heading: 'Neurologia',
          content:
            'W ramach usług świadczonych przez poradnię neurologiczną oferujemy diagnostykę i leczenie chorób ośrodkowego i obwodowego układu nerwowego. W naszych gabinetach wykonujemy również badanie USG Doppler tętnic szyjnych.',
        },
        {
          heading: 'Gastroenterologia',
          content:
            'W poradni gastroenterologicznej zajmujemy się zagadnieniami związanymi z profilaktyką, diagnostyką i leczeniem chorób całego przewodu pokarmowego (przełyk, żołądek, jelito cienkie i grube, odbytnica, wątroba, trzustka)',
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
  .tiles {
    padding: 48px 0 0;
  }
  padding: 0 1.5rem;
  &__flex {
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
  }

  &__heading {
    padding: 2rem 0 1rem;
  }

  &__link {
    color: white;
    padding: 1rem;
    background: rgba(var(--primary), 1);
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
    grid-template-columns: repeat(1, 1fr);
    grid-gap: 1.5rem;
    @include sm {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  &__tile {
    padding: 2rem;
    background: $white;
    border-radius: 0.5rem;
    box-shadow: 0px 2px 20px rgba(black, 0.1);
  }
  p,
  li {
    padding: 0.5rem 0;
    font-weight: 300;
    font-size: 14px;
    line-height: 1.5;
  }

  &__background {
    padding: 2em 0 6rem;
  }

  &__background-inner {
    margin: 0 auto;
    max-width: $layout-width;
  }

  .gabinety {
    text-align: center;
    margin-bottom: 3rem;
  }

  #gabinety,
  #stomatologia {
    padding: 4rem 0 0 0;
  }

  h4 {
    margin-bottom: 0.75rem;
    font-size: 22px;
    @include sm {
      font-size: 1.6em;
    }
  }
}
</style>
