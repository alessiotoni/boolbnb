@extends('logged.sponsorship.layouts')

@section('content')

<a class="btn blu-btn" id="blu-btn" href="{{ url()->previous() }}"><i style="color: white" class="fas fa-arrow-left"></i> Torna Indietro</a>


<div class="stat-container">

    <div class="container">
        <div class="card dash-card">
            <div class="card card-header">
                <h3>Le mie statistiche</h3>
            </div>
            <div class="card rgba stat-card">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <canvas id="myViews"></canvas>
                    </div>
                    <div class="col-12 col-md-6">
                        <canvas id="myMessages"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    const id = {{$id}}
    var views = null
    var messages = null
    window.addEventListener('load', () => {
        callViews()
        callMessages()
    })
    function callViews() {
        axios.get('http://127.0.0.1:8000/api/stat/' + id)
            .then((resp) => {
                views = resp.data.views

                const labelsV = [
                'Gen',
                'Feb',
                'Mar',
                'Apr',
                'Mag',
                'Giu',
                'Lug',
                'Ago',
                'Set',
                'Ott',
                'Nov',
                'Dic',
                ];
                const data = {
                    labels: labelsV,
                    datasets: [{
                        label: 'Views',
                        backgroundColor: '#71a8cd',
                        borderColor: '#71a8cd',
                        data: views,
                        }]
                };

                const config = {
                    type: 'line',
                    data,
                    options: {
                        scales: {
                            y: {
                                title: {
                                display: false,
                                text: 'Value'
                                },
                                min: 0,
                                max: 20,
                                ticks: {
                                // forces step size to be 50 units
                                stepSize: 1

                                }
                            }
                        }
                    }
                }
                var myChart = new Chart(
                    document.getElementById('myViews'),
                    config
                    )

        });
    }
    function callMessages() {
        axios.get('http://127.0.0.1:8000/api/stat/' + id)
            .then((resp) => {
                messages = resp.data.messages

                const labelsV = [
                'Gen',
                'Feb',
                'Mar',
                'Apr',
                'Mag',
                'Giu',
                'Lug',
                'Ago',
                'Set',
                'Ott',
                'Nov',
                'Dic',
                ];
                const data = {
                    labels: labelsV,
                    datasets: [{
                        label: 'Messages',
                        backgroundColor: '#71a8cd',
                        borderColor: '#71a8cd',
                        data: messages,
                        }]
                };
                const config = {
                    type: 'line',
                    data,
                    options: {
                        scales: {
                            y: {
                                title: {
                                display: false,
                                text: 'Value'
                                },
                                min: 0,
                                max: 20,
                                ticks: {
                                // forces step size to be 50 units
                                stepSize: 1

                                }
                            }
                        }
                    }
                };
                var myChart = new Chart(
                    document.getElementById('myMessages'),
                    config
                );
        })
    }

</script>
@endsection