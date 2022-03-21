<template>
  <div>
    Oferta
    <a href="#stomatologia"> Poradnia stomatologiczna </a>
    <a href="#gabinety"> Gabinety lekarskie </a>
    <h2 id="stomatologia">Poradnia stomatologiczna</h2>
    <p>
      Nasze gabinety stomatologiczne wyposażone są w nowoczesne mikroskopy firmy
      Leica, oraz sprzęt do wykonywania wszystkich wysokospecjalistycznych
      procedur przeprowadzanych w trakcie leczenia kanałowego, protetycznego i
      zachowawczego. Posiadamy sprzęt do wykonywania zdjęć RTG techniką
      radiowizjografii, pozwalający na szybką i dokładną diagnostykę problemu
      pacjenta. Współpracujemy z pracownią wykonująca badania CBCT oraz zdjęcia
      pantomograficzne
    </p>
    <p>
      Oferujemy kompleksowe leczenie w zakresie stomatologii zachowawczej ze
      szczególnym uwzględnieniem leczenia kanałowego w powiększeniu,
      stomatologii estetycznej leczenia protetycznego, chirurgii
      stomatologicznej i profilaktyki schorzeń przyzębia
    </p>
    <h3>Co nas wyróżnia?</h3>
    <ul>
      <li>
        Rutynowo do zabiegów periodontologiczych oraz leczenia zachowawczego
        zębów pracujemy w lupach zabiegowych w 2, 5 oraz 3,2 krotnym
        powiększeniu
      </li>
      <li>
        W przypadku leczenia kanałowego zawsze praca odbywa się z użyciem
        nowoczesnego mikroskopu Leica – w powiększeniu od 5 do 20x
      </li>
    </ul>
    <h3>Dlaczego leczenie z użyciem mikroskopu jest takie ważne ?.</h3>
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
    <h2>Gabinety lekarskie</h2>
    <div v-for="tile in tiles" :key="tile.heading">
      <h4>{{ tile.heading }}</h4>
      <p>{{ tile.content }}</p>
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
}
</script>

<style lang="scss" scoped>
</style>
