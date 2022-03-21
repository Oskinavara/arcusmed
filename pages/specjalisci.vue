<template>
  <div class="specjalisci">
    <section
      v-for="section in sections"
      :key="section.name"
      class="specjalisci__section"
    >
      <h3 class="specjalisci__heading">{{ section.name }}</h3>
      <ul class="specjalisci__list">
        <li
          v-for="doctor in section.doctors"
          :key="doctor.name"
          class="specjalisci__list-item"
        >
          <h4 class="specjalisci__doctor">
            <strong>{{ doctor.name }}</strong> - {{ doctor.info }}
          </h4>
          <p class="specjalisci__appointments">
            {{ `${doctor.days} - ${doctor.hours}` }}
          </p>
        </li>
      </ul>
    </section>
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
              name: 'lek stomatolog Monika Zoła Lizak',
              days: 'poniedziałek - piątek',
              hours: '8:00 - 19:00',
              info: 'specjalista I st. stomatologii ogólnej',
            },
            {
              name: 'lek stomatolog Kamila Krzyniewska',
              days: 'poniedziałki, środy, piątki',
              hours: '8:00 - 17:00',
              info: 'specjalista I st. stomatologii ogólnej',
            },
          ],
        },
        {
          name: 'Onkologia Kliniczna, Radioterapia kliniczna',
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
          name: 'Chirurgia onkologiczna, Profilaktyka i diagnostyka chorób piersi',
          doctors: [
            {
              name: 'lek. Przemysław Jasnowski',
              days: 'wtorek',
              hours: '15:00 - 20:00',
              info: 'specjalista chirurgii ogólnej oraz specjalista chirurgii onkologicznej',
            },
            {
              name: 'lek. Piotr Januszewski',
              days: 'wtorek',
              hours: '15:00 - 20:00',
              info: 'specjalista chirurgii ogólnej, onkologicznej i chirurgii piersi',
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
      ],
    }
  },
}
</script>

<style lang="scss" scoped>
.specjalisci {
  &__section {
    margin-bottom: 2rem;
  }
  &__list-item {
    padding: 0.5rem 0 0.75rem;
  }
  &__heading {
    font-size: 2rem;
    margin-bottom: 1rem;
    font-weight: 300;
  }
  &__doctor {
    strong {
      font-weight: 600;
    }
    margin-bottom: 0.25rem;
  }
}
</style>
