<template>
  <div class="cennik">
    <h1 class="cennik__heading">Cennik</h1>
    <section class="cennik__section">
      <h2 class="cennik__subheading">Stomatologia zachowawcza</h2>
      <p class="cennik__note">*Cena nie obejmuje ewentualnego znieczulenia</p>
      <ul class="cennik__table">
        <li
          :class="['cennik__list-item', { indented: item.indented }]"
          v-for="item in stom"
          :key="item.name"
        >
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
        <li
          :class="['cennik__list-item', { indented: item.indented }]"
          v-for="item in stom"
          :key="item.name"
        >
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
        <li
          :class="['cennik__list-item', { indented: item.indented }]"
          v-for="item in stom2"
          :key="item.name"
        >
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
        <li
          :class="['cennik__list-item', { indented: item.indented }]"
          v-for="item in prof"
          :key="item.name"
        >
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
        <li
          :class="['cennik__list-item', { indented: item.indented }]"
          v-for="item in prot"
          :key="item.name"
        >
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
      <h2 class="cennik__subheading">Wybielanie</h2>
      <ul class="cennik__table">
        <li
          :class="['cennik__list-item', { indented: item.indented }]"
          v-for="item in wyb"
          :key="item.name"
        >
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
      <h2 class="cennik__subheading">Chirurgia</h2>
      <p class="cennik__note">
        Każdorazowo cena obejmuje konieczne znieczulenie
      </p>
      <ul class="cennik__table">
        <li
          :class="['cennik__list-item', { indented: item.indented }]"
          v-for="item in chir"
          :key="item.name"
        >
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
      <h2 class="cennik__subheading">Choroba okluzyjna</h2>
      <ul class="cennik__table">
        <li
          :class="['cennik__list-item', { indented: item.indented }]"
          v-for="item in oklu"
          :key="item.name"
        >
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
  head: {
    title: 'Arcus-Med | Cennik',
  },
}
</script>

<style lang="scss" scoped>
.cennik {
  max-width: 750px;
  margin: 0 auto;

  &__heading {
    padding: 3rem 0;
    text-transform: uppercase;
  }

  &__subheading {
    margin-top: 2rem;
    margin-bottom: 2rem;
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
      background: rgba(#e5e5e5, 0.75);
    }

    &.indented {
      padding-left: 2rem;
    }
  }

  &__table {
    margin: 1rem 0 1rem;
  }

  &__price {
    margin-left: 1rem;
    white-space: nowrap;
  }
}
</style>
