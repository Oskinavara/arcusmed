const mydrScript = document.getElementsByTagName('script')[0]
const js = document.createElement('script')
js.src = 'https://mydr.pl/static/mydr-pp.min.js'
mydrScript.parentNode.insertBefore(js, mydrScript)
js.onload = () => {
  console.log('MyDR plugin loaded successfully.')
  const PatientsPlugin = new window.PatientsPlugin()
  PatientsPlugin.init({
    app: 'https://mydr.pl/patients_plugin',
    plugin: 'https://mydr.pl/static',
  })
}
