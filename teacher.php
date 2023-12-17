<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers Dashboard</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-matrix@2.0.1/dist/chartjs-chart-matrix.min.js"></script>
    <script src="https://d3js.org/d3.v4.js"></script>
    <link rel="stylesheet" type="text/css" href="./MYsrc/MYteacher.css">

</head>
<body>
    <h1 align="center">Teachers Dashboard</h1><hr>

    <!-- ------------------------------------------------------------------------------------ -->
    <h2 align="center">All Student result</h2>
    <div class="Tchart-box">
        <canvas id="allStackedBarChart"></canvas>
    </div>


    <!-- ------------------------------------------------------------------------------------ -->
    <div>
        <h2 align="center">Doughnut and Line charts</h2>
    </div>

<div class="donut-line">
    <div class="Tchart-box">
    <h1>CGPA Doughnut Chart</h1>
    <label for="semesterSelect">Semester:</label>
    <select id="semesterSelect">
        <option value="SEMESTER_1">SEMESTER_1</option>
        <option value="SEMESTER_2">SEMESTER_2</option>
        <option value="SEMESTER_3">SEMESTER_3</option>
        <option value="SEMESTER_4">SEMESTER_4</option>
        <option value="SEMESTER_5">SEMESTER_5</option>
        <option value="SEMESTER_6">SEMESTER_6</option>
    </select>
    
    <div class="donut-container">
    <canvas id="chart"></canvas>
    </div>
    </div>
    <script src="mydonut.js"></script>
<!-- ------------------------------------------------------------------------------------ -->
    
    <!-- <div>
        <h1>hello2</h1>
    </div> -->
    <div class="Tchart-box">
    <div class="line-container">
        <canvas id="myLineChart"></canvas>
    </div>
    </div>

</div>
<!-- ------------------------------------------------------------------------------------ -->

    <script>


                let studentData = [];
                let allStackedBarChart;

                async function fetchData() {
                    const response = await fetch('getDataStudent.php');
                    if (!response.ok) {
                        throw new Error('Failed to fetch data');
                    }
                    const data = await response.json();
                    studentData = data;
                    return studentData;
                }
//-----------------------------------------------------------------------------------------
            async function chartStackedBar() {

                const rollNumbers = [];
                const totalInternalScores = [];
                const totalPracticalScores = [];
                const totalTheoryScores = [];
                const studentScores = {};

                studentData.forEach(data => {
                    const rollNumber = data.rollNumber;
                    if (!studentScores[rollNumber]) {
                        studentScores[rollNumber] = {
                            rollNumber,
                            totalInternal: 0,
                            totalPractical: 0,
                            totalTheory: 0,
                        };
                    }

                    studentScores[rollNumber].totalInternal += data.internal;
                    studentScores[rollNumber].totalPractical += data.practical;
                    studentScores[rollNumber].totalTheory += data.theory;
                });

                for (const rollNumber in studentScores) {
                    if (Object.hasOwnProperty.call(studentScores, rollNumber)) {
                        const student = studentScores[rollNumber];
                        rollNumbers.push(student.rollNumber);
                        totalInternalScores.push(student.totalInternal);
                        totalPracticalScores.push(student.totalPractical);
                        totalTheoryScores.push(student.totalTheory);
                    }
                }

                const stackedData = {
                    labels: rollNumbers,
                    datasets: [
                        {
                            label: 'Total Internal',
                            data: totalInternalScores,
                            backgroundColor: 'rgba(0,96,200,0.8)',
                            borderColor: 'rgba(0,0,0,1)',
                            borderWidth: 0,
                        },
                        {
                            label: 'Total Practical',
                            data: totalPracticalScores,
                            backgroundColor: 'rgba(246,53,0,0.8)',
                            borderColor: 'rgba(0,0,0,1)',
                            borderWidth: 0,
                        },
                        {
                            label: 'Total Theory',
                            data: totalTheoryScores,
                            backgroundColor: 'rgba(44, 158, 0, 1)',
                            borderColor: 'rgba(1, 1, 1, 1)',
                            borderWidth: 0,
                        },
                    ],
                };

            const stackedConfig = {
                type: 'bar',
                data: stackedData,
                options: {
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            beginAtZero: true,
                            min: 0,
                          
                            ticks: {
                                stepSize: 100,
                            },
                            stacked: true,
                        },
                    },
                },
                plugins: [window.ChartDataLabels],
            };

            if (allStackedBarChart) {
        allStackedBarChart.destroy();
      }

            allStackedBarChart = new Chart(document.getElementById('allStackedBarChart'), stackedConfig);
        }

//------------------------------------------------------------------------------------------

async function chartLine() {

    const response = await fetch('lineData.php'); 
    const data = await response.json();

    const semesters = data.map(item => item.semester);
    const cumulativeCGPA = data.map(item => item.cumulative_cgpa);

    const lineConfig = {
        type: 'line',
        data: {
            labels: semesters.slice(1),
            datasets: [
                {
                    label: 'Cumulative CGPA',
                    data: cumulativeCGPA.slice(1),
                    backgroundColor: 'rgba(0, 0, 0, 0.2)',
                    borderColor: 'rgba(0,0,0,1)',
                    borderWidth: 2,
                    pointRadius: 5,
                    pointBackgroundColor: ['rgba(0,96,200,0.8)'],
                    pointBorderColor: 'rgba(0,0,0,1)',
                    fill: true,
                },
            ],
        },
        options: {
    scales: {
      x: {
        grid: {
          display: false,
        },
      },
      y: {
        beginAtZero: true,
        min: 0,
        max: 400,
        ticks: {
          stepSize: 50,
        },
      },
    },
    plugins: {
      tooltip: {
        enabled: true
      },
      legend: {
        display: true 
      },
      datalabels: {
        display: true,
        anchor: 'end', 
        align: 'top',
        offset: 2,
        color: 'rgba(0, 0, 0, 1)',
        font: {
          weight: 'bold',
          size: 15,
        },
        formatter: function (value) {
         // return value.toFixed(2);
        },
      },
    },
  },

      
        plugins: [window.ChartDataLabels],
      };

    myLineChart = new Chart(document.getElementById('myLineChart'), lineConfig);
}

        document.addEventListener("DOMContentLoaded", function() {
            fetchData().then(() => {
                chartStackedBar();
                chartLine();
            });
        });
    </script>
</body>
</html>