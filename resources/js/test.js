import Chart from 'chart.js/auto'

const labels = [
    'Semester 1',
    'Semester 2',
    'Semester 3',
    'Semester 4',
    'Semester 5',
    'Semester 6',
];

const data = {
    labels: labels,
    datasets: [{
        label: 'Rata-rata Semester',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [80, 88, 85, 83, 78, 0, 0],
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('myChart'),
    config
);
