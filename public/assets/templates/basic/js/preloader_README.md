# preloadinator
A super-lightweight preloader plugin, powered by jQuery &amp; CSS :zap:


## Dependencies
Preloadinator requires the dependencies listed below.

- [jQuery](https://jquery.com/)

## Quickstart

1. Write HTML markup for your preloader

```html
<div class="preloader js-preloader">
</div>
```

2. Write CSS styling for the preloader & include this into your HTML file

```css
.preloader {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #60D7A9;
}
```

3. Add jQuery & preloadinator.min.js right before your closing ```<body>``` tag

```html
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="dist/jquery.preloadinator.min.js"
```

4. Initialise your preloader & include this into your HTML file

```javascript
$('.js-preloader').preloadinator();
```

5. Kick back & relax :beer:

## Options

| Option            | Type     | Default | Description                                                     |
|-------------------|----------|---------|-----------------------------------------------------------------|
| scroll            | boolean  | false   | Enable/disable scrolling when the preloader is displayed        |
| minTime           | integer  | 0       | Minimum amount of time to display preloader (in milliseconds)   |
| animation         | function | fadeOut | Animation used to remove the preloader when the page has loaded |
| animationDuration | integer  | 400     | Duration of animation (in milliseconds)                         |

Use the options above like so:

```javascript
$('.js-preloader').preloadinator({
	scroll: false,
	minTime: 2000,
	animation: slideUp,
	animationDuration: 600
});
```

## Callbacks

| Callback             | Description                                                                           |
|----------------------|---------------------------------------------------------------------------------------|
| afterDisableScroll   | This callback is fired after scrolling is disabled (if scroll option is set to false) |
| afterEnableScroll    | This callback is fired after scrolling is enabled (if scroll option is set to false)  |
| afterRemovePreloader | This callback is fired after the preloader is removed from the view                   | 

Use the callbacks above like so:

```javascript
$('.js-preloader').preloadinator({
	afterDisableScroll: function() {
		alert('Scrolling has just been disabled.');
	},
	afterEnableScroll: function() {
		alert('Scrolling has just been enabled.');
	},
	afterRemovePreloader: function() {
		alert('The preloader has just been removed.');
	}
});
```                  



Happy coding! 🤖

&mdash; Leon