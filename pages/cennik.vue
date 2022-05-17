<template>
  <div class="cennik">
    <TilesBig :tiles="tiles" />
    <div class="cennik__inner">
      <h1 id="stoma" class="cennik__heading">Cennik</h1>
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
          sprzętu , każdorazowo konieczne znieczulenie oraz wykonanie
          niezbędnych zdjęć RVG niezbędnych do wcześniejszej diagnostyki oraz
          końcowej kontroli jakości i poprawności leczenia.
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
      <div id="cennik-gabinety"></div>
      <section class="cennik__section">
        <h2 class="cennik__subheading">Cennik gabinetów lekarskich</h2>
        <div
          class="cennik__gabinet"
          v-for="gabinet in gabinety"
          :key="gabinet.name"
        >
          <h3 class="cennik__subsubheading">{{ gabinet.name }}</h3>
          <div
            class="cennik__wrapper"
            v-for="doctor in gabinet.doctors"
            :key="doctor.name"
          >
            <p class="cennik__doctor-name">
              {{ doctor.name }}
            </p>
            <ul class="cennik__table">
              <li
                :class="['cennik__list-item', { indented: item.indented }]"
                v-for="item in doctor.items"
                :key="item.name"
              >
                <p class="cennik__name">
                  {{ item.name }}
                </p>
                <p class="cennik__price">{{ item.price }} zł</p>
              </li>
            </ul>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
import cennik, { gabinety } from '@/data/cennik'
export default {
  name: 'Cennik',
  data() {
    return {
      ...cennik,
      gabinety,
      tiles: [
        {
          to: {
            path: '/cennik',
            hash: '#stoma',
          },
          name: 'Stomatologia',
          image:
            'https://oskinavara.imgix.net/arcus/kafelki1.jpg?auto=format&w=800',
        },
        {
          to: {
            path: '/cennik',
            hash: '#cennik-gabinety',
          },
          name: 'Gabinety',
          image:
            'https://oskinavara.imgix.net/arcus/kafelki2.jpg?auto=format&w=800',
        },
      ],
    }
  },
  head: {
    title:
      'Cennik | ARCUS-MED: Nowoczesne gabinety stomatologiczne i lekarskie',
  },
}
</script>

<style lang="scss" scoped>
.cennik {
  &__inner {
    max-width: 820px;
    margin: 0 auto;
    padding: 1rem 1rem 4rem;
  }
  .tiles {
    padding: 3rem 0 3rem;
  }

  &__section {
    position: relative;
    padding: 1.5rem;
    box-shadow: $shadow-3;
    background: $background;
    &:not(:last-of-type) {
      margin-bottom: 3rem;
    }
    @include md {
      padding: 2rem;
    }

    &::after {
      content: '';
      height: 100%;
      width: 100%;
      background: var(--primary);
      position: absolute;
      z-index: -1;
      left: -1rem;
      bottom: 15%;
      @include md {
        bottom: 20%;
        left: -20%;
      }
    }

    &:nth-of-type(2n) {
      &::after {
        left: 1rem;
        bottom: 15%;
        @include md {
          bottom: 20%;
          left: 20%;
        }
      }
    }
  }

  &__heading {
    padding: 3rem 0;
    color: $white;
    /* text-transform: uppercase; */
  }

  &__subheading {
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
      background: rgba(black, 0.05);
    }
    font-size: 14px;
    @include sm {
      font-size: 16px;
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

  &__subsubheading {
    padding-bottom: 1rem;
    font-size: 20px;
    @include md {
      font-size: 24px;
    }
  }

  &__doctor-name {
    font-weight: 700;
  }

  &__gabinet {
    &:not(:last-of-type) {
      margin-bottom: 2.5rem;
    }
  }

  #cennik-gabinety {
    padding-top: 8rem;
    margin-top: -8rem;
  }
}
</style>
