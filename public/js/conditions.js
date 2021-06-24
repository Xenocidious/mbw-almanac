function returnConditionIcon(data){
    data = 'Light Freezing Rain';
    switch(data){
        case 'Blowing Or Drifting Snow':
            document.write('<i class="far fa-snowflake"></i>');
            break;
        case 'Drizzle':
            document.write('<i class="fas fa-tint"></i>');
            break;
        case 'Heavy Drizzle':
            document.write('<i class="fas fa-cloud-rain"></i>');
            break;
        case 'Light Drizzle':
            document.write('<i class="fas fa-cloud-rain"></i>');
            break;
        case 'Heavy Drizzle/Rain':
            document.write('<i class="fas fa-cloud-showers-heavy"></i>');
            break;
        case 'Light Drizzle/Rain':
            document.write('<i class="fas fa-cloud-rain"></i>');
            break;
        case 'Duststorm':
            document.write('<i class="fas fa-broom"></i>');
            break;
        case 'Fog':
            document.write('<i class="fas fa-smog"></i>');
            break;
        case 'Freezing Drizzle/Freezing Rain':
            document.write('<i class="fas fa-tint"></i>');
            document.write('<i class="fas fa-temperature-low"></i>');
            break;
        case 'Heavy Freezing Drizzle/Freezing Rain':
            document.write('<i class="fas fa-tint"></i>');
            document.write('<i class="fas fa-temperature-low"></i>');
            break;
        case 'Light Freezing Drizzle/Freezing Rain':
            document.write('<i class="fas fa-temperature-low"></i>');
            document.write('<i class="fas fa-cloud-rain"></i>');
            break;
        case 'Freezing Fog':
            document.write('<i class="fas fa-temperature-low"></i>');
            document.write('<i class="fas fa-smog"></i>');
            break;
        case 'Heavy Freezing Rain':
            document.write('<i class="fas fa-temperature-low"></i>');
            document.write('<i class="fas fa-cloud-showers-heavy"></i>');
            break;
        case 'Light Freezing Rain':
            document.write('<i class="fas fa-temperature-low"></i>');
            document.write('<i class="fas fa-cloud-rain"></i>');
            break;
        case 'Funnel Cloud/Tornado':
            document.write('<i class="fas fa-wind"></i>');
            break;
        case 'Hail Showers':
            document.write('<i class="fas fa-cloud-showers-heavy"></i>');
            break;
        case 'Ice':
            document.write('<i class="fas fa-icicles"></i>');
            break;
        case 'Lightning Without Thunder':
            document.write('<i class="fas fa-bolt"></i>');
            break;
        case 'Mist':
            document.write('<i class="fas fa-stream"></i>');
            break;
        case 'Precipitation In Vicinity':
            document.write('<i class="fas fa-umbrella"></i>');
            break;
        case 'Rain':
            document.write('<i class="fas fa-cloud-showers-heavy"></i>');
            break;
        case 'Heavy Rain And Snow':
            document.write('<i class="fas fa-cloud-showers-heavy"></i>');
            document.write('<i class="far fa-snowflake"></i>');
            break;
        case 'Light Rain And Snow':
            document.write('<i class="fas fa-cloud-rain"></i>');
            document.write('<i class="far fa-snowflake"></i>');
            break;
        case 'Rain Showers':
            document.write('<i class="fas fa-cloud-showers-heavy"></i>');
            break;
        case 'Heavy Rain':
            document.write('<i class="fas fa-cloud-showers-heavy"></i>');
            break;
        case 'Light Rain':
            document.write('<i class="fas fa-cloud-rain"></i>');
            break;
        case 'Sky Coverage Decreasing':
            document.write('<i class="fab fa-cloudflare"></i>');
            break;
        case 'Sky Coverage Increasing':
            document.write('<i class="fab fa-cloudflare"></i>');
            break;
        case 'Sky Unchanged':
            document.write('<i class="fab fa-cloudflare"></i>');
            break;
        case 'Smoke Or Haze':
            document.write('<i class="fas fa-smog"></i>');
            break;
        case 'Snow':
            document.write('<i class="fas fa-snowman"></i>');
            break;
        case 'Snow And Rain Showers':
            document.write('<i class="fas fa-snowman"></i>');
            document.write('<i class="fas fa-cloud-rain"></i>');
            break;
        case 'Snow Showers':
            document.write('<i class="fas fa-snowman"></i>');
            break;
        case 'Heavy Snow':
            document.write('<i class="fas fa-snowplow"></i>');
            break;
        case 'Light Snow':
            document.write('<i class="fas fa-snowflake"></i>');
            break;
        case 'Squalls':
            document.write('<i class="fas fa-cloud-rain"></i>');
            break;
        case 'Thunderstorm':
            document.write('<i class="fas fa-poo-storm"></i>');
            break;
        case 'Thunderstorm Without Precipitation':
            document.write('Precipitation');
            break;
        case 'Diamond Dust':
            document.write('<i class="fas fa-braille"></i>');
            break;
        case 'Hail':
            document.write('<i class="fas fa-cloud-rain"></i>');
            break;
        case 'Overcast':
            document.write('<i class="fas fa-cloud"></i>');
            break;
        case 'Partially cloudy':
            document.write('<i class="fas fa-cloud-sun"></i>');
            break;
        case 'Clear':
            document.write('<i class="fas fa-cloud-sun"></i>');
            break;
        default:
            document.write('<i class="fas fa-sun"></i>');
        break;
    }
}