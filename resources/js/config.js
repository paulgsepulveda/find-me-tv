var api_url = '';
var base_url = '';

switch( process.env.NODE_ENV ){
  case 'development':
    api_url = 'http://localhost:8000/api/v1';
    base_url = 'http://localhost:8000';
  break;
  case 'production':
    api_url = 'http://www.findmetv.net/api/v1';
    base_url = 'http://www.findmetv.net';
  break;
}

export const APP_CONFIG = {
    API_URL: api_url,
    BASE_URL: base_url,
    IMAGE_BASE: 'https://image.tmdb.org/t/p/',
    IMAGE_SIZES: {
      "logo_sizes": [
        "w45",
        "w92",
        "w154",
        "w185",
        "w300",
        "w500",
        "original"
      ],
      "poster_sizes": [
        "w92",
        "w154",
        "w185",
        "w342",
        "w500",
        "w780",
        "original"
      ],
      "profile_sizes": [
        "w45",
        "w185",
        "h632",
        "original"
      ],
      "still_sizes": [
        "w92",
        "w185",
        "w300",
        "original"
      ]
    }
}