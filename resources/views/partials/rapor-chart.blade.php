<script type="module">
    const semester = [
    'Semester 1',
    'Semester 2',
    'Semester 3',
    'Semester 4',
    'Semester 5',
    'Semester 6',
];


const data = {
    labels: semester,
    datasets: [{
        label: 'Rata-rata Semester',
        backgroundColor: 'rgb(7,148,162)',
        borderColor: 'rgb(7,148,162)',
        data:{!! $nilai !!},
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('raporChart'),
    config
);

</script>