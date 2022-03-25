<template>
  <div class="o-nas">
    <div class="o-nas__wrapper">
      <div class="o-nas__image-wrapper">
        <img src="/arcus/Optimized-IMG_2008.jpg" alt="" />
      </div>
      <div class="o-nas__text-wrapper">
        <h2>Przychodnia NZOZ ARCUS-MED</h2>
        <p>
          Przyjazne miejsce nieopodal Jasnej Góry, zlokalizowane w centrum
          Częstochowy przy ul. Św. Rocha 17. Dla naszych pacjentów dostępny jest
          prywatny, bezpłatny parking zlokalizowany na posesji.
        </p>
        <p>
          Wnętrze naszej przychodni został stworzony z myślą o komforcie naszych
          pacjentów: klimatyzowane gabinety, poczekalnia, dostęp do
          bezprzewodowej sieci Wi-Fi, toaleta. Przychodnia przyjazna jest osobom
          niepełnosprawnym: brak barier architektonicznych, wejście do
          przychodni bez stopni – z poziomu 0 oraz toaleta dostosowana do
          potrzeb osób niepełnosprawnych.
        </p>
      </div>
    </div>
    <div class="o-nas__flex">
      <p>
        NZOZ Arcus-Med to przychodnia o profilu stomatologiczno – lekarskim.
        Powstała jako naturalny efekt zawodowej pasji jej właścicieli.
        Przychodnia jest kontynuacją prowadzonego od 1997 r. gabinetu
        stomatologicznego Moniki Zoły Lizak, oraz gabinetu lekarskiego Adam
        Lizaka. Od 1 czerwca 2009 roku jesteśmy przy ulicy św. Rocha 17 w
        Częstochowie. Od początku funkcjonowania NZOZ ARCUS-MED naszym celem
        jest nowoczesne leczenie pacjentów wynikające z zasad medycyny opartej
        na faktach (Evidence Based Medicine), holistyczne podejście do Pacjenta
        oraz profilaktyka chorób cywilizacyjnych. Współpraca z wieloma lekarzami
        prezentującymi wysoki poziom merytoryczny oraz regularne uczestnictwo w
        kursach i szkoleniach podnoszących kwalifikacje zawodowe dają nadzieje
        na spełnienie oczekiwań naszych Pacjentów. Zapraszamy do kontaktu oraz
        umawiania wizyt z naszymi specjalistami.
      </p>
      <img src="/arcus/Optimized-IMG_1915.jpg" alt="" />
    </div>
  </div>
</template>

<script>
export default {}
</script>

<style lang="scss" scoped>
.o-nas {
  &__wrapper {
    display: grid;
    grid-template-columns: 1fr 0.15fr 0.8fr;
    grid-template-rows: 1fr 1fr 0.5fr;
    margin: 4rem 0;
  }

  &__text-wrapper {
    padding: 2em;
    background: white;
    grid-column: 2 / span 2;
    grid-row: 2 / span 2;
    z-index: 2;

    p {
      padding: 1em 0;
    }
  }

  &__image-wrapper {
    position: relative;
    grid-column: 1 / span 2;
    grid-row: 1;
    grid-row: 1 / span 2;

    &::after {
      content: '';
      z-index: -1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      position: absolute;
      background: $primary;
      transform: translate(8em, 5em);
    }
  }
}
</style>
