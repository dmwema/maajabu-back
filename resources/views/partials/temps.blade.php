@php
if ($temps) {
    $current_temp = $temps['forecast'][0]['forecast']['temp'] - 273.15;
}

if ($current_day == 0) {
    $current_day = 7;
}
@endphp

@if ($temps)
    <!-- column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Metéo</h4>
                <div class="d-flex align-items-center flex-row m-t-30">
                    <div class="display-5 text-info">
                        <!--<i class="wi wi-day-showers"></i>-->
                        <img src="{{ $temps['forecast'][0]['condition']['icon'] }}" style="width: 80px" alt="icon">
                        <span>{{ $current_temp }}<sup>°</sup></span>
                    </div>
                    <div class="m-l-10">
                        <h3 class="m-b-0">{{ $days[$current_day - 1] }}</h3><small>Kinshasa, Congo RDC
                        </small>
                    </div>
                </div>
                <table class="table no-border mini-table m-t-20">
                    <tbody>
                        <tr>
                            <td class="text-muted">{{ $temps['forecast'][0]['condition']['name'] }}</td>
                            <td class="font-medium">{{ $temps['forecast'][0]['condition']['desc'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Humidité</td>
                            <td class="font-medium">{{ $temps['forecast'][0]['forecast']['humidity'] }} %</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Préssion</td>
                            <td class="font-medium">{{ $temps['forecast'][0]['forecast']['pressure'] }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
