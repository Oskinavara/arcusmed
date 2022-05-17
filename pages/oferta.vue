<template>
  <div class="oferta">
    <TilesBig />
    <div class="oferta__inner page">
      <div id="stomatologia"></div>
      <h1 class="oferta__heading">Oferta</h1>
      <StomaTile />
      <Mosaic
        heading="Poradnia stomatologiczna"
        smallImage1="https://oskinavara.imgix.net/arcus/13.jpg?auto=format&w=320"
        smallImage2="https://oskinavara.imgix.net/arcus/15.jpg?auto=format&w=320"
        largeImage="https://oskinavara.imgix.net/arcus/14.jpg?auto=format&w=650"
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
        smallImage1="https://oskinavara.imgix.net/arcus/IMG_1977.jpg?auto=format&w=320"
        smallImage2="https://oskinavara.imgix.net/arcus/17.jpg?auto=format&w=320"
        largeImage="https://oskinavara.imgix.net/arcus/22.jpg?auto=format&w=650"
      >
        <p>
          Rutynowo do zabiegów periodontologiczych oraz leczenia zachowawczego
          zębów pracujemy w lupach zabiegowych w 2,5 oraz 3,2-krotnym
          powiększeniu. W przypadku leczenia kanałowego praca zawsze odbywa się
          z użyciem nowoczesnego mikroskopu Leica – w powiększeniu od 5 do 20x.
        </p>
      </Mosaic>
      <Mosaic
        type="3"
        heading="Dlaczego leczenie z użyciem mikroskopu jest takie ważne?"
        smallImage1="https://oskinavara.imgix.net/arcus/16.jpg?auto=format&w=320"
        smallImage2="https://oskinavara.imgix.net/arcus/20.jpg?auto=format&w=320"
        largeImage="https://oskinavara.imgix.net/arcus/23.jpg?auto=format&w=650"
        style="margin: 0"
      >
        <ul>
          <li>
            Leczenie z użyciem mikroskopu jest niezbędne dla prawidłowego
            opracowania kanałów. Umożliwia lokalizację wszystkich ujść kanałów,
            nawet tych niewidocznych „gołym okiem”. Odnalezienie wszystkich
            kanałów jest kluczowe dla prawidłowego przeprowadzenia leczenia
            endodontycznego a później długotrwałego sukcesu w leczeniu zęba:
            braku dolegliwości bólowych oraz braku zmian zapalnych przy
            wierzchołku korzenia
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
            korony, licówki i mosty
          </li>
        </ul>
      </Mosaic>
      <div id="gabinety"></div>
    </div>
    <div class="oferta__background">
      <div class="oferta__background-inner">
        <div class="gabinety__inner">
          <h2 class="gabinety__heading">Gabinety lekarskie</h2>
          <div class="oferta__tiles-wrapper">
            <div class="oferta__tile" v-for="tile in tiles" :key="tile.heading">
              <h3>{{ tile.heading }}</h3>
              <p>{{ tile.content }}</p>
            </div>
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
    title:
      'Oferta | ARCUS-MED: Nowoczesne gabinety stomatologiczne i lekarskie',
  },
}
</script>

<style lang="scss" scoped>
.oferta {
  .tiles {
    padding: 48px 0 0;
  }
  &__inner {
    padding: 0 1.5rem;
  }
  &__flex {
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
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
      grid-template-columns: repeat(1, 1fr);
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
    @include sm {
      font-size: 16px;
    }
  }

  &__background {
    padding: 2em 0 0;
  }

  &__background-inner {
    background: var(--primary);
    margin: 0 auto;
    padding: 2.5rem 0;
    @include md {
      padding: 4rem 0;
    }
  }

  .gabinety {
    text-align: center;
    margin-bottom: 3rem;

    &__heading {
      margin-right: 4rem;
      color: white;
      padding-top: 1.5rem;
      font-size: 42px;
      margin-bottom: 2rem;
      @include md {
        white-space: nowrap;
        margin-bottom: 0;
      }
    }

    &__inner {
      margin: 0 auto;
      padding: 0 20px;
      max-width: $layout-width;
      display: flex;
      flex-direction: column;
      @include md {
        flex-direction: row;
      }
    }
  }

  #gabinety,
  #stomatologia {
    padding: 4rem 0 0 0;
  }

  h3 {
    margin-bottom: 0.75rem;
    font-size: 22px;
    @include sm {
      font-size: 1.6em;
    }
  }
}
</style>
