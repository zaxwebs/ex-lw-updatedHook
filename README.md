<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

I recently got started with Livewire and I'm in absolute awe. It makes creating dynamic interfaces so easy while sticking to the familiarity of Laravel. Okay, enough praising for now.

I'm writing this article to highlight a slight niche and currently undocumented feature.

# The Scenario
Okay, consider this: In your component class, you have an array:
```php
public $products= [
        [
            'id' => '2535230536',
            'rate' => '32424',
        ],
        [
            'id' => '3960700133',
            'rate' => '24523',
        ],
        [
            'id' => '0524548004',
            'rate' => '45574',
        ],
    ];
```
And in the view, you have the 'id's & 'rates's bound to inputs.
```html
@foreach($products as $index => $product)
<div  wire:key="products-{{ $index }}">
	<div>
		<label>ID</label>
	<input type="text" wire:model="products.{{ $index }}.id">
	</div>
	<div>
		<label>Rate</label>
		<input type="text" wire:model="products.{{ $index }}.rate">
	</div>
</div>
```
Now, what if you want to hook a task any time a product ID is updated? Something like if ID was updated, update the rate accordingly.

# The Concerns
Let's see... Doing something like:
```php
public function updatedRooms() {
        
}
```
This runs every time `$rooms` gets updated. But we want to run as task when any 'id' gets updated not `$rooms` as a whole.
```php
public function updatedRooms0Id() {
        
}
```
This runs every time `$rooms[0]['id']` gets updated. Which works for the first 'id' but... having to repeat the function (`updatedRooms0Id`, `updatedRooms1Id`...) for every index isn't really DRY.

# The Solution
Wouldn't it be great if only there was a way to access the index? Turns out there is...
```php
public function updatedRooms($value, $key) {
        
}
```
`$key` in our example would return `0.id` if the first ID was updated. The first part before the dot is our index. Which is what we needed! You can now operate on the key to setup tasks you'd like to with something like and if statement.

# That's All Folks!
And before I go, I'd like to thank [Josh Hanley](https://github.com/joshhanley) for helping me with this solution. I hope this article helps many more out there.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
