# ImageEffects

[ImageEffect.webm](https://github.com/brutalhost/imageeffects/assets/18640248/a82015fa-e062-477c-bab7-906808a810ea)

**ImageEffects**  is a website that provides a set of filters for real-time image processing. It is implemented using the following technologies:

- **Laravel**: Backend PHP framework.
- **HTMX**: Client-side AJAX requests.
- **Bootstrap 5**: CSS framework with support for older browsers.
- **Imagick**: Server-side image processing library.

### Features

- Filters process images on the server without the need to reload the page.
- Processed images can be downloaded in the highest quality.
- The application is fully accessible for devices without JavaScript support.

### Effects

1. Stencil - creates an image with a limited number of colors.
2. Polaroid - applies a polaroid photo effect.
3. Demotivator - adds text with a demotivational quote to the image.

## Installation
1. Rename `.env.example` to `.env` and fill in the database connection fields.
2. Run `php artisan key:generate`.
3. Run `php artisan storage:link`.
3. Run `php artisan migrate`.
4. Run `php artisan db:seed --class Database\Seeders\DatabaseSeeder`.
5. Run `npm install`.

### Usage

1. Start the local server: `php artisan serve`.
2. Generate assets with `npm run build` or `npm run dev` for development.
3. Open a web browser and navigate to http://localhost:8000.
4. Choose an image for processing and apply one of the available effects.
