<template>
  <div class="cennik">
    <h1 class="cennik__heading">Cennik</h1>
    <section class="cennik__section">
      <h2 class="cennik__subheading">Stomatologia zachowawcza</h2>
      <p class="cennik__note">*Cena nie obejmuje ewentualnego znieczulenia</p>
      <ul class="cennik__table">
        <li class="cennik__list-item" v-for="item in stom" :key="item.name">
          <p class="cennik__name">
            {{ item.name }}
          </p>
          <p class="cennik__price">
            {{ item.price }}
          </p>
        </li>
      </ul>
    </section>

    <section class="cennik__section">
      <h2 class="cennik__subheading">Leczenie kanałowe</h2>
      <p class="cennik__note">Leczenie pod mikroskopem z użyciem koferdamu</p>
      <p class="cennik__note">
        Obejmuje koszt leczenia na dwóch wizytach z użyciem specjalistycznego
        sprzętu , każdorazowo konieczne znieczulenie oraz wykonanie niezbędnych
        zdjęć RVG niezbędnych do wcześniejszej diagnostyki oraz końcowej
        kontroli jakości i poprawności leczenia.
      </p>
      <p class="cennik__note">
        *Cena nie obejmuje odbudowy zęba po leczeniu kanałowym
      </p>
      <ul class="cennik__table">
        <li class="cennik__list-item" v-for="item in stom" :key="item.name">
          <p class="cennik__name">
            {{ item.name }}
          </p>
          <p class="cennik__price">
            {{ item.price }}
          </p>
        </li>
      </ul>
      <p class="cennik__note">Dodatkowo płatne</p>
      <ul class="cennik__table">
        <li class="cennik__list-item" v-for="item in stom2" :key="item.name">
          <p class="cennik__name">
            {{ item.name }}
          </p>
          <p class="cennik__price">
            {{ item.price }}
          </p>
        </li>
      </ul>
    </section>

    <section class="cennik__section">
      <h2 class="cennik__subheading">Profilaktyka</h2>
      <ul class="cennik__table">
        <li class="cennik__list-item" v-for="item in prof" :key="item.name">
          <p class="cennik__name">
            {{ item.name }}
          </p>
          <p class="cennik__price">
            {{ item.price }}
          </p>
        </li>
      </ul>
    </section>

    <section class="cennik__section">
      <h2 class="cennik__subheading">Protetyka</h2>
      <ul class="cennik__table">
        <li class="cennik__list-item" v-for="item in prot" :key="item.name">
          <p class="cennik__name">
            {{ item.name }}
          </p>
          <p class="cennik__price">
            {{ item.price }}
          </p>
        </li>
      </ul>
    </section>
  </div>
</template>

<script>
import cennik from '@/data/cennik'
export default {
  name: 'Cennik',
  data() {
    return {
      ...cennik,
    }
  },
}
</script>

<style lang="scss" scoped>
.cennik {
  max-width: 900px;
  margin: 0 auto;

  &__heading {
    padding: 3rem 0;
    text-transform: uppercase;
  }

  &__note {
    padding: 0.2rem 0;
    font-size: 14px;
  }

  &__list-item {
    display: flex;
    justify-content: space-between;
    padding: 0.5rem 1rem;
    &:nth-of-type(2n + 1) {
      background: rgba(#ddd, 0.75);
    }
  }

  &__table {
    margin: 1rem 0 2rem;
  }
}
</style>
