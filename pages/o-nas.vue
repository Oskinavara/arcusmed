<template>
  <div class="o-nas">
    <p>
      Przychodnia NZOZ ARCUS-MED to przyjazne miejsce nieopodal Jasnej Góry,
      zlokalizowane w centrum Częstochowy przy ul. Św. Rocha 17. Dla naszych
      pacjentów dostępny jest prywatny, bezpłatny parking zlokalizowany na
      posesji.
    </p>

    <div class="o-nas__flex">
      <img src="/arcus/Optimized-IMG_2008.jpg" alt="" />
      <p>
        Wnętrze naszej przychodni został stworzony z myślą o komforcie naszych
        pacjentów: klimatyzowane gabinety, poczekalnia, dostęp do bezprzewodowej
        sieci Wi-Fi, toaleta. Przychodnia przyjazna jest osobom
        niepełnosprawnym: brak barier architektonicznych, wejście do przychodni
        bez stopni – z poziomu 0 oraz toaleta dostosowana do potrzeb osób
        niepełnosprawnych.
      </p>
    </div>
    <div class="o-nas__flex">
      <p>
        NZOZ Arcus-Med to przychodnia o profilu stomatologiczno – lekarskim.
        Powstała jako naturalny efekt zawodowej pasji jej właścicieli. Przychodnia
        jest kontynuacją prowadzonego od 1997 r. gabinetu stomatologicznego Moniki
        Zoły Lizak, oraz gabinetu lekarskiego Adam Lizaka. Od 1 czerwca 2009 roku
        jesteśmy przy ulicy św. Rocha 17 w Częstochowie. Od początku
        funkcjonowania NZOZ ARCUS-MED naszym celem jest nowoczesne leczenie
        pacjentów wynikające z zasad medycyny opartej na faktach (Evidence Based
        Medicine), holistyczne podejście do Pacjenta oraz profilaktyka chorób
        cywilizacyjnych. Współpraca z wieloma lekarzami prezentującymi wysoki
        poziom merytoryczny oraz regularne uczestnictwo w kursach i szkoleniach
        podnoszących kwalifikacje zawodowe dają nadzieje na spełnienie oczekiwań
        naszych Pacjentów. Zapraszamy do kontaktu oraz umawiania wizyt z naszymi
        specjalistami.
      </p>
      <img src="/arcus/Optimized-IMG_1915.jpg" alt="">
    </div>
  </div>
</template>

<script>
export default {}
</script>

<style lang="scss" scoped>
.o-nas {
  &__flex {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }
}
p {
  margin: 2rem 0;
}
</style>
