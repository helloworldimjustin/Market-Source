import "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.js";

class makeGraph{
    /**
     * 
     * @param: name is the name of the chart
     * @param: labels are the chart's x axis labels
     * @param: dataset is the dataset to be displayed on the chart
     */
    constructor(name, labels, dataset){
        this.name = name;
        this.labels = labels;
        this.dataset = dataset;
    }

    /**
     * constructs the chart
     */
    create(){
        new Chart(this.name, {
            type: 'line',
            data: {
                labels: this.labels,
                datasets: [ 
                    {
                    label: '# of Votes',
                    data: this.dataset,
                    backgroundColor: [
                        
                        'rgba(54, 162, 235, 0.2)',
                        
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        
                    ],
                    borderWidth: 1
                }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            //beginAtZero:true
                            beginAtZero:false
                        }
                    }]
                }
            }
        });
    }
    
    
}