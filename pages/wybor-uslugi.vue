<template>
  <div class="wybor page">
    <div class="wybor__wrapper">
      <NuxtLink to="/umow-wizyte" class="wybor__button">
        Umów wizytę do lekarzy
      </NuxtLink>
      <a href="/rejestracja-online/" class="wybor__button">
        Umów wizytę do stomatologa / higienistki
      </a>
    </div>
  </div>
</template>

<script>
import BaseButton from '@/components/BaseButton.vue'
export default {
  name: 'WyborUslugi',
  head: {
    title:
      'Wybór usługi | ARCUS-MED: Nowoczesne gabinety stomatologiczne i lekarskie',
  },
  components: { BaseButton },
}
</script>

<style lang="scss" scoped>
.wybor {
  &__wrapper {
    padding: 120px 32px 60px;
  }
  &__button {
    width: fit-content;
    background: var(--primary);
    border: 0;
    padding: 12px 24px;
    color: white;
    font-size: 24px;
    display: block;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.2s;
    margin: 12px auto;
    line-height: 1.5;
    text-align: center;

    @media screen and (max-width: 768px) {
      font-size: 18px;
    }

    &:hover {
      background: lighten(#8e75ae, 5%);
    }
  }
}
</style>
