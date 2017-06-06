<li  class="list-group-item">
    <div class="row">
        <div class="col-md-6">
            
            <p class="text-muted">{{ $location->zip }}</p>

            <h2 class="text-primary">{{ $location->currentWeather->getLocationName() }}</h2>

        </div>
        <div class="col-md-3">

            <p class="text-muted">{{ $location->currentWeather->getWeatherConditions() }}</p>

            <h2 class="text-success">{{ $location->currentWeather->getTemp() }} °F</h2>

        </div>
        <div class="col-md-3">

            <img src="{{ $location->currentWeather->getIcon() }}" alt="{{ $location->currentWeather->getWeatherConditions() }}" class="img-rounded pull-right">
            
        </div>
    </div>
</li>
