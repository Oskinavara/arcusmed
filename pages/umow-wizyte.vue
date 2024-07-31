<template>
  <div class="umow-wizyte page">
    <button
      class="btn-mydr-pp"
      data-doctor=""
      data-speciality=""
      data-visitkind=""
      data-evisit="true"
      data-appname="drw"
      data-token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJmYWNpbGl0eV9pZCI6NDkyN30.V5V4BdK2Zbw0g_guTCeVm05AeggvouQeiUwqemdFf3E"
    ></button>
  </div>
</template>

<script>
export default {
  head: {
    title:
      'Galeria | ARCUS-MED: Nowoczesne gabinety stomatologiczne i lekarskie',
  },
  mounted() {
    const PatientsPlugin = new window.PatientsPlugin()
    PatientsPlugin.init({
      app: 'https://mydr.pl/patients_plugin',
      plugin: 'https://mydr.pl/static',
    })
  },
}
</script>

<style lang="scss" scoped>
.umow-wizyte {
  min-height: 25rem;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
