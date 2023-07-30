<template>
  <div class="specjalisci">
    <h1>Specjaliści</h1>
    <section
      v-for="section in sections"
      :key="section.name"
      class="specjalisci__section"
    >
      <h2 class="specjalisci__heading">{{ section.name }}</h2>
      <ul class="specjalisci__list">
        <li
          v-for="doctor in section.doctors"
          :key="doctor.name"
          class="specjalisci__list-item"
        >
          <h3 class="specjalisci__doctor">
            <strong>{{ doctor.name }}</strong>
            <span v-if="doctor.info">-</span> {{ doctor.info }}
          </h3>
          <p v-if="!doctor.alternativeHours" class="specjalisci__appointments">
            {{ `${doctor.days} - ${doctor.hours}` }}
          </p>
          <template v-else>
            <p
              v-for="item in doctor.alternativeHours"
              :key="item.days"
              class="specjalisci__appointments"
            >
              {{ `${item.days} - ${item.hours}` }}
            </p>
          </template>
        </li>
      </ul>
    </section>
    <p class="specjalisci__disclaimer">
      Podane ceny usług medycznych są publikowane w celach informacyjnych i nie
      stanowią oferty handlowej wg. art. 66 par. 1 Kodeksu Cywilnego. Podane
      ceny mogą ulec zmianie. Arcus-Med Sp. z o.o. zastrzega sobie prawo do
      zmian.
    </p>
  </div>
</template>

<script>
export default {
  name: 'Specjalisci',
  data() {
    return {
      sections: [
        {
          name: 'Stomatologia',
          doctors: [
            {
              name: 'lek. stomatolog Monika Zoła-Lizak',
              days: 'poniedziałek - piątek',
              hours: '8:00 - 19:00',
              info: 'specjalista I st. stomatologii ogólnej',
            },
            {
              name: 'lek. dentysta Kamila Krzyniewska',
              days: 'poniedziałki, środy, piątki',
              hours: '8:00 - 17:00',
              alternativeHours: [
                { days: 'poniedziałek, środa', hours: '14:00 - 19:00' },
                { days: 'piątek', hours: '9:00 - 14:00' },
              ],
            },
          ],
        },
        {
          name: 'Onkologia kliniczna, radioterapia onkologiczna',
          doctors: [
            {
              name: 'lek. Adam Lizak',
              days: 'poniedziałek',
              hours: '17:00 - 20:00',
              info: 'specjalista radioterapeuta onkolog',
            },
          ],
        },
        {
          name: 'Onkologia kliniczna',
          doctors: [
            {
              name: 'lek. Dorota Bogus',
              info: 'specjalista onkologii klinicznej',
            },
          ],
        },
        {
          name: 'Chirurgia onkologiczna, profilaktyka i diagnostyka chorób piersi',
          doctors: [
            {
              name: 'lek. Piotr Januszewski',
              days: 'wtorek',
              hours: '15:00 - 20:00',
              info: 'specjalista chirurgii ogólnej oraz specjalista chirurgii onkologicznej',
            },
            {
              name: 'lek. Piotr Januszewski',
              days: 'środa',
              hours:
                '16:00 - 17:00 (po wcześniejszej rejestracji telefonicznej)',
              info: 'współpraca w zakresie biopsji mammotomicznej wspomaganej próżnią',
            },
          ],
        },
        {
          name: 'Endokrynologia',
          doctors: [
            {
              name: 'lek. Małgorzata Nowicka',
              days: 'czwartek',
              hours: '15:00 - 19:00',
              info: 'specjalista gastroenterologii oraz specjalista endokrynologii',
            },
          ],
        },
        {
          name: 'Neurochirurgia',
          doctors: [
            {
              name: 'dr n.med. Tomasz Rynkiewicz',
              days: 'czwartek',
              hours: '15:00 - 20:00',
              info: 'specjalista neurochirurgii',
            },
          ],
        },
        {
          name: 'Neurologia',
          doctors: [
            {
              name: 'lek. Michał Halkiewicz',
              days: 'środa',
              hours: '15:30 - 19:00',
              info: 'lekarz rezydent w trakcie specjalizacji z neurologii',
            },
          ],
        },
        {
          name: 'Chirurgia urazowo-ortopedyczna',
          doctors: [
            {
              name: 'lek. Jacek Niski',
              days: 'wtorek',
              hours: '17:00 - 19:00',
              info: 'specjalista chirurgii urazowo-ortopedycznej',
            },
          ],
        },
        {
          name: 'Gastroenterologia, choroby wewnętrzne',
          doctors: [
            {
              name: 'lek. Alina Niska',
              days: 'wtorek',
              hours: '15:00 - 19:00',
              info: 'specjalista chorób wewnętrznych i gastroenterologii',
            },
          ],
        },
      ],
    }
  },
  head: {
    title:
      'Specjaliści | ARCUS-MED: Nowoczesne gabinety stomatologiczne i lekarskie',
  },
}
</script>

<style lang="scss" scoped>
.specjalisci {
  max-width: 1000px;
  margin: 0 auto;
  padding: 0 1.5rem 4rem;
  h1 {
    padding: 2rem 0;
    color: white;
  }
  &__section {
    position: relative;
    padding: 1.5rem;
    box-shadow: $shadow-3;
    background: $background;
    &:not(:last-of-type) {
      margin-bottom: 3rem;
    }
    @include sm {
      padding: 2rem;
    }

    &:nth-of-type(1),
    &:nth-of-type(5) {
      &::after {
        content: '';
        height: 100%;
        width: 100%;
        background: var(--primary);
        position: absolute;
        z-index: -1;
        left: -1rem;
        bottom: 40%;
        @include md {
          left: -5%;
        }
      }
    }
    &:nth-of-type(3),
    &:nth-of-type(7) {
      &::after {
        content: '';
        height: 100%;
        width: 100%;
        background: var(--primary);
        position: absolute;
        z-index: -1;
        left: 1rem;
        bottom: 40%;
        @include md {
          left: 5%;
        }
      }
    }
  }
  &__list-item {
    padding: 0.5rem 0 0.75rem;
  }
  &__heading {
    margin-bottom: 1rem;
    font-weight: 300;
    font-size: 1.5rem;
    @include sm {
      font-size: 2rem;
    }
  }
  &__doctor {
    font-size: 15px;
    margin-bottom: 0.25rem;
    @include sm {
      font-size: 16px;
    }
    strong {
      font-weight: 600;
    }
  }

  &__appointments {
    font-size: 15px;
    @include sm {
      font-size: 16px;
    }
  }

  &__disclaimer {
    font-size: 12px;
    margin-top: 2rem;
  }
}
</style>
