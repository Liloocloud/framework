import lilooRequest from '../@liloo/request.js';
// import { Chart } from './module/dist/chart.js';
import './assets/chartjs.min.js';

// line, bar, doughnut, pie, polarArea


export default class lilooChart {

  constructor(Obj) {
    this.path = !Obj.path ? false : Obj.path
    this.action = !Obj.action ? '' : Obj.action
    this.data = !Obj.data ? '' : Obj.data
    this.label = !Obj.label ? 'Gráfico' : Obj.label
    this.element = !Obj.element ? 'liloo-chart-canva' : Obj.element
    this.type = !Obj.type ? 'pie' : Obj.type
    this.infos = null
  }

  /**
   * Gráfico do tipo Pizza
   */
  Pie() {
    if (this.path != '' && this.action != '') {
      lilooV3.Event({
        path: this.path,
        action: this.action,
        data: this.data,
        success: function (res) {
          
          this.infos = {
            labels: res.output.labels,
            datasets: [{
              label: this.label,
              data: res.output.data,
              backgroundColor: [
                '#FF4069',
                '#FFCD56',
                '#36A2EB'
              ],
              borderWidth: 0
            }]
          }
 
          console.log(res)

          let Rand = 'id-' + Math.floor(Math.random() * 101)
          $(this.element).html(`<canvas id="${Rand}"></canvas>`)  
          
          let thisChart = new Chart(document.getElementById(Rand), {
            type: this.type,
            data: this.infos,
            options: {}
          })
          console.log(thisChart)
          return thisChart
  
          
          
        }
        
      })
    }
  }

  /**
   * Execução do Gráfico
   */
  //  Run() {
  //   let Rand = 'id-' + Math.floor(Math.random() * 101)
  //   $(this.element).html(`<canvas id="${Rand}"></canvas>`)  
    
  //   let thisChart = new Chart(document.getElementById(Rand), {
  //     type: this.type,
  //     data: this.infos,
  //     options: {}
  //   })
  //   console.log(thisChart)
  //   return thisChart
   
  // }

}