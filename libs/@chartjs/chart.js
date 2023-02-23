import lilooRequest from '../@liloo/request.js';
import './assets/chartjs.min.js';

// line, bar, doughnut, pie, polarArea
const lilooChart = {

  // Tipo pizza
  Pie: function (Obj) {
    let pathObj = !Obj.path ? false : Obj.path
    let actionObj = !Obj.action ? '' : Obj.action
    let dataObj = !Obj.data ? '' : Obj.data
    let labelObj = !Obj.label ? 'Gráfico' : Obj.label

    if (pathObj != '' && actionObj != '') {
      lilooV3.Event({
        path: pathObj,
        action: actionObj,
        data: dataObj,
        success: function (res) {

          console.log(res.output)

          let infos = {
            labels: res.output.labels,
              datasets: [{
                label: labelObj,
                data: res.output.data,
                backgroundColor: [
                  '#FF4069',
                  '#FFCD56',
                  '#36A2EB'
                ],
                borderWidth: 0
              }]
          }

          lilooChart.Run({
            data: infos,
            element: Obj.element,
            path: pathObj,
            action: actionObj
          })


        }
      })
    }
  },

  // Tipo barras
  Bar: function (Obj) {
    let pathObj = !Obj.path ? false : Obj.path
    let actionObj = !Obj.action ? '' : Obj.action
    let dataObj = !Obj.data ? '' : Obj.data
    let labelObj = !Obj.label ? 'Gráfico' : Obj.label

    if (pathObj != '' && actionObj != '') {
      lilooV3.Event({
        path: pathObj,
        action: actionObj,
        data: dataObj,
        success: function (res) {
          let infos = {
            labels: res.output.labels,
              datasets: [{
                label: labelObj,
                data: res.output.data,
                backgroundColor: [
                  '#FF4069',
                  '#FFCD56',
                  '#36A2EB'
                ],
                borderWidth: 0
              }]
          }
          lilooChart.Run({
            data: infos,
            element: Obj.element,
            path: pathObj,
            type: 'bar',
            action: actionObj
          })
        }
      })
    }
  },

  /**
   * Instancia e roda a Grafico
   */
  Run: function (Obj) {
    let elementObj = !Obj.element ? 'liloo-chart-canva' : Obj.element
    let typeObj = !Obj.type ? 'pie' : Obj.type
    let dataObj = !Obj.data ? 'pie' : Obj.data

    let Rand = 'id-' + Math.floor(Math.random() * 101)
    $(elementObj).html(`<canvas id="${Rand}"></canvas>`)

    const thisChart = new Chart(document.getElementById(Rand), {
      type: typeObj,
      data: dataObj,
      options: {}
    })
  },
}
export default lilooChart