<template>
  <div class="stoma">
    <div class="stoma__image-wrapper">
      <img
        src="https://oskinavara.imgix.net/arcus/IMG_1921.jpg?auto=format&w=650"
        alt=""
      />
      <h2 class="stoma__title">Stomatologia</h2>
    </div>
    <ul class="stoma__list">
      <li>Leczenie dorosłych i dzieci</li>
      <li>
        Leczenie kanałowe - endodoncja przy użyciu mikroskopu zabiegowego Leica
        M32
      </li>
      <li>Leczenie protetyczne</li>
      <li>Chirurgia</li>
      <li>Profilaktyka chorób przyzębia, scaling i piaskowanie zębów</li>
      <li>Wybielanie zębów</li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'Stoma',
}
</script>

<style lang="scss" scoped>
.stoma {
  padding: 4rem 0;
  display: grid;
  grid-template-columns: 1fr;
  @include md {
    grid-template-columns: 1fr 1fr;
  }
  &__image-wrapper {
    position: relative;
    img {
      height: 100%;
      object-fit: cover;
    }
  }
  &__title {
    position: absolute;
    background: var(--primary);
    padding: 1.5rem;
    color: white;
    bottom: 0;
    right: 0;
    font-size: 24px;
    @include sm {
      font-size: 38px;
      padding: 3rem;
    }
  }

  &__list {
    li {
      padding: 1rem 0;
      font-weight: 300;
      &:not(:last-of-type) {
        border-bottom: 1px solid rgba($line-gray, 0.3);
      }

      font-size: 16px;
      @include sm {
        padding: 1rem;
        font-size: 24px;
      }
    }
  }
}
</style>
