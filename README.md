# WallaceMaxters/BladePetiteVue

Use petite-vue with Blade views in Laravel



### 

```html
<html>

<head>

@petitevue
</head>

<body>
  <x-petite-vue props="{name: 'Wallace Maxters'}">
      The current url is:
      <span x-text="$page.url" />

      My name is @{{ name }}

  </x-petite-vue>
</body>
</html>
```
